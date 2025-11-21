<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        foreach (range(1, 100) as $index) {
            DB::table('wargas')->insert([
                'no_ktp' => $faker->unique()->nik(),
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']),
                'pekerjaan' => $faker->jobTitle,
                'telp' => $faker->numerify('08##########'),
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
