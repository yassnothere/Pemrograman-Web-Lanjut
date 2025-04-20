<?php

namespace Database\Seeders;

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
            ["stok_id" => 1, "supplier_id" => 1, "barang_id" => 1, "user_id" => 1, "stok_tanggal" => "2025-04-17 12:00:00", "jumlah" => 100, "created_at" => now(), "updated_at" => NULL], // Matematika
            ["stok_id" => 2, "supplier_id" => 2, "barang_id" => 2, "user_id" => 1, "stok_tanggal" => "2025-04-17 12:00:00", "jumlah" => 75, "created_at" => now(), "updated_at" => NULL], // Cerita Rakyat
            ["stok_id" => 3, "supplier_id" => 2, "barang_id" => 3, "user_id" => 2, "stok_tanggal" => "2025-04-17 12:00:00", "jumlah" => 60, "created_at" => now(), "updated_at" => NULL], // Laskar Pelangi
            ["stok_id" => 4, "supplier_id" => 1, "barang_id" => 4, "user_id" => 2, "stok_tanggal" => "2025-04-17 12:00:00", "jumlah" => 90, "created_at" => now(), "updated_at" => NULL], // Ensiklopedia Sains
            ["stok_id" => 5, "supplier_id" => 3, "barang_id" => 5, "user_id" => 1, "stok_tanggal" => "2025-04-17 12:00:00", "jumlah" => 120, "created_at" => now(), "updated_at" => NULL], // Doraemon
        ];

        DB::table('t_stok')->insert($data);
    }
}
