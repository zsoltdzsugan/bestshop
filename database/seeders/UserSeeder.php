<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Test Admin',
                'username' => 'admin',
                'email' => 'admin@test.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test Vendor',
                'username' => 'vendor',
                'email' => 'vendor@test.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Test User',
                'username' => 'user',
                'email' => 'user@test.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
