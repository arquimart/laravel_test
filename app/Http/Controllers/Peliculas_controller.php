<?php

namespace App\Http\Controllers;

use App\model\Peliculas;
use App\model\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Peliculas_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$peliculas=Peliculas::all();
        $peliculas=DB::table("peliculas")->join("categorias","categorias.id","=","peliculas.id_categoria")
        ->select("peliculas.id as id","peliculas.titulo as titulo","categorias.nombre as nombre","peliculas.agno_estreno as agno",
        "peliculas.precio_renta as pr","peliculas.precio_compra as cmp","peliculas.cantidad_disponible as cant")
        ->get();
        return view("peliculas.peliculas",["peli"=>$peliculas])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }
    public function indexAdmin()
    {
        //$peliculas=Peliculas::all();
        $peliculas=DB::table("peliculas")->join("categorias","categorias.id","=","peliculas.id_categoria")
        ->select("peliculas.id as id","peliculas.titulo as titulo","categorias.nombre as nombre","peliculas.agno_estreno as agno",
        "peliculas.precio_renta as pr","peliculas.precio_compra as cmp","peliculas.cantidad_disponible as cant")
        ->get();
        return view("peliculas.admin",["peli"=>$peliculas])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categorias::all();
        return view("peliculas.create",["cate"=>$categorias])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peliculas=new Peliculas();
        $peliculas->titulo=$request->post("titulo");
        $peliculas->id_categoria=$request->post("cate");
        $peliculas->agno_estreno=$request->post("agno");
        $peliculas->precio_renta=$request->post("pr");
        $peliculas->precio_compra=$request->post("cmp");
        $peliculas->cantidad_disponible=$request->post("cant");
        $peliculas->save();
        return redirect()->route("peliculas.admin");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categorias=Categorias::all();
        $peliculas=DB::table("peliculas")->join("categorias","categorias.id","=","peliculas.id_categoria")
        ->select("peliculas.id as id","peliculas.titulo as titulo","peliculas.agno_estreno as agno",
        "peliculas.precio_renta as pr","peliculas.precio_compra as cmp","peliculas.cantidad_disponible as cant","peliculas.id_categoria as idc")
        ->where("peliculas.id",$id)
        ->get();
        return view("peliculas.update",compact("categorias","peliculas"))
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }


    public function update(Request $request, $id)
    {
        $peliculas=Peliculas::find($id);
        $peliculas->titulo=$request->post("titulo");
        $peliculas->id_categoria=$request->post("cate");
        $peliculas->agno_estreno=$request->post("agno");
        $peliculas->precio_renta=$request->post("pr");
        $peliculas->precio_compra=$request->post("cmp");
        $peliculas->cantidad_disponible=$request->post("cant");
        $peliculas->save();
        return redirect()->route("peliculas.admin");
    }


    public function destroy($id)
    {
        $peliculas=Peliculas::destroy($id);
        return redirect()->route("peliculas.admin");
    }
}
