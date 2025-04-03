<?php

namespace App\Http\Controllers\Backend\Admin;

use App\DataTables\VendorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VendorStoreRequest;
use App\Models\User;
use App\Models\Vendor;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VendorController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(VendorDataTable $dataTables): mixed
    {
        return $dataTables->render('admin.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::all();

        return view('admin.vendor.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('banner')) {
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'banners');
        }

        $vendor = new Vendor;
        $vendor->fill($data);
        $vendor->save();

        return redirect()->route('admin.vendor.index')->with('status', 'vendor-created');
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
        $vendor = Vendor::findOrFail($id);

        return view('admin.vendor.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $vendor = Vendor::findOrFail($id);

        if ($request->hasFile('banner')) {
            $this->imageService->delete($vendor->banner);
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'banners');
        }

        $vendor->fill($data);
        $vendor->save();

        return redirect()->route('admin.vendor.index')->with('status', 'vendor-profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $vendor = Vendor::findOrFail($id);

        $this->imageService->delete($vendor->banner);
        $vendor->delete();

        return redirect()->route('admin.vendor.index')->with('status', 'vendor-deleted');
    }
}
