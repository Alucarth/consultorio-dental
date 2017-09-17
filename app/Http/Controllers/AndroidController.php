<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Odontologo;
class AndroidController extends Controller
{
    //

	public function citas()
	{

		$citas =  DB::table('citas')->join('pacientes','citas.id_paciente','=','pacientes.id')->where('citas.id_odontologo','=',Auth::user()->id_odontologo)->get();
		$odontologo = Odontologo::where('id',Auth::user()->id_odontologo)->first();

        // $citas DB::table('citas')->join('pacientes','citas.id_paciente','pacientes.id')->where('citas.id_odontologo',Auth::user()->id_odontologo)->get(); 
        // $citas = Cita::where('id_odontologo', Auth::user()->id_odontologo)->get();
        $respuesta = array('citas' => $citas, 'odontologo' => $odontologo );

        return  $respuesta;
         // return view('cita.lista')->with('citas',$citas);
	}


	// public function store(Request $request)
 //    {
 //        //
 //        $cita = new Cita;
 //        $cita->id_paciente =$request->id_paciente;
 //        $cita->id_odontologo = Auth::user()->id_odontologo;
 //        $cita->descripcion =$request->descripcion;
 //        $cita->fecha = $request->fecha;
 //        $cita->save();

 //        return back()->withInput();
 //        // return $cita;
 //    }

}
