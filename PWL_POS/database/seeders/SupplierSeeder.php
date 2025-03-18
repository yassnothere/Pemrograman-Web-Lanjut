<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_supplier' => 'Supplier A', 'kontak' => '081234567890'],
            ['nama_supplier' => 'Supplier B', 'kontak' => '081234567891'],
            ['nama_supplier' => 'Supplier C', 'kontak' => '081234567892'],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
