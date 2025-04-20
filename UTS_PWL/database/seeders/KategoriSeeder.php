<?php

namespace Database\Seeders;

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
            ["kategori_id" => 1, "kategori_buku" => "KTB001", "kategori_nama" => "Buku Pelajaran", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 2, "kategori_buku" => "KTB002", "kategori_nama" => "Buku Cerita", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 3, "kategori_buku" => "KTB003", "kategori_nama" => "Novel", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 4, "kategori_buku" => "KTB004", "kategori_nama" => "Komik", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["kategori_id" => 5, "kategori_buku" => "KTB005", "kategori_nama" => "Ensiklopedia", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL]
        ];
        DB::table('m_kategori')->insert($data);
    }
}
