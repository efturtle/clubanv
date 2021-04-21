<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'ciudad', 'estado', 'coordinador_id'];

    public function club()
    {
        return $this->hasMany(Club::class);
    }
    public function coordinador()
    {
        return $this->hasOne(User::class, 'coordinador_id');
    }
}
