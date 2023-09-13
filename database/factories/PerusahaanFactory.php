<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perusahaan>
 */
class PerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            // 'name_perusahaan' => fake('id_ID')->company(),
            'nama_perusahaan'
            => "PT. INDOMARCO TBK",
            'alamat'
            => fake('id_ID')->address()
        ];
    }
}
