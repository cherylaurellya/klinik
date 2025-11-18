<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder yang baru kita buat
        $this->call([
            UserRoleSeeder::class,
            // Anda bisa tambahkan seeder lain di sini
            // misalnya: JadwalDokterSeeder::class
        ]);
    }
}