<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
        //     return [
    //         'name' => fake()->name(),
    //         'email' => fake()->unique()->safeEmail(),
    //         'email_verified_at' => now(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //         'remember_token' => Str::random(10),
    //     ];
    // }
    
    public function definition()
    {    return [
            'nik' => $this->faker->unique()->numerify('##############'),
            'nama_lengkap' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('123456'), // Change this as needed
            'role' => $this->faker->numberBetween(0, 3),
            'kebangsaan' => 'Indonesia',
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'alamat' => $this->faker->address,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'no_telepon' => $this->faker->phoneNumber,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'foto' => null,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
