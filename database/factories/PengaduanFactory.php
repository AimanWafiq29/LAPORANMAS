<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaduan>
 */
class PengaduanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'kategori_id' => Kategori::factory(),
            'judul' => $this->faker->title,
            'deskripsi' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['baru', 'diproses', 'selesai']),
            'foto_pengaduan' => null,
        ];
    }
}
