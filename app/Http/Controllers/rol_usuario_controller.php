<?php

namespace App\Http\Controllers;


use App\model\Rol_usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Rol_usuario_controller extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


    }


    public function index()
    {
        $roles1=Rol_usuario::all();

        $roles=DB::table("rol_usuario")->join("users","users.id","=","rol_usuario.id_usuario")
        ->select("users.id as id","users.name as name","rol_usuario.admin as admin","users.email as email")
        ->get();

        //dump(DB::table("rol_usuario")->select("admin")->where("id",1)->get()[0]->admin);
        //$var=DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin;
        return view("roles.roles",["roles"=>$roles])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);


    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $roles=DB::table("rol_usuario")->join("users","users.id","=","rol_usuario.id_usuario")
        ->select("users.id as id","users.name as name","rol_usuario.admin as admin","users.email as email")
        ->where("users.id",$id)
        ->get();

        //dump($roles);
        return view("roles.actualiza",["roles"=>$roles])
        ->with("model",DB::table("rol_usuario")->select("admin")->where("id",Auth::user()->id)->get()[0]->admin);
    }


    public function update(Request $request, $id)
    {
        $roles=Rol_usuario::find($id);
        if(!$request->post("check")){
            $roles->admin=false;
        }else{
            $roles->admin=true;

        }

        $roles->save();

        return redirect()->route("roles.index");
    }


    public function destroy($id)
    {
        //
    }
}
