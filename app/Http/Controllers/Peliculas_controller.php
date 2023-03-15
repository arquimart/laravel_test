<?php

namespace App\Http\Controllers;

use App\model\Peliculas;
use App\model\Categorias;
use App\model\Historial_compras;
use App\model\Historial_rentas;
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

    public function operacion($id)
    {
        $peliculas=DB::table("peliculas")
        ->select("*")
        ->where("peliculas.id",$id)
        ->get();
        return view("peliculas.operaciones",["peli"=>$peliculas])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }

    public function operacionAccion(Request $request,$id)
    {
        $peliculas=DB::table("peliculas")
        ->select("*")
        ->where("peliculas.id",$id)
        ->get();

        try {
            if($request->post("cantidad")>$peliculas[0]->cantidad_disponible){

                return view("peliculas.operaciones",["peli"=>$peliculas,"exceso"=>1])
                ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
            }else{
                if($request->post("opcion")=="re"){
                    $renta=new Historial_rentas();
                    $renta->id_pelicula=$id;
                    $renta->id_usuario=Auth::user()->id;
                    $renta->cantidad=$request->post("cantidad");
                    $renta->precio=$peliculas[0]->precio_renta;
                    $renta->total=$peliculas[0]->precio_renta*$request->post("cantidad");
                    $renta->devuelta=false;
                    $renta->save();
                    $peliculas=Peliculas::find($id);
                    $peliculas->cantidad_disponible-=$request->post("cantidad");
                    $peliculas->save();
                    return redirect()->route("peliculas.index");
                }elseif($request->post("opcion")=="co"){
                    $compra=new Historial_compras();
                    $compra->id_pelicula=$id;
                    $compra->id_usuario=Auth::user()->id;
                    $compra->cantidad=$request->post("cantidad");
                    $compra->precio=$peliculas[0]->precio_renta;
                    $compra->total=$peliculas[0]->precio_renta*$request->post("cantidad");
                    $renta->save();
                    $peliculas=Peliculas::find($id);
                    $peliculas->cantidad_disponible-=$request->post("cantidad");
                    $peliculas->save();
                    return redirect()->route("peliculas.index");
                }
            }
        }catch (\Throwable $th) {
            echo('<script>');
            echo('alert("la cantidad no es valida")');
            echo('</script>');
            return view("peliculas.operaciones",["peli"=>$peliculas])
            ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
        }



    }
}
