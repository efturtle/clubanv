<?php

namespace Database\Factories;

use App\Models\Miembros;
use Illuminate\Database\Eloquent\Factories\Factory;

class MiembrosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Miembros::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'usuario' => $this->faker->userName,
            'clave' => $this->faker->password,
            'fechaNacimiento' => $this->faker->date,
            'direccion' => $this->faker->address,
            'provincia_colonia' => $this->faker->city,
            'codigoPostal' => $this->faker->countryCode,
            'nacionalidad' => $this->faker->country,
            'estado' => $this->faker->state,
            'ciudad' => $this->faker->city,
            'tipoSangre' => $this->faker->bloodType,
            'confirmaAlergias' => $this->faker->randomElement(['si', 'no', 'desconoce']),
            'alergia' => $this->faker->randomElement([$this->faker->words(1,true),$this->faker->words(2,true), $this->faker->words(3,true)]),
            'sexo' => $this->faker->randomElement(['hombre', 'mujer']), 
            'nombrePadre' => $this->faker->name,
            'apellidosPadre' => $this->faker->lastName,
            'contactoPadre' => $this->faker->phoneNumber,
            'nombreMadre' => $this->faker->name,
            'apellidosMadre' => $this->faker->lastName,
            'contactoMadre' => $this->faker->phoneNumber
        ];
    }
}