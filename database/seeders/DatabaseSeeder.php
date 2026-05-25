<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mapel;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
    'name' => 'Admin',
    'email' => 'admin@test.com',
    'password' => bcrypt('admin123'),
    'email_verified_at' => now(),
    'role' => 'admin',
]);

User::create([
    'name' => 'Siswa 1',
    'email' => 'siswa1@test.com',
    'password' => bcrypt('siswa123'),
    'email_verified_at' => now(),
    'role' => 'siswa',
]);

User::create([
    'name' => 'Siswa 2',
    'email' => 'siswa2@test.com',
    'password' => bcrypt('siswa123'),
    'email_verified_at' => now(),
    'role' => 'siswa',
]);

        // Seed Mapel dengan Hari
        Mapel::create([
            'kode_mapel' => 'MTK01',
            'nama_mapel' => 'Matematika',
            'guru_pengampu' => 'Ibu Siti',
            'jam_pelajaran' => 7,
            'hari' => 'Senin',
        ]);

        Mapel::create([
            'kode_mapel' => 'IND01',
            'nama_mapel' => 'Bahasa Indonesia',
            'guru_pengampu' => 'Bapak Ahmad',
            'jam_pelajaran' => 8,
            'hari' => 'Senin',
        ]);

        Mapel::create([
            'kode_mapel' => 'ING01',
            'nama_mapel' => 'Bahasa Inggris',
            'guru_pengampu' => 'Miss Rina',
            'jam_pelajaran' => 9,
            'hari' => 'Selasa',
        ]);

        Mapel::create([
            'kode_mapel' => 'IPA01',
            'nama_mapel' => 'IPA',
            'guru_pengampu' => 'Bapak Rudi',
            'jam_pelajaran' => 7,
            'hari' => 'Rabu',
        ]);

        Mapel::create([
            'kode_mapel' => 'PKN01',
            'nama_mapel' => 'PKN',
            'guru_pengampu' => 'Ibu Dewi',
            'jam_pelajaran' => 8,
            'hari' => 'Kamis',
        ]);

        Mapel::create([
            'kode_mapel' => 'OLH01',
            'nama_mapel' => 'Olahraga',
            'guru_pengampu' => 'Bapak Budi',
            'jam_pelajaran' => 10,
            'hari' => 'Jumat',
        ]);

        Mapel::create([
            'kode_mapel' => 'SEN01',
            'nama_mapel' => 'Seni Rupa',
            'guru_pengampu' => 'Ibu Lisa',
            'jam_pelajaran' => 10,
            'hari' => 'Senin',
        ]);

        Mapel::create([
            'kode_mapel' => 'MTK02',
            'nama_mapel' => 'Matematika Lanjut',
            'guru_pengampu' => 'Ibu Siti',
            'jam_pelajaran' => 9,
            'hari' => 'Rabu',
        ]);

        Mapel::create([
            'kode_mapel' => 'BIO01',
            'nama_mapel' => 'Biologi',
            'guru_pengampu' => 'Bapak Hendra',
            'jam_pelajaran' => 10,
            'hari' => 'Kamis',
        ]);

        Mapel::create([
            'kode_mapel' => 'TIK01',
            'nama_mapel' => 'TIK',
            'guru_pengampu' => 'Bapak Eko',
            'jam_pelajaran' => 7,
            'hari' => 'Jumat',
        ]);
    }
}