<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@test.com')->first();
        $vendor = new Vendor;

        $vendor->banner = 'banners/banner1.jpg';
        $vendor->name = 'Vendor 1';
        $vendor->phone = '+123456789';
        $vendor->email = 'admin@test.com';
        $vendor->address = 'Budapest, Hungary';
        $vendor->description = 'shop description';
        $vendor->user_id = $user->id;
        $vendor->save();
    }
}
