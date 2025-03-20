<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@test.com')->first();
        $vendor = new Vendor();

        $vendor->banner = 'banners/banner1.jpg';
        $vendor->name = 'Vendor 2';
        $vendor->phone = '+123456789';
        $vendor->email = 'vendor@test.com';
        $vendor->address = 'Budapest, Hungary';
        $vendor->description = 'vendor shop description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
