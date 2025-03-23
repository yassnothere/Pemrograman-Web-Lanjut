<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["kategori_id" => 1, "kategori_kode" => "KTG001", "nama_kategori" => "Elektronik", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 2, "kategori_kode" => "KTG002", "nama_kategori" => "Pakaian", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 3, "kategori_kode" => "KTG003", "nama_kategori" => "Makanan", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 4, "kategori_kode" => "KTG004", "nama_kategori" => "Alat Tulis", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 5, "kategori_kode" => "KTG005", "nama_kategori" => "Perabotan", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL]
        ];
        DB::table('m_kategori')->insert($data);
    }
}
