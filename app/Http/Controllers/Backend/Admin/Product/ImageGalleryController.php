<?php

namespace App\Http\Controllers\Backend\Admin\Product;

use App\DataTables\Product\ImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\ImageGalleryStoreRequest;
use App\Models\Product;
use App\Models\Product\ImageGallery;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ImageGalleryDataTable $dataTable, string $id)
    {
        $product = Product::findOrFail($id);
        $images = ImageGallery::all()->where('product_id', $id);

        return $dataTable->render('admin.product.images.index', compact('product', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageGalleryStoreRequest $request)
    {
        $data = $request->validated();
        $imagesPaths = $this->imageService->uploadMultiple($request->file('image'), 'product-images');

        foreach ($imagesPaths as $path) {
            ImageGallery::create([
                'product_id' => $data['product_id'],
                'image' => $path,
            ]);
        }

        return redirect()->route('admin.product.images.index', $data['product_id'])->with('status', 'images-added-successfully');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $productId, string $imageId)
    {
        $image = ImageGallery::where('product_id', $productId)->findOrFail($imageId);

        $this->imageService->delete($image->image);
        $image->delete();

        return redirect()->route('admin.product.images.index', $productId)->with('status', 'product-image-deleted');
    }
}
