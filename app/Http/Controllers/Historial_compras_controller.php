<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Historial_compras;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Historial_compras_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $compras=DB::table("historial_compras")->join("peliculas","peliculas.id","=","historial_compras.id_pelicula")->join("users","users.id","=","historial_compras.id_usuario")
        ->select("peliculas.titulo as titulo","users.name as usuario","historial_compras.cantidad as cant","historial_compras.precio as prec",
        "historial_compras.total as tl","historial_compras.id as idc")
        ->get();
        return view("historialcompra.historialCompras",["compras"=>$compras])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
