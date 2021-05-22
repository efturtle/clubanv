<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rol', 'email','category', 'direccion', 'codigoPostal', 'sexo', 'tipoSangre', 'nacionalidad', 'estado', 'ciudad','asignado','user_id', 'club_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
