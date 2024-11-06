<?php

namespace Database\Seeders;

use App\Models\Detailpenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'username' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'User',
            'password' => bcrypt('test@example.com'),
        ]);
        Produk::create([
            'gambar' => 'Kopi.png',
            'nama_produk' => 'Kopi',
            'harga' => '100000',
            'stok' => '100',
        ]);
        Pelanggan::create([
            'nama_pelanggan' => 'al',
            'no_tlp' => '089696',
            'alamat' => 'Cina Barat',
        ]);
        Penjualan::create([
            'id_user' => '1',
            'id_pelanggan' => '1',
            'tgl_penjualan' => '2222-02-05',
            'total_harga' => '0',
        ]);
    }
}
