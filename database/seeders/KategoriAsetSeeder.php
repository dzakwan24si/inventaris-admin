<?php

namespace Database\Seeders;

use App\Models\KategoriAset;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        // Daftar kata dasar untuk membuat nama kategori yang variatif
        $prefix = ['Alat', 'Mesin', 'Perabotan', 'Kendaraan', 'Elektronik', 'Gedung', 'Tanah', 'Instalasi', 'Jaringan', 'Perangkat'];
        $suffix = ['Kantor', 'Produksi', 'Gudang', 'Dinas', 'Umum', 'Khusus', 'Berat', 'Ringan', 'Laboratorium', 'Medis'];

        for ($i = 1; $i <= 100; $i++) {
            // Membuat nama kategori unik dengan menggabungkan kata secara acak
            // Contoh hasil: "Alat Kantor", "Mesin Produksi", "Kendaraan Dinas A", dll.
            $namaKategori = $faker->randomElement($prefix) . ' ' . $faker->randomElement($suffix) . ' ' . $faker->randomLetter();

            // Membuat kode unik, misal: "KAT-001", "KAT-002", dst.
            $kodeKategori = 'KAT-' . str_pad($i, 3, '0', STR_PAD_LEFT);

            DB::table('kategori_asets')->insert([
                'nama' => $namaKategori,
                'kode' => $kodeKategori,
                'deskripsi' => $faker->sentence(10), // Deskripsi singkat
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
