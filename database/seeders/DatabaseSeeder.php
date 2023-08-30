<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $faker->seed(123);
        $this->call(UserSeeder::class);
        $this->call(PengaduanSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(TanggapanSeeder::class);
    }
}
