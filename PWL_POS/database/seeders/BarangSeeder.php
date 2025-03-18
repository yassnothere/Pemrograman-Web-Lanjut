<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_barang' => 'Laptop', 'supplier_id' => 1, 'kategori_id' => 1, 'harga' => 8000000],
            ['nama_barang' => 'Mouse', 'supplier_id' => 1, 'kategori_id' => 1, 'harga' => 200000],
            ['nama_barang' => 'Keyboard', 'supplier_id' => 1, 'kategori_id' => 1, 'harga' => 300000],
            ['nama_barang' => 'Monitor', 'supplier_id' => 1, 'kategori_id' => 1, 'harga' => 2000000],
            ['nama_barang' => 'Printer', 'supplier_id' => 1, 'kategori_id' => 1, 'harga' => 1500000],

            ['nama_barang' => 'Baju Kaos', 'supplier_id' => 2, 'kategori_id' => 2, 'harga' => 100000],
            ['nama_barang' => 'Celana Jeans', 'supplier_id' => 2, 'kategori_id' => 2, 'harga' => 250000],
            ['nama_barang' => 'Jaket', 'supplier_id' => 2, 'kategori_id' => 2, 'harga' => 300000],
            ['nama_barang' => 'Sepatu', 'supplier_id' => 2, 'kategori_id' => 2, 'harga' => 400000],
            ['nama_barang' => 'Topi', 'supplier_id' => 2, 'kategori_id' => 2, 'harga' => 50000],

            ['nama_barang' => 'Roti', 'supplier_id' => 3, 'kategori_id' => 3, 'harga' => 20000],
            ['nama_barang' => 'Susu', 'supplier_id' => 3, 'kategori_id' => 3, 'harga' => 15000],
            ['nama_barang' => 'Kopi', 'supplier_id' => 3, 'kategori_id' => 3, 'harga' => 10000],
            ['nama_barang' => 'Teh', 'supplier_id' => 3, 'kategori_id' => 3, 'harga' => 8000],
            ['nama_barang' => 'Gula', 'supplier_id' => 3, 'kategori_id' => 3, 'harga' => 12000],
        ];
        DB::table('m_barang')->insert($data);

    }
}
