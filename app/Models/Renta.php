<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $table = 'rentas';
    protected $fillable = [
        'pelicula_id',
        'user_id',
        'fecha_renta',
        'fecha_devolucion',
        'devuelto',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
