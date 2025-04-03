<?php

namespace App\Http\Controllers\Backend\Category;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $category = new Category;
        $category->fill($data);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.category.index')->with('status', 'category-created');
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
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);

        $category->fill($data);
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('admin.category.index')->with('status', 'category-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): mixed
    {
        $category = Category::findOrFail($id);
        $subCategory = Category::where('category_id', $category->id)->count();
        if ($subCategory > 0) {
            return response(['status' => 'error', 'message' => 'This Category has child item(s)']);
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with('status', 'category-deleted');
    }
}
