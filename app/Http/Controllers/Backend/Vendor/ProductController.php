<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductStoreRequest;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function index()
    {
        //
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
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['is_top'] = $request->has('is_top') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;
        $data['is_best'] = $request->has('is_best') ? 1 : 0;
        $data['is_featured'] = $request->has('is_featured') ? 1 : 0;
        $data['is_approved'] = 0;

        if ($request->hasFile('thumb_image')) {
            $data['thumb_image'] = $this->imageService->upload($request->file('thumb_image'), 'product_thumb_images');
        }

        $product = new Product();
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
    public function destroy(string $id)
    {
        //
    }
}
