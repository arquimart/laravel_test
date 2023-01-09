<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Renta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentasController extends Controller
{
    public function renta(Pelicula $pelicula)
    {
        return view('Renta.nueva-renta', compact('pelicula'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $pelicula = Pelicula::find($request->pelicula_id);
        $pelicula->disponible = false;
        $pelicula->save();
        $renta = Renta::create([
            'pelicula_id' => $request->pelicula_id,
            'user_id' => $user->id,
            'fecha_renta' => $request->fecha_renta,
            'fecha_devolucion' => $request->fecha_devolucion,
            'devuelto' => false,
        ]);
        return redirect('/peliculas');
    }

    public function showRentas()
    {
        $userid = auth()->user()->getAuthIdentifier();
        $rentas = DB::table('rentas')
        ->select('rentas.*', 'peliculas.title as pelicula')
        ->join('peliculas','rentas.pelicula_id','=','peliculas.id')
        ->where('rentas.user_id','=',$userid)
        ->get();
        return view('Renta.show-rentas', compact('rentas'));
    }

    public function devolver(Renta $renta){
        $pelicula = Pelicula::find($renta->pelicula_id);
        $pelicula->disponible = true;
        $pelicula->save();
        $renta->devuelto = true;
        $renta->fecha_devolucion = date('Y-m-d');
        $renta->save();
        return back();
    }

}
