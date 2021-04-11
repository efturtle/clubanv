<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorInfo extends Model
{
    use HasFactory;

    protected $fillable = ['rol', 'email', 'club','categoria', 'direccion', 'codigoPostal', 'sexo', 'tipoSangre', 'nacionalidad', 'estado', 'ciudad','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
