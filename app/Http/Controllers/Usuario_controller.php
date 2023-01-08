<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\model\Usuario;
use App\model\Rol_usuario;

class Usuario_controller extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view("user.create");
    }


    public function store(Request $request)
    {
        $usuario=new Usuario();
        $usuario->name=$request->post("name");
        $usuario->email=$request->post("email");
        $usuario->password=bcrypt($request->post("password"));
        $usuario->save();

        $rol=new Rol_usuario();
        $rol->admin=false;
        $rol->id_usuario=$usuario->id;
        $rol->save();


        return view("auth.login");

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
        //
    }


    public function destroy($id)
    {
        //
    }
}
