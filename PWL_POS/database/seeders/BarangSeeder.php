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
            ["barang_id" => 1, "kategori_id" => 1, "barang_kode" => "BRG001", "barang_nama" => "Laptop", "harga_beli" => "5000000", "harga_jual" => "7000000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 2, "kategori_id" => 1, "barang_kode" => "BRG002", "barang_nama" => "Smartphone", "harga_beli" => "3000000", "harga_jual" => "4500000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 3, "kategori_id" => 2, "barang_kode" => "BRG006", "barang_nama" => "Kemeja", "harga_beli" => "100000", "harga_jual" => "150000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 4, "kategori_id" => 2, "barang_kode" => "BRG007", "barang_nama" => "Celana Jeans", "harga_beli" => "200000", "harga_jual" => "300000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 5, "kategori_id" => 3, "barang_kode" => "BRG011", "barang_nama" => "Pensil", "harga_beli" => "2000", "harga_jual" => "5000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 6, "kategori_id" => 3, "barang_kode" => "BRG012", "barang_nama" => "Buku Tulis", "harga_beli" => "5000", "harga_jual" => "10000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL]
        ];
        DB::table('m_barang')->insert($data);
    }
}
