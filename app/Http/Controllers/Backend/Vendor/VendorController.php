<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class VendorController extends Controller
{
    public function dashboard(): View
    {
        return view('vendor.dashboard');
    }

    public function login(): View
    {
        return view('admin.auth.login');
    }
}
