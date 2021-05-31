<?php

namespace Database\Factories;

use App\Models\Director;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Director::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'rol' => $this->faker->randomDigitNot(0),
            'asignado' => 0,
        ];
    }
}
