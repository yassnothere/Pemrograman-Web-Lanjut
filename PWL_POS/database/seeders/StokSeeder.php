<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["stok_id" => 1, "supplier_id" => 1, "barang_id" => 1, "user_id" => 1, "stok_tanggal" => "2025-03-09 17:32:54", "jumlah" => 50, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["stok_id" => 2, "supplier_id" => 1, "barang_id" => 2, "user_id" => 1, "stok_tanggal" => "2025-03-09 17:32:54", "jumlah" => 40, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["stok_id" => 3, "supplier_id" => 2, "barang_id" => 6, "user_id" => 2, "stok_tanggal" => "2025-03-09 17:32:54", "jumlah" => 80, "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL]
        ];
        DB::table('t_stok')->insert($data);
    }
}
