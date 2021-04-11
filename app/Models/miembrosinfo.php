<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miembrosinfo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_completo', 'fecha_nacimiento', 'edad','direccion','codigoPostal','sexo','tipoSangre', 'confirmaAlergias', 'alergia'
    ,'nacionalidad', 'estado','ciudad', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
