<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['titulo', 'sobre', 'cuerpo', 'privilegio', 'club', 'category', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}