<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $seller = User::where('email', 'seller@localkita.com')->first();
        if (!$seller) {
            return;
        }

        // Additional dummy sellers for variety
        $seller2 = User::firstOrCreate(
            ['email' => 'ibu.nani@localkita.com'],
            ['name' => 'Ibu Nani', 'password' => bcrypt('password'), 'role' => 'seller']
        );

        $seller3 = User::firstOrCreate(
            ['email' => 'pak.budi@localkita.com'],
            ['name' => 'Pak Budi', 'password' => bcrypt('password'), 'role' => 'seller']
        );

        $catKuliner = Category::where('slug', Str::slug('Kuliner & Warung Makan'))->first();
        $catKelontong = Category::where('slug', Str::slug('Kelontong & Sembako'))->first();
        $catJasa = Category::where('slug', Str::slug('Jasa & Perbaikan'))->first();

        // Store 1: Warung Nasi Ibu Nani
        $store1 = Store::firstOrCreate(
            ['slug' => 'warung-nasi-ibu-nani'],
            [
                'user_id' => $seller2->id,
                'name' => 'Warung Nasi & Kelontong Ibu Nani',
                'description' => 'Menyediakan masakan rumahan lezat, nasi uduk pagi, ayam penyet, serta kebutuhan sembako harian warga.',
                'phone_number' => '6281234567890',
                'address' => 'Jl. Tanah Seratus No. 12, RT 02/RW 03, Ciledug',
                'landmark' => 'Masuk Gang Masjid Al-Ikhlas sekitar 50 meter, rumah pagar hijau depan pohon mangga besar.',
                'latitude' => '-6.23456',
                'longitude' => '106.71234',
                'status' => 'open',
                'is_approved' => true,
                'image' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?auto=format&fit=crop&w=800&q=80',
            ]
        );

        // Store 2: Warkop & Mie Aceh Pak Budi
        $store2 = Store::firstOrCreate(
            ['slug' => 'warkop-mie-aceh-pak-budi'],
            [
                'user_id' => $seller3->id,
                'name' => 'Warkop & Mie Aceh Pak Budi',
                'description' => 'Aneka kopi khas Aceh, mie aceh goreng/rebus rempah spesial, roti bakar, dan tempat nongkrong warga.',
                'phone_number' => '6289876543210',
                'address' => 'Jl. Gang H. Salmah No. 45, Tanah Seratus',
                'landmark' => 'Samping pos ronda RT 04, persis di seberang lapangan bulutangkis warga.',
                'latitude' => '-6.23678',
                'longitude' => '106.71456',
                'status' => 'open',
                'is_approved' => true,
                'image' => 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=800&q=80',
            ]
        );

        // Store 3: Bengkel Motor Berkah Jaya
        $store3 = Store::firstOrCreate(
            ['slug' => 'bengkel-motor-berkah-jaya'],
            [
                'user_id' => $seller->id,
                'name' => 'Bengkel Motor Berkah Jaya',
                'description' => 'Servis rutin sepeda motor, ganti oli, tambal ban, dan penjualan sparepart motor terpercaya.',
                'phone_number' => '6285712348899',
                'address' => 'Jl. Utama Tanah Seratus No. 88',
                'landmark' => 'Sebelah gapura masuk RW 03, bangunan spanduk merah Shell.',
                'latitude' => '-6.23890',
                'longitude' => '106.71678',
                'status' => 'closed', // Closed for testing status indicator
                'is_approved' => true,
                'image' => 'https://images.unsplash.com/photo-1530046339160-ce3e530c7d2f?auto=format&fit=crop&w=800&q=80',
            ]
        );

        // Products for Store 1 (Ibu Nani)
        Product::firstOrCreate(
            ['store_id' => $store1->id, 'name' => 'Nasi Ayam Penyet Sambal Terasi'],
            [
                'category_id' => $catKuliner?->id,
                'slug' => 'nasi-ayam-penyet',
                'description' => 'Nasi hangat + Ayam goreng empuk dipenyet dengan sambal terasi pedas khas Ibu Nani, tahu, tempe, dan lalapan.',
                'price' => 20000,
                'image' => 'https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?auto=format&fit=crop&w=600&q=80',
                'is_available' => true,
            ]
        );

        Product::firstOrCreate(
            ['store_id' => $store1->id, 'name' => 'Nasi Uduk Komplit'],
            [
                'category_id' => $catKuliner?->id,
                'slug' => 'nasi-uduk-komplit',
                'description' => 'Nasi uduk wangi gurih dengan orek tempe, biun goreng, telur balado, dan kerupuk.',
                'price' => 15000,
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80',
                'is_available' => true,
            ]
        );

        Product::firstOrCreate(
            ['store_id' => $store1->id, 'name' => 'Minyak Goreng Kita 1 Liter'],
            [
                'category_id' => $catKelontong?->id,
                'slug' => 'minyak-goreng-1l',
                'description' => 'Minyak goreng kemasan pouch 1 Liter.',
                'price' => 17000,
                'image' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?auto=format&fit=crop&w=600&q=80',
                'is_available' => true,
            ]
        );

        // Products for Store 2 (Pak Budi)
        Product::firstOrCreate(
            ['store_id' => $store2->id, 'name' => 'Mie Aceh Spesial Daging'],
            [
                'category_id' => $catKuliner?->id,
                'slug' => 'mie-aceh-spesial-daging',
                'description' => 'Mie aceh kuah/goreng kaya rempah dengan irisan daging sapi empuk, emping, dan acar bawang.',
                'price' => 25000,
                'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?auto=format&fit=crop&w=600&q=80',
                'is_available' => true,
            ]
        );

        Product::firstOrCreate(
            ['store_id' => $store2->id, 'name' => 'Kopi Sanger Aceh Panas'],
            [
                'category_id' => $catKuliner?->id,
                'slug' => 'kopi-sanger-aceh',
                'description' => 'Kopi saring khas Aceh dikocok dengan sedikit susu kental manis, rasa gurih kopi mantap.',
                'price' => 12000,
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=600&q=80',
                'is_available' => true,
            ]
        );

        // Products for Store 3 (Bengkel)
        Product::firstOrCreate(
            ['store_id' => $store3->id, 'name' => 'Paket Servis Ringan + Ganti Oli Matic'],
            [
                'category_id' => $catJasa?->id,
                'slug' => 'paket-servis-oli-matic',
                'description' => 'Pembersihan karburator/injector, pengecekan rem, transmisi CVT, dan Oli Mesin MPX2 / Shell Advance.',
                'price' => 75000,
                'image' => 'https://images.unsplash.com/photo-1486006920555-c77dce18193b?auto=format&fit=crop&w=600&q=80',
                'is_available' => true,
            ]
        );
    }
}
