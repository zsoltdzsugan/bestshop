<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SubCategoryStoreRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable): Mixed
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $subCategory = new SubCategory();
        $subCategory->fill($data);
        $subCategory->slug = Str::slug($request->name);
        $subCategory->save();

        return redirect()->route('admin.sub-category.index')->with('status', 'sub-category-created');
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
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();

        return view('admin.sub-category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->fill($data);
        $subCategory->slug = Str::slug($request->name);
        $subCategory->save();

        return redirect()->route('admin.sub-category.index')->with('status', 'sub-category-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Mixed
    {
        $subCategory = SubCategory::findOrFail($id);
        $childCategory = SubCategory::where('sub_category_id', $subCategory->id)->count();
        if ($childCategory > 0) {
            return response(['status' => 'error', 'message' => 'This Sub-Category has child item(s)']);
        }
        $subCategory->delete();

        return redirect()->route('admin.sub-category.index')->with('status', 'sub-category-deleted');
    }
}
