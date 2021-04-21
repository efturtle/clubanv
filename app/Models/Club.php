<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['directorAventurero_id', 'directorConquistador_id', 'directorGuiasMayores_id'];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }
    
    public function directorAventurero()
    {
        return $this->hasOne(User::class, 'directorAventurero_id');
    }
    public function directorConquistador()
    {
        return $this->hasOne(User::class, 'directorConquistador_id');
    }
    public function directorGuiasMayores()
    {
        return $this->hasOne(User::class, 'directorGuiasMayores_id');
    }
}
