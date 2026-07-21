<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected const TYPES = ['windows', 'office', 'game', 'other'];

    public function home(): View
    {
        $activeProducts = $this->activeProductsQuery()->orderBy('name')->get();

        $categoryCounts = $activeProducts->groupBy('type')->map->count();

        $bestSellers = $activeProducts->take(6);

        return view('products.home', [
            'categoryCounts' => $categoryCounts,
            'bestSellers' => $bestSellers,
        ]);
    }

    public function index(Request $request): View
    {
        $type = $request->query('type');

        abort_if($type && ! in_array($type, self::TYPES, true), 404);

        $products = $this->activeProductsQuery()
            ->when($type, fn ($query) => $query->where('type', $type))
            ->orderBy('name')
            ->get();

        return view('products.index', [
            'products' => $products,
            'type' => $type,
        ]);
    }

    public function show(Product $product): View
    {
        abort_unless($product->is_active, 404);

        $availableKeys = $product->licenseKeys()->where('status', 'available')->count();

        return view('products.show', compact('product', 'availableKeys'));
    }

    private function activeProductsQuery()
    {
        return Product::where('is_active', true)
            ->withCount([
                'licenseKeys as available_keys_count' => fn ($query) => $query->where('status', 'available'),
            ]);
    }
}
