<?php

namespace App\Http\Controllers\Backend\Vendor\Product;

use App\DataTables\Product\VariantItemDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\VariantItemStoreRequest;
use App\Models\Product;
use App\Models\Product\Variant;
use App\Models\Product\VariantItem;
use Illuminate\Contracts\View\View;

class VariantItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VariantItemDataTable $dataTable, Product $product, Variant $variant): mixed
    {
        if ($product->shop_id !== auth()->user()->shop->id) {
            abort(403, 'Unauthorized.');
        }

        return $dataTable->with('variantId', $variant->id)->render('vendor.product.variants.items.index', compact('product', 'variant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product, Variant $variant): View
    {
        return view('vendor.product.variants.items.create', compact('product', 'variant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariantItemStoreRequest $request, Product $product, Variant $variant)
    {
        $data = $request->validated();
        $data['is_default'] = $request->has('is_default') ? 1 : 0;

        $variantItem = new VariantItem;
        $variantItem->fill($data);
        $variantItem->save();

        return redirect()->route('vendor.product.variants.items.index', compact('product', 'variant'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Variant $variant, VariantItem $item)
    {
        return view('vendor.product.variants.items.edit', compact('product', 'variant', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VariantItemStoreRequest $request, Product $product, Variant $variant, VariantItem $item)
    {
        $data = $request->validated();

        if ($item->variant->product->shop_id !== auth()->user()->shop->id) {
            abort(403, 'Unauthorized.');
        }

        $item->fill($data);
        $item['is_default'] = $request->has('is_default') ? 1 : 0;
        $item->save();

        return redirect()->route('vendor.product.variants.items.index',
            [
                'product' => $product->id,
                'variant' => $variant->id,
            ]
        )->with('status', 'product-variant-item-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productId, string $variantId, string $itemId)
    {
        $item = VariantItem::findOrFail($itemId);

        if ($item->variant->product->shop_id !== auth()->user()->shop->id) {
            abort(403, 'Unauthorized.');
        }

        $item->delete();

        return redirect()->route('vendor.product.variants.items.index', ['product' => $productId, 'variant' => $variantId])->with('status', 'variant-item-deleted');
    }
}
