<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DirectorInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rol', 'email','category', 'direccion', 'codigoPostal', 'sexo', 'tipoSangre', 'nacionalidad', 'estado', 'ciudad','asignado','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
