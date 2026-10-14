<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin
        User::firstOrCreate(
            ['email' => 'admin@localkita.com'],
            [
                'name' => 'Admin LocalKita',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        // 2. Seller
        User::firstOrCreate(
            ['email' => 'seller@localkita.com'],
            [
                'name' => 'Seller UMKM',
                'password' => Hash::make('password'),
                'role' => 'seller'
            ]
        );

        // 3. Buyer
        User::firstOrCreate(
            ['email' => 'buyer@localkita.com'],
            [
                'name' => 'Warga Pembeli',
                'password' => Hash::make('password'),
                'role' => 'buyer'
            ]
        );
    }
}
