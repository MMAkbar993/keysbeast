<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function store(Request $request, Product $product): RedirectResponse
    {
        abort_unless($product->is_active, 404);

        $user = $request->user();
        $amountInCents = (int) round($product->price * 100);

        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'customer_email' => $user->email,
            'amount' => $amountInCents,
            'currency' => 'usd',
            'status' => 'pending',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'customer_email' => $order->customer_email,
            'line_items' => [[
                'price_data' => [
                    'currency' => $order->currency,
                    'unit_amount' => $order->amount,
                    'product_data' => [
                        'name' => $product->name,
                    ],
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'order_id' => $order->id,
            ],
            'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        $order->update(['stripe_session_id' => $session->id]);

        return redirect($session->url);
    }

    public function success(Request $request): View
    {
        $sessionId = $request->query('session_id');

        $order = Order::where('stripe_session_id', $sessionId)
            ->where('user_id', $request->user()->id)
            ->with(['product', 'licenseKey'])
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }

    public function cancel(): View
    {
        return view('checkout.cancel');
    }
}
