<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_kode' => 'ELK', 'nama_kategori' => 'Elektronik'],
            ['kategori_kode' => 'PAK', 'nama_kategori' => 'Pakaian'],
            ['kategori_kode' => 'MKN', 'nama_kategori' => 'Makanan'],
            ['kategori_kode' => 'MIN', 'nama_kategori' => 'Minuman'],
            ['kategori_kode' => 'PRT', 'nama_kategori' => 'Peralatan Rumah Tangga'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
