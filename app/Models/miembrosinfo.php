<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miembrosinfo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','club', 'categoria','fechaNacimiento', 'edad','direccion', 'provincia_colonia','codigoPostal','sexo',
    'tipoSangre', 'confirmaAlergias', 'alergia', 'nacionalidad','estado','ciudad', 'user_id',
    'nombrePadre', 'apellidosPadre', 'contactoPadre',
    'nombreMadre', 'apellidosMadre', 'contactoMadre', 'iglesia', 'distrito', 'clasePorCursar', 'ultimaClaseCursada'
    , 'investidoUtimaClase', 'bautizado', 'investido', 'tipoAspirante_consejero', 'fechaInvestidura', 'tiempoServicio'
    , 'nombreCurso','cursoActual', 'libros', 'especialidad', 'estatus'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
