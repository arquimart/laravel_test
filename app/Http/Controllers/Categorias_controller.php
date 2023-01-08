<?php

namespace App\Http\Controllers;

use App\model\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Categorias_controller extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $categorias=Categorias::all();

        $categoriasM=[$categorias,2];

        return view("categorias.categorias",["cate"=>$categoriasM])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $categorias=new Categorias();
        $categorias->nombre=$request->post("nombre");
        $categorias->save();
        return redirect()->route("categorias.index");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $categorias=Categorias::find($id);
        $categorias->nombre=$request->post("nombre");
        $categorias->save();
        return redirect()->route("categorias.index");
    }


    public function destroy($id)
    {
        //
    }
}
