<?php

namespace App\Http\Controllers\Backend\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductStoreRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product\ImageGallery;
use App\Models\Shop;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Str;

class ProductController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $shops = Shop::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('categories', 'shops', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_top'] = $request->has('is_top') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;
        $data['is_best'] = $request->has('is_best') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_approved'] = $request->has('is_approved') ? 1 : 0;

        if ($request->hasFile('thumb_image')) {
            $data['thumb_image'] = $this->imageService->upload($request->file('thumb_image'), 'product-images');
        }

        $product = new Product;
        $product->fill($data);
        $product->slug = Str::slug($request->name);
        $product->save();

        return redirect()->route('admin.product.index')->with('status', 'product-created');
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
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $shops = Shop::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.edit', compact('product', 'shops', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);

        $data['is_top'] = $request->has('is_top') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;
        $data['is_best'] = $request->has('is_best') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_approved'] = $request->has('is_approved') ? 1 : 0;

        if ($request->hasFile('thumb_image')) {
            $this->imageService->delete($product->thumb_image);
            $data['thumb_image'] = $this->imageService->upload($request->file('thumb_image'), 'product-images');
        }

        $product->fill($data);
        $product->slug = Str::slug($request->name);
        $product->save();

        return redirect()->route('admin.product.index')->with('status', 'product-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $productImages = ImageGallery::where('product_id', $id)->get();

        $this->imageService->delete($product->thumb_image);

        $imagePaths = [];
        foreach ($productImages as $image) {
            $imagePaths[] = $image->image;
        }

        $this->imageService->deleteMultiple($imagePaths);

        $product->delete();

        return redirect()->route('admin.product.index')->with('status', 'product-deleted');
    }
}
