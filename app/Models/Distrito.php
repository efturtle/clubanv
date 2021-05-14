<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distrito extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nombre', 'ciudad', 'estado', 'coordinador_id', 'pastor_id'];

    public function club()
    {
        return $this->hasMany(Club::class);
    }
    public function coordinador()
    {
        return $this->hasOne(User::class, 'id', 'coordinador_id');
    }

    public function pastor()
    {
        return $this->hasOne(User::class, 'id', 'pastor_id');
    }
}
