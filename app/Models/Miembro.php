<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miembro extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nombre', 'category','fechaNacimiento', 'edad','direccion', 'provincia_colonia','codigoPostal','sexo',
    'tipoSangre', 'confirmaAlergias', 'alergia', 'nacionalidad','estado','ciudad', 'user_id',
    'nombrePadre', 'apellidosPadre', 'contactoPadre',
    'nombreMadre', 'apellidosMadre', 'contactoMadre', 'iglesia', 'distrito', 'clasePorCursar', 'ultimaClaseCursada'
    , 'investidoUtimaClase', 'bautizado', 'investido', 'tipoAspirante_consejero', 'fechaInvestidura', 'tiempoServicio'
    , 'nombreCurso','cursoActual', 'libros', 'especialidad', 'estatus','club_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
