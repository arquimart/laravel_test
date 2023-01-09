<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Renta;
use Illuminate\Http\Request;

class RentasController extends Controller
{
    public function renta(Pelicula $pelicula)
    {
        return view('Renta.nuevaRenta',compact('pelicula'));
    }

    public function store(Request $request)
    {
        $user=auth()->user();
        $pelicula=Pelicula::find($request->pelicula_id);
        $pelicula->disponible=false;
        $pelicula->save();
        $renta=Renta::create([
            'pelicula_id'=>$request->pelicula_id,
            'user_id'=>$user->id,
            'fecha_renta'=>$request->fecha_renta,
            'fecha_devolucion'=>$request->fecha_devolucion,
            'devuelto'=>false,
        ]);
        return redirect('/peliculas');
    }


}

