<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Odontologo;
use App\User;
class OdontologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Odontologos = Odontologo::all();
        return view("odontologo.lista")->with("odontologos",$Odontologos);
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
        $odontologo = new Odontologo;
        $odontologo->nombre = $request->nombre;
        $odontologo->celular = $request->celular;
        $odontologo->direccion =$request->direccion;
        $odontologo->especialidad = $request->especialidad;
        $odontologo->save();

        $usuario = new User;
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->id_odontologo-> $odontologo->id;
        $usuario->rol = 1;
        $usuario->save();

        return back()->withInput();
       // return $request->all();
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
