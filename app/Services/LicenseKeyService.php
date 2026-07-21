<?php

namespace App\Services;

use App\Exceptions\OutOfStockException;
use App\Models\LicenseKey;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class LicenseKeyService
{
    /**
     * Assign a single available key to the order's product, atomically.
     *
     * The row lock inside the transaction guarantees two concurrent calls
     * (e.g. two webhook retries) can never hand out the same key.
     *
     * @throws OutOfStockException
     */
    public function assignKeyToOrder(Order $order): LicenseKey
    {
        return DB::transaction(function () use ($order) {
            $key = LicenseKey::where('product_id', $order->product_id)
                ->where('status', 'available')
                ->lockForUpdate()
                ->first();

            if (! $key) {
                throw new OutOfStockException("No available license keys for product #{$order->product_id}.");
            }

            $key->update([
                'status' => 'used',
                'order_id' => $order->id,
                'assigned_at' => now(),
            ]);

            $order->update(['license_key_id' => $key->id]);

            return $key;
        });
    }

    /**
     * Bulk import keys from a textarea, one key per line.
     * Blank lines, whitespace, and duplicates (against the input and
     * against existing keys for the product) are dropped.
     */
    public function bulkImport(Product $product, string $rawKeys): int
    {
        $lines = collect(preg_split('/\r\n|\r|\n/', $rawKeys))
            ->map(fn (string $line) => trim($line))
            ->filter()
            ->unique()
            ->values();

        if ($lines->isEmpty()) {
            return 0;
        }

        $existing = LicenseKey::where('product_id', $product->id)
            ->whereIn('key_value', $lines)
            ->pluck('key_value');

        $toInsert = $lines->diff($existing);

        if ($toInsert->isEmpty()) {
            return 0;
        }

        $now = now();

        $rows = $toInsert->map(fn (string $key) => [
            'product_id' => $product->id,
            'key_value' => $key,
            'status' => 'available',
            'created_at' => $now,
            'updated_at' => $now,
        ])->all();

        LicenseKey::insert($rows);

        return count($rows);
    }
}
