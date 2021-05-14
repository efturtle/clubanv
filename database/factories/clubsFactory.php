<?php

namespace Database\Factories;

use App\Models\clubs;
use Illuminate\Database\Eloquent\Factories\Factory;

class clubsFactory extends Factory
{
    protected $model = clubs::class;
   
    public function definition()
    {
        return [
            'nombreClub' => $this->faker->word,
            'significado' => $this->faker->word,
            'iglesia' => $this->faker->company,
            'director' => $this->faker->name,
            'subdirector' => $this->faker->name,
            'subdirectora' => $this->faker->name,
            'tesorero' => $this->faker->name,
            'secretario' => $this->faker->name,
            'pastor' => $this->faker->name,
            'anciano' => $this->faker->name,
            'fechaAprobacion' => $this->faker->date,
            'numeroVoto' => $this->faker->randomNumber(1, false)
        ];
    }
}