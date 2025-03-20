<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\VendorStoreRequest;
use App\Models\Vendor;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProfileController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vendor = Vendor::where('user_id', Auth::user()->id)->first();
        return view('vendor.vendor-profile.index', compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vendor.vendor-profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user_id = Auth::user()->id;

        if ($request->hasFile('banner')) {
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'banners');
        }

        $vendor = new Vendor();
        $vendor->fill($data);
        $vendor['user_id'] = $user_id;
        $vendor->save();

        return redirect()->route('vendor.vendor-profile.index', compact('vendor'))->with('status', 'vendor-profile-updated');
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
        return view('vendor.vendor-profile.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorStoreRequest $request, string $id)
    {
        $data = $request->validated();
        $vendor = Vendor::findOrFail($id);

        if ($request->hasFile('banner')) {
            $this->imageService->delete($vendor->banner);
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'banners');
        }

        $vendor->fill($data);
        $vendor->save();

        return redirect()->route('vendor.vendor-profile.index')->with('status', 'vendor-profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::findOrFail($id);

        $this->imageService->delete($vendor->banner);
        $vendor->delete();

        return redirect()->route('vendor.vendor-profile.index')->with('status', 'vendor-deleted');
    }
}
