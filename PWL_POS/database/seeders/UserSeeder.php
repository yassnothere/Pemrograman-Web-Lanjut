<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["user_id" => 1, "level_id" => 1, "username" => "admin", "nama" => "Administrator", "password" => Hash::make('12345')],
            ["user_id" => 2, "level_id" => 2, "username" => "manager", "nama" => "Manager", "password" => Hash::make('12345')],
            ["user_id" => 3, "level_id" => 3, "username" => "staff", "nama" => "Staff/Kasir", "password" => Hash::make('12345')],
            ["user_id" => 4, "level_id" => 4, "username" => "customer-1", "nama" => "Pelanggan", "password" => Hash::make('12345'),],
            ["user_id" => 5, "level_id" => 2, "username" => "manager_dua", "nama" => "Manager 2", "password" => Hash::make('12345')],
            ["user_id" => 8, "level_id" => 2, "username" => "manager33", "nama" => "Manager tiga tiga", "password" => Hash::make('12345')]
        ];
        DB::table('m_user')->insert($data);
    }
}
