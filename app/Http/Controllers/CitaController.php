<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cita;
use Auth;
use Illuminate\Support\Facades\DB;
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $citas =  DB::table('citas')->join('pacientes','citas.id_paciente','=','pacientes.id')->where('citas.id_odontologo','=',Auth::user()->id_odontologo)->get();
        // $citas DB::table('citas')->join('pacientes','citas.id_paciente','pacientes.id')->where('citas.id_odontologo',Auth::user()->id_odontologo)->get(); 
        // $citas = Cita::where('id_odontologo', Auth::user()->id_odontologo)->get();
        // return $citas;
         return view('cita.lista')->with('citas',$citas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();
        $cita = new Cita;
        $cita->id_paciente =$request->id_paciente;
        $cita->id_odontologo = Auth::user()->id_odontologo;
        $cita->descripcion =$request->descripcion;
        $cita->fecha = $request->fecha;
        $cita->hora_inicio = $request->hora_inicio;
        $cita->hora_fin = $request->hora_fin;
        $cita->save();

        return back()->withInput();
        // return $cita;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
