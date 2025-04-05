<?php

namespace App\Http\Controllers\Backend\Admin\Product;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.product.pending.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $data = $request->validate([
            'is_approved' => 'integer|in:0,1,2',
        ]);

        // Check if the product exists, and update approval status
        $product->is_approved = $request->input('is_approved');
        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Product approval status updated successfully!',
        ]);

    }
}
