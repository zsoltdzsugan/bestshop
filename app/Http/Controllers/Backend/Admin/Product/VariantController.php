<?php

namespace App\Http\Controllers\Backend\Admin\Product;

use App\DataTables\Product\VariantDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\VariantStoreRequest;
use App\Models\Product;
use App\Models\Product\Variant;
use Illuminate\Http\RedirectResponse;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VariantDataTable $dataTable, Product $product): mixed
    {
        return $dataTable->with('productId', $product->id)->render('admin.product.variants.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.variants.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VariantStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $variant = new Variant;
        $variant->fill($data);
        $variant->save();

        return redirect()->route('admin.product.variants.index', $data['product_id'])->with('status', 'variant-created');
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
    public function edit(string $productId, string $variantId)
    {
        $variant = Variant::findOrFail($variantId);
        $product = Product::findOrFail($productId);

        return view('admin.product.variants.edit', compact('product', 'variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VariantStoreRequest $request, string $productId, string $variantId)
    {
        $data = $request->validated();
        $variant = Variant::findOrFail($variantId);
        $variant->fill($data);
        $variant->save();

        return redirect()->route('admin.product.variants.index', $productId)->with('status', 'variant-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productId, string $variantId)
    {
        $variant = Variant::findOrFail($variantId);
        $variant->delete();

        return redirect()->route('admin.product.variants.index', $productId)->with('status', 'variant-deleted');
    }
}
