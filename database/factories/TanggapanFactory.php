<?php

namespace Database\Factories;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanggapan>
 */
class TanggapanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pengaduan_id' => Pengaduan::factory(),
            'user_id' => User::factory(),
            'isi_tanggapan' => $this->faker->paragraph,
        ];
    }
}
