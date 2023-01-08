<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Rol_usuario;

class Rol_usuario_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles=Rol_usuario::all();

        return view("home",["roles"=>$roles]);
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
