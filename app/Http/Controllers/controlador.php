<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;

class controlador extends Controller
{
    //
    public function mostrarformulario()
    {
    	return view('saludar');
    }
    public function hola(Request $request)
    {	

    	$persona = Persona::where('id','=','2')->first();
    	$nombre = $request->nombre;

    	return view('mostrar')->with('persona',$persona);
    }
}
