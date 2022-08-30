<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,3)),
            'slug'=> $this->faker->slug(mt_rand(2,3)),
            'desSingkat' => $this->faker->paragraph(mt_rand(4,5)),
            'desFull' => $this->faker->paragraph(mt_rand(10,20)),
            'category_id' => mt_rand(1,3),
            'image' => mt_rand(1,2)
        ];
    }
}
