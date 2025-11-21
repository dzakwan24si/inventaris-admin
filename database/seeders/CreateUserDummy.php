<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;

class CreateUserDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID'); // Menggunakan locale Indonesia

        // Kita hash password sekali saja di luar loop agar proses seeding lebih cepat
        $passwordDefault = Hash::make('password');

        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                // Nama Lengkap
                'name' => $faker->name,

                // Email unik (menggunakan freeEmail agar terlihat real, cth: gmail.com, yahoo.com)
                'email' => $faker->unique()->freeEmail,

                // Password default: 'password'
                'password' => $passwordDefault,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}