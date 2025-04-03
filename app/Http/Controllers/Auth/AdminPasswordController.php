<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminPasswordController extends Controller
{
    /**
     * Update the admin user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // $validated = $request->validateWithBag('updatePassword', [
        //    'current_password' => ['required', 'current_password'],
        //    'password' => [
        //        'required',
        //        'confirmed',
        //        'min:12',
        //        'regex:/[A-Z]/',
        //        'regex:/[a-z]/',
        //        'regex:/[0-9]/',
        //        'regex:/[@$!%*?&]/',
        //    ],
        // ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'admin-password-updated');
    }
}
