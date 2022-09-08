<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Customer;
use App\Car;
use DataTables;
use DB;
use Validator;
use Carbon\Carbon;

class HomeController extends Controller
{ 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
