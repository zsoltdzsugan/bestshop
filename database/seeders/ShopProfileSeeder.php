<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Seeder;

class ShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@test.com')->first();
        $shop = new Shop;

        $shop->banner = 'banners/banner1.jpg';
        $shop->name = 'Shop 1';
        $shop->phone = '+123456789';
        $shop->email = 'vendor@test.com';
        $shop->address = 'Budapest, Hungary';
        $shop->description = 'vendor shop description';
        $shop->user_id = $user->id;
        $shop->save();
    }
}
