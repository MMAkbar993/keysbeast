<?php

namespace App\Http\Controllers;

use App\Exceptions\OutOfStockException;
use App\Mail\LicenseKeyMail;
use App\Models\Order;
use App\Services\LicenseKeyService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function __invoke(Request $request, LicenseKeyService $licenseKeys): Response
    {
        try {
            $event = Webhook::constructEvent(
                $request->getContent(),
                $request->header('Stripe-Signature'),
                config('services.stripe.webhook_secret'),
            );
        } catch (SignatureVerificationException|\UnexpectedValueException $e) {
            Log::warning('Stripe webhook signature verification failed', ['error' => $e->getMessage()]);

            return response('Invalid signature', 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $orderId = $session->metadata->order_id ?? null;

            $order = $orderId ? Order::find($orderId) : null;

            if (! $order) {
                Log::warning('Stripe webhook: order not found for session', ['session_id' => $session->id]);

                return response('Order not found', 200);
            }

            if ($order->status === 'fulfilled') {
                return response('Already fulfilled', 200);
            }

            $order->update([
                'status' => 'paid',
                'stripe_payment_intent_id' => $session->payment_intent,
            ]);

            try {
                $licenseKeys->assignKeyToOrder($order);
                $order->update(['status' => 'fulfilled']);

                Mail::to($order->customer_email)->send(new LicenseKeyMail($order->fresh(['product', 'licenseKey'])));
            } catch (OutOfStockException $e) {
                Log::critical('Order paid but no license key available to assign', [
                    'order_id' => $order->id,
                    'product_id' => $order->product_id,
                ]);
            }
        }

        return response('OK', 200);
    }
}
