<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function dashboard(): View
    {
        return view('vendor.dashboard');
    }
}
