<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Club::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreClub' => $this->faker->word(),
            'significado' => $this->faker->word(),
            'iglesia' => $this->faker->company(),
            'tesorero' => $this->faker->name(),
            'secretario' => $this->faker->name(),
            'anciano' => $this->faker->name(),
            'fechaAprobacion' => $this->faker->date(),
            'numeroVoto' => $this->faker->randomNumber(1, false),
            'distrito_id' => $this->faker->numberBetween(1,49),
        ];
    }
}
