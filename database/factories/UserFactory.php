<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nim = 'F551'.fake()->unique()->numerify('####');

        return [
            'name' => fake()->name(),
            'nim' => $nim,
            'prodi' => fake()->randomElement(['Informatika', 'Sistem Informasi', 'Teknik Komputer']),
            'tahun_angkatan' => (string) fake()->numberBetween(2019, now()->year),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'anggota',
            'qr_data' => $nim,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this;
    }
}
