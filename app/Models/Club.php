<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['nombreClub','significado','iglesia','tesorero','anciano','secretario',
    'director_id','pastor_id','subdirector','subdirectora','fechaAprobacion','numeroVoto','foto','directorAventurero_id',
     'directorConquistador_id', 'directorGuiasMayores_id', 'distrito_id'];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function director()
    {
        return $this->hasOne(User::class, 'id', 'director_id');
    }

    public function pastor()
    {
        return $this->hasOne(User::class, 'id', 'pastor_id');
    }
    
    public function directorAventurero()
    {
        return $this->hasOne(User::class,'id', 'directorAventurero_id');
    }
    public function directorConquistador()
    {
        return $this->hasOne(User::class, 'id', 'directorConquistador_id');
    }
    public function directorGuiasMayores()
    {
        return $this->hasOne(User::class, 'id', 'directorGuiasMayores_id');
    }
}
