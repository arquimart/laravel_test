<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users()
    {
        $users = DB::table('users')
        ->select('users.*', 'roles.name as role')
        ->join('model_has_roles','users.id','=','model_has_roles.model_id')
        ->join('roles','model_has_roles.role_id','=','roles.id')
        ->get();
        return view('users', compact('users'));
    }

    public function switchRole(User $user)
    {
        if ($user->roles[0]->name == 'admin') {
            $user->roles()->detach();
            $user->roles()->attach(2);
        }else{
            $user->roles()->detach();
            $user->roles()->attach(1);
        }
        return back();
    }
}

