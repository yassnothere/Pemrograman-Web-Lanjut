<?php

namespace Database\Seeders;

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
            ["barang_id" => 1, "kategori_id" => 1, "barang_kode" => "BRG001", "barang_nama" => "Matematika SMA Kelas 12", "harga_beli" => "50000", "harga_jual" => "75000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 2, "kategori_id" => 1, "barang_kode" => "BRG002", "barang_nama" => "Fisika Dasar", "harga_beli" => "60000", "harga_jual" => "85000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            
            ["barang_id" => 3, "kategori_id" => 2, "barang_kode" => "BRG003", "barang_nama" => "Cerita Rakyat Nusantara", "harga_beli" => "30000", "harga_jual" => "50000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 4, "kategori_id" => 2, "barang_kode" => "BRG004", "barang_nama" => "Dongeng Anak Dunia", "harga_beli" => "25000", "harga_jual" => "40000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            
            ["barang_id" => 5, "kategori_id" => 3, "barang_kode" => "BRG005", "barang_nama" => "Laskar Pelangi", "harga_beli" => "45000", "harga_jual" => "65000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 6, "kategori_id" => 3, "barang_kode" => "BRG006", "barang_nama" => "Bumi", "harga_beli" => "55000", "harga_jual" => "80000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            
            ["barang_id" => 7, "kategori_id" => 4, "barang_kode" => "BRG007", "barang_nama" => "One Piece Vol. 1", "harga_beli" => "30000", "harga_jual" => "45000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 8, "kategori_id" => 4, "barang_kode" => "BRG008", "barang_nama" => "Doraemon Vol. 5", "harga_beli" => "25000", "harga_jual" => "40000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            
            ["barang_id" => 9, "kategori_id" => 5, "barang_kode" => "BRG009", "barang_nama" => "Ensiklopedia Sains", "harga_beli" => "100000", "harga_jual" => "150000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
            ["barang_id" => 10, "kategori_id" => 5, "barang_kode" => "BRG010", "barang_nama" => "Ensiklopedia Hewan", "harga_beli" => "95000", "harga_jual" => "140000", "created_at" => "2025-03-09 10:32:54", "updated_at" => NULL],
        ];

        DB::table('m_barang')->insert($data);
    }
}
