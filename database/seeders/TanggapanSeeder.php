<?php

namespace Database\Seeders;

use App\Models\Tanggapan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TanggapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tanggapan::factory()->count(3)->create();
    }
}
