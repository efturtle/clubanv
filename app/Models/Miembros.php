<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miembros extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre', 'apellidos', 'usuario', 'clave', 'fechaNacimiento', 'direccion', 'provincia_colonia', 'codigoPostal', 'nacionalidad', 'estado', 'ciudad', 'tipoSangre',
    'confirmaAlergias', 'alergia', 'sexo', 'nombrePadre', 'apellidosPadre', 'contactoPadre', 'nombreMadre', 'apellidosMadre', 'contactoMadre'];
}
