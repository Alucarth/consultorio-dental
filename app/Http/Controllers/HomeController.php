<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $consulta = DB::select("SELECT count(*) as cantidad, MONTH(created_at) from pacientes GROUP by MONTH(created_at)");
        // return $consulta;
        return view('home')->with('consulta',$consulta[0]);
    }
}
