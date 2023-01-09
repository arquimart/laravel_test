<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';
    protected $fillable = ['title', 'category', 'release_date', 'description','disponible'];
    protected $guarded = ['id', 'created_at', 'update_at'];
}
