<?php

namespace App\Http\Controllers\Backend\Admin;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\BrandStoreRequest;
use App\Models\Brand;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTables): Mixed
    {
        return $dataTables->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $this->imageService->upload($request->file('logo'), 'logos');
        }

        $brand = new Brand();
        $brand->fill($data);
        $brand->slug = Str::slug($request->name);
        $brand->save();

        return redirect()->route('admin.brand.index')->with('status', 'brand-created');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $brand = Brand::findOrFail($id);

        if ($request->hasFile('logo')) {
            $this->imageService->delete($brand->logo);
            $data['logo'] = $this->imageService->upload($request->file('logo'), 'logos');
        }

        $brand->fill($data);
        $brand->slug = Str::slug($request->name);
        $brand->save();

        return redirect()->route('admin.brand.index')->with('status', 'brand-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $brand = Brand::findOrFail($id);
        $this->imageService->delete($brand->logo);
        $brand->delete();

        return redirect()->route('admin.brand.index')->with('status', 'brand-deleted');
    }
}
