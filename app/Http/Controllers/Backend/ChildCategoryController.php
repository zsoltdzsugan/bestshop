<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ChildCategoryStoreRequest;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable): Mixed
    {
        return $dataTable->render('admin.child-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.child-category.create', compact('categories', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();

        // Return the data as JSON
        return response()->json($subCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildCategoryStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $childCategory = new ChildCategory();
        $childCategory->fill($data);
        $childCategory->slug = Str::slug($request->name);
        $childCategory->save();

        return redirect()->route('admin.child-category.index')->with('status', 'child-category-created');
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
        $childCategory = ChildCategory::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::where('category_id', $childCategory->category_id)->get();

        return view('admin.child-category.edit', compact('childCategory', 'categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildCategoryStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $childCategory = ChildCategory::findOrFail($id);

        $childCategory->fill($data);
        $childCategory->slug = Str::slug($request->name);
        $childCategory->save();

        return redirect()->route('admin.child-category.index')->with('status', 'child-category-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $childCategory = ChildCategory::findOrFail($id);
        $childCategory->delete();

        return redirect()->route('admin.child-category.index')->with('status', 'child-category-deleted');
    }
}
