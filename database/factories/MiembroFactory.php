<?php

namespace Database\Factories;

use App\Models\Miembro;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MiembroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Miembro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement([1,2,3]),
            'fechaNacimiento' => $this->faker->date(),
            'edad' => $this->faker->randomElement([14,15,16]),
            'direccion' => $this->faker->address(),
            'provincia_colonia' => $this->faker->city(),
            'codigoPostal' => $this->faker->countryCode(),
            'estado' => $this->faker->state(),
            'ciudad' => $this->faker->city(),
            'nacionalidad' => $this->faker->country(),
            'tipoSangre' => $this->faker->bloodType(),
            'confirmaAlergias' => $this->faker->randomElement(['si', 'no', 'desconoce']),
            'alergia' => $this->faker->randomElement([$this->faker->words(1,true),$this->faker->words(2,true), $this->faker->words(3,true)]),
            'sexo' => $this->faker->randomElement(['hombre', 'mujer']),
            'user_id' => User::factory()->create(),
            'club_id' => $this->faker->randomElement([1,2,3]),
        ];
    }
}
