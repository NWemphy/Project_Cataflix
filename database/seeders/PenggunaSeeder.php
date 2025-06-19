<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pengguna')->insert([
            'name' => 'admin',
            'email' => 'admin@contoh.com',
            'password' => Hash::make('admin_p4ss'),
            'role' => 'admin',
            'avatar' => 'avatar-default.png',
        ]);
    }
}