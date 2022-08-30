<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(1,2)),
            'diskon' => $this->faker->sentence(mt_rand(1,2)),
            'slug' => $this->faker->slug(mt_rand(1,2)),
            'image' => $this->faker->sentence(mt_rand(1,2)),
            'hargaAwal' => $this->faker->sentence(mt_rand(1,2)),
            'HargaAkhir' => $this->faker->sentence(mt_rand(1,2)),
            'deskripsi' => $this->faker->paragraph(mt_rand(4,5)),
            'expiret' => $this->faker->sentence(mt_rand(1,2)),
            'fasilitas' => $this->faker->paragraph(mt_rand(8,9)),
        ];
    }
}
