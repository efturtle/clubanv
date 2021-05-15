<?php

namespace Database\Factories;

use App\Models\MiembrosInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MiembrosInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MiembrosInfo::class;

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
            'club' => $this->faker->word,
            'categoria' => $this->faker->randomElement([1,2,3]),
            'fechaNacimiento' => $this->faker->date,
            'edad' => $this->faker->randomElement([14,15,16]),
            'direccion' => $this->faker->address,
            'provincia_colonia' => $this->faker->city,
            'codigoPostal' => $this->faker->countryCode,
            'estado' => $this->faker->state,
            'ciudad' => $this->faker->city,
            'nacionalidad' => $this->faker->country,
            'tipoSangre' => $this->faker->bloodType,
            'confirmaAlergias' => $this->faker->randomElement(['si', 'no', 'desconoce']),
            'alergia' => $this->faker->randomElement([$this->faker->words(1,true),$this->faker->words(2,true), $this->faker->words(3,true)]),
            'sexo' => $this->faker->randomElement(['hombre', 'mujer']),
            'nombrePadre' => $this->faker->name,
            'apellidosPadre' => $this->faker->lastName,
            'contactoPadre' => $this->faker->phoneNumber,
            'nombreMadre' => $this->faker->name,
            'apellidosMadre' => $this->faker->lastName,
            'contactoMadre' => $this->faker->phoneNumber,
            'iglesia' => $this->faker->word,
            'clasePorCursar' => $this->faker->word,
            'ultimaClaseCursada' => $this->faker->word,
            'bautizado' => $this->faker->boolean,
            'investido' => $this->faker->word,
            'tipoAspirante_consejero' => $this->faker->word,
            'fechaInvestidura' => $this->faker->date,
            'tiempoServicio' => $this->faker->date,
            'nombreCurso' => $this->faker->word,
            'cursoActual' => $this->faker->word,
            'libros' => $this->faker->words(5),
            'especialidad' => $this->faker->word,
            'estatus' => $this->faker->date
        ];
    }
}