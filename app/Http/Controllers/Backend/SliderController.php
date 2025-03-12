<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderStoreRequest;
use App\Models\Slider;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SliderController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable): Mixed
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('banner')) {
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'sliders');
        }

        $slider = new Slider();
        $slider->fill($data);
        $slider->save();

        return Redirect::route('admin.slider.index')->with('status', 'slider-created');
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
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderStoreRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('banner')) {
            $this->imageService->delete($slider->banner);
            $data['banner'] = $this->imageService->upload($request->file('banner'), 'sliders');
        }

        $slider->fill($data);
        $slider->save();

        return Redirect::route('admin.slider.index')->with('status', 'slider-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $slider = Slider::findOrFail($id);

        $this->imageService->delete($slider->banner);
        $slider->delete();


        return Redirect::route('admin.slider.index')->with('status', 'slider-deleted');
    }
}
