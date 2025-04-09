<?php

namespace App\Http\Controllers\Backend\Admin;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Illuminate\Http\JsonResponse;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable): mixed
    {
        $flashSaleDate = FlashSale::first();

        $products = Product::select('id', 'name', 'thumb_image')
            ->where('is_approved' , 1)
            ->where('status', 1)
            ->get()
            ->map(fn($p) => [
                'id' => $p->id,
                'name' => $p->name,
                'image' => $p->thumb_image,
            ])
            ->values();

        return $dataTable->render('admin.flash-sale.index', compact('flashSaleDate', 'products'));
    }

    public function updateDate(Request $request)
    {
        $request->validate([
            'sale_end' => ['required'],
        ]);

        FlashSale::updateOrCreate(
            [ 'id' => 1, ],
            [ 'sale_end' => $request->sale_end],
        );

        return redirect()->route('admin.flash-sale.index')->with('status', 'flase-sale-updated');
    }

    public function updateItems(Request $request)
    {
        $request->validate([
            'product' => ['required', 'unique:flash_sale_items,product_id,except,id'],
        ],[
            'product.unique' => 'The product is already in flash sale.',
        ]);

        $flashSaleItem = new FlashSaleItem;
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = FlashSale::first()->id;
        $flashSaleItem->is_featured = $request->is_featured == "on" ? 1 : 0;
        $flashSaleItem->status = $request->status == "on" ? 1 : 0;
        $flashSaleItem->save();

        return redirect()->route('admin.flash-sale.index')->with('status', 'flase-sale-item-added');
    }

    public function destroy(string $id)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem->delete();

        return redirect()->route('admin.flash-sale.index')->with('status', 'flash-sale-item-deleted');
    }
}
