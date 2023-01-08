<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';
    protected $fillable = ['name', 'description', 'image', 'release_date', 'disponible'];
    protected $guarded = ['id'];
}
