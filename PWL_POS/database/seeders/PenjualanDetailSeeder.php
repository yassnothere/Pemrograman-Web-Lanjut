<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ["detail_id" => 1, "penjualan_id" => 1, "barang_id" => 1, "harga" => 7000000, "jumlah" => 1, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["detail_id" => 2, "penjualan_id" => 1, "barang_id" => 2, "harga" => 4500000, "jumlah" => 1, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["detail_id" => 3, "penjualan_id" => 2, "barang_id" => 6, "harga" => 150000, "jumlah" => 2, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["detail_id" => 4, "penjualan_id" => 3, "barang_id" => 3, "harga" => 300000, "jumlah" => 1, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL]
        ];
        DB::table('t_penjualan_detail')->insert($data);
         
    }
}
