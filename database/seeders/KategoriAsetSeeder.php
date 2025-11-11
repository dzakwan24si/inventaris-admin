<?php

namespace Database\Seeders;

use App\Models\KategoriAset;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriAset::create(['nama' => 'Elektronik', 'kode' => 'ELK', 'deskripsi' => 'Aset elektronik']);
        KategoriAset::create(['nama' => 'Furnitur', 'kode' => 'FNT', 'deskripsi' => 'Perabot kantor']);
        KategoriAset::create(['nama' => 'Alat Tulis Kantor', 'kode' => 'ATK', 'deskripsi' => 'Aset ATK']);
    }
}
