<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diente;
use App\Http\Requests;

class OdontogramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

          $input = $request->all();
          $id_diente = $request->input('dienteId');//revisar
            //return $input;
          $id_paciente = $request->input('pacienteId');

          $diente = Diente::where('id_paciente',$id_paciente)->where('nro_pieza',$id_diente)->first();

            if($diente==null)
            {
               $diente = new Diente();
               $diente->nro_pieza = $id_diente;
               $diente->vestibular = $request->input('vestibular');
               $diente->mesial = $request->input('mesial');
               $diente->distal = $request->input('distal');
               $diente->oclusal = $request->input('oclusial');
               $diente->palatino = $request->input('palatino');
               $diente->id_paciente = $id_paciente;
               $diente->fecha =$request->input('fecha');
               $diente->descripcion = $request->input('descripcion');
               $diente->save();

              return back()->withInput();

            }


               $diente->vestibular = $request->input('vestibular');
               $diente->mesial = $request->input('mesial');
               $diente->distal = $request->input('distal');
               $diente->oclusal = $request->input('oclusial');
               $diente->palatino = $request->input('palatino');
               $diente->fecha =$request->input('fecha');
               $diente->descripcion = $request->input('descripcion');
               $diente->save();

          return back()->withInput();
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
