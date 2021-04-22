<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectorInfo extends Model
{
    use HasFactory;

    protected $fillable = ['rol', 'email', 'club','category', 'direccion', 'codigoPostal', 'sexo', 'tipoSangre', 'nacionalidad', 'estado', 'ciudad','asignado','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
