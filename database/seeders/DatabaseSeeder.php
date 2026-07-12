<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['username' => 'admin'], // dicari berdasarkan username
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com', // tetap diisi walau tidak dipakai login, karena kolom ini wajib ada nilainya
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}