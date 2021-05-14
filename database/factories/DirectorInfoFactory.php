<?php

namespace Database\Factories;

use App\Models\DirectorInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DirectorInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rol' => $this->faker->randomElement([6,7]),
            'asignado' => 0,
        ];
    }
}
