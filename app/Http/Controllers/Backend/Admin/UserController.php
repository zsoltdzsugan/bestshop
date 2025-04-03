<?php

namespace App\Http\Controllers\Backend\Admin;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = ['user', 'vendor', 'admin'];

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $this->imageService->upload($request->file('image'), 'profile_images');
        }

        $user = new User;
        $user->fill($data);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('admin.user.index')->with('status', 'user-created');
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
        $user = User::findOrFail($id);
        $roles = ['user', 'vendor', 'admin'];

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, string $id): RedirectResponse
    {
        $data = $request->validated();
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->imageService->delete($user->image);
            $data['image'] = $this->imageService->upload($request->file('image'), 'profile_images');
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('admin.user.index')->with('status', 'user-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            $this->imageService->delete($user->image);
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('status', 'user-deleted');
    }
}
