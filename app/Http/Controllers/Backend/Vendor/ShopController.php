<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ShopStoreRequest;
use App\Models\Shop;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
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
        $shop = Shop::where('user_id', Auth::user()->id)->first();

        return view('vendor.shop.index', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vendor.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShopStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user_id = Auth::user()->id;

        if ($request->hasFile('banner')) {
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'banners');
        }

        $shop = new Shop;
        $shop->fill($data);
        $shop['user_id'] = $user_id;
        $shop->save();

        return redirect()->route('vendor.shop.index', compact('shop'))->with('status', 'shop-profile-updated');
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
        $shop = Shop::findOrFail($id);

        return view('vendor.shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShopStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $shop = Shop::findOrFail($id);

        if ($request->hasFile('banner')) {
            $this->imageService->delete($shop->banner);
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'banners');
        }

        $shop->fill($data);
        $shop->save();

        return redirect()->route('vendor.shop.index')->with('status', 'shop-profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $shop = Shop::findOrFail($id);

        $this->imageService->delete($shop->banner);
        $shop->delete();

        return redirect()->route('vendor.shop.index')->with('status', 'shop-deleted');
    }
}
