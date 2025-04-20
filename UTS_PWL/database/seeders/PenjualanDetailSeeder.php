<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["detail_id" => 1, "penjualan_id" => 1, "barang_id" => 1, "harga" => 40000, "jumlah" => 2, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL], // Buku Pelajaran
            ["detail_id" => 2, "penjualan_id" => 1, "barang_id" => 2, "harga" => 25000, "jumlah" => 1, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL], // Buku Cerita
            ["detail_id" => 3, "penjualan_id" => 2, "barang_id" => 4, "harga" => 20000, "jumlah" => 3, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL], // Komik
            ["detail_id" => 4, "penjualan_id" => 3, "barang_id" => 5, "harga" => 80000, "jumlah" => 1, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL]  // Ensiklopedia
        ];
        DB::table('t_penjualan_detail')->insert($data);
    }
}
