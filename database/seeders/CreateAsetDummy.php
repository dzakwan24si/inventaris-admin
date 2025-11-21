<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Aset;
use App\Models\KategoriAset;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAsetDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID'); // Locale Indonesia

        // 1. Ambil semua ID yang sudah ada di tabel kategori_asets
        $kategoriIds = KategoriAset::pluck('kategori_id')->toArray();

        // Cek jika tabel kategori masih kosong
        if (empty($kategoriIds)) {
            echo "⚠️ ERROR: Tabel kategori_asets kosong. Jalankan KategoriAsetSeeder terlebih dahulu.\n";
            return;
        }

        $lokasiList = ['Kantor Kepala Desa', 'Ruang Rapat Utama', 'Gudang Logistik', 'Lantai 2', 'Area Parkir'];
        $kondisiList = ['Baik', 'Rusak Ringan', 'Rusak Berat'];

        for ($i = 1; $i <= 100; $i++) {
            // Gabungan kata acak untuk nama aset
            $namaAset = $faker->randomElement(['Komputer', 'Monitor', 'Meja', 'Kursi', 'Kendaraan']) . ' ' . $faker->randomLetter() . ' ' . $faker->randomNumber(2);

            Aset::create([
                // Kode Aset yang dijamin unik dan memiliki format (AST-001 hingga AST-100)
                'kode_aset' => 'AST-' . str_pad($i, 3, '0', STR_PAD_LEFT),

                'kategori_id' => $faker->randomElement($kategoriIds), // Pilih ID kategori yang valid

                'nama_aset' => $namaAset,

                // Tanggal perolehan dalam 5 tahun terakhir
                'tanggal_perolehan' => $faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),

                // Nilai perolehan (DECIMAL 15,2)
                'nilai_perolehan' => $faker->randomFloat(2, 100000, 50000000),

                // Kondisi (ENUM)
                'kondisi' => $faker->randomElement($kondisiList),

                'lokasi' => $faker->randomElement($lokasiList),

                'penanggung_jawab' => $faker->name,

                // Keterangan (TEXT)
                'keterangan' => $faker->paragraphs(1, true),
            ]);
        }
    }
}
