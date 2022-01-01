<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status_aktif = $this->faker->randomElement(['Y', 'N']);
        return [
            'peran' => $this->faker->text(20),
            'aktif' => $status_aktif
        ];
    }
}
