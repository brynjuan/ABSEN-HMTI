<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@absen.test'],
            [
                'name' => 'Administrator',
                'email' => 'admin@absen.test',
                'nim' => 'F55123001',
                'prodi' => 'Manajemen Informatika',
                'tahun_angkatan' => '2023',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'qr_data' => 'F55123001',
            ]
        );

        User::updateOrCreate(
            ['email' => 'anggota@absen.test'],
            [
                'name' => 'Anggota HMTI',
                'email' => 'anggota@absen.test',
                'nim' => 'F55123002',
                'prodi' => 'Teknik Informatika',
                'tahun_angkatan' => '2023',
                'password' => Hash::make('password'),
                'role' => 'anggota',
                'qr_data' => 'F55123002',
            ]
        );
    }
}
