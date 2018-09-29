<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Paciente;
use App\Diente;
use App\Anamnesis;
use App\Tratamiento;
use App\Pago;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      // return 'index';
        $pacientes = Paciente::all();

        return view('paciente.lista',array('pacientes'=>$pacientes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'create paciente';
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
        $user = Auth::user();

         $input = $request->all();


         //para edicion del paciente
        if ($request->has('paciente_id')) {
            //
            $paciente = Paciente::where('id',$request->input('paciente_id'))->first();
            $paciente->nombre = $request->input('nombre');
            $paciente->apellidos = $request->input('apellidos');
            $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
            $paciente->telefono = $request->input('telefono');
            $paciente->celular = $request->input('celular');
            $paciente->email = $request->input('email');
            $paciente->edad = $request->input('edad');
            $paciente->sexo = $request->input('sexo');
            $paciente->pais = $request->input('pais');
            $paciente->informacion_adicional = $request->input('informacion_adicional');
            $paciente->antecedente_enfermedad = $request->input('informacion_adicional');

              $paciente->save();

            return back()->withInput();
        }

       
        //para registro del paciente
        $paciente = new Paciente;
        $paciente->nombre = $request->input('nombre');
        $paciente->apellidos = $request->input('apellidos');
        $paciente->fecha_nacimiento = Carbon::now() ;
        $paciente->telefono = $request->input('telefono');
        $paciente->celular = $request->input('celular');
        $paciente->email = $request->input('email');
        $paciente->edad = $request->input('edad');
        $paciente->sexo = $request->input('sexo');
        $paciente->informacion_adicional = $request->input('informacion_adicional');
        $paciente->antecedente_enfermedad = $request->input('informacion_adicional');
        $paciente->id_odontologo = $user->id;
        // return $paciente;
        $paciente->save();

        return back()->withInput();
    }

    public function storeAnamnesis(Request $request)
    {
        // return $request->id_paciente;

        if($request->has('id_anamnesis'))
        {

            $anamnesis = Anamnesis::where('id',$request->id_anamnesis)->first();
            $anamnesis->descripcion = $request->descripcion;
            $anamnesis->medico_cabecera = $request->medico_cabecera;
            $anamnesis->motivo_consulta = $request->motivo_consulta;
            $anamnesis->telefono_medico = $request->telefono_medico;
            $anamnesis->alergias = $request->alergias;
            $anamnesis->medicamentos = $request->medicamentos;
            $anamnesis->tratamientos_autorizados = $request->tratamientos_autorizados;
            $anamnesis->embarazo = $request->embarazo;
            $anamnesis->sangrado_excesivo = $request->sangrado_excesivo;
            $anamnesis->problema_cardiaco = $request->problema_cardiaco;
            $anamnesis->diabetes = $request->diabetes;
            $anamnesis->presion_baja = $request->presion_baja;
            $anamnesis->presion_alta = $request->presion_alta;
            $anamnesis->cancer = $request->cancer;
            $anamnesis->embarazo = $request->embarazo;
            $anamnesis->id_paciente = $request->id_paciente;
            $anamnesis->save();

            return back()->withInput();
        }

        $anamnesis = new Anamnesis;
        $anamnesis->descripcion = $request->descripcion;
        $anamnesis->medico_cabecera = $request->medico_cabecera;
        $anamnesis->motivo_consulta = $request->motivo_consulta;
        $anamnesis->telefono_medico = $request->telefono_medico;
        $anamnesis->alergias = $request->alergias;
        $anamnesis->medicamentos = $request->medicamentos;
        $anamnesis->tratamientos_autorizados = $request->tratamientos_autorizados;
        $anamnesis->embarazo = $request->embarazo;
        $anamnesis->sangrado_excesivo = $request->sangrado_excesivo;
        $anamnesis->problema_cardiaco = $request->problema_cardiaco;
        $anamnesis->diabetes = $request->diabetes;
        $anamnesis->presion_baja = $request->presion_baja;
        $anamnesis->presion_alta = $request->presion_alta;
        $anamnesis->cancer = $request->cancer;
        $anamnesis->embarazo = $request->embarazo;
        $anamnesis->id_paciente = $request->id_paciente;
        $anamnesis->save();

        return back()->withInput();
        // return  $anamnesis;
        // return $request->all();
    }

    public function storeTratamientos(Request $request)
    {   
      //  return $request->id_tratamiento;

        if($request->has('id_tratamiento'))
        {
            $tratamiento = Tratamiento::where('id',$request->id_tratamiento)->first();
           // $tratamiento = new Tratamiento;
            $tratamiento->id_paciente = $request->id_paciente;
            $tratamiento->id_diente = $request->id_diente;
            $tratamiento->id_odontologo = Auth::user()->id_odontologo;
            $tratamiento->costo_tratamiento = $request->costo_tratamiento;
            $tratamiento->descripcion = $request->descripcion;
            $tratamiento->balance = $request->costo_tratamiento;
            $tratamiento->save();

            return back()->withInput();

        }
        $tratamiento = new Tratamiento;
        $tratamiento->id_paciente = $request->id_paciente;
        $tratamiento->id_diente = $request->id_diente;
        $tratamiento->id_odontologo = Auth::user()->id_odontologo;
        $tratamiento->costo_tratamiento = $request->costo_tratamiento;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->balance = $request->costo_tratamiento;
        $tratamiento->save();




        return back()->withInput();
        // return $request->all();
    }

    public function storePagos(Request $request)
    {   
        // return $request->id_pago;
        
        if($request->has('id_pago'))
        {   
            $pago = Pago::where('id',$request->id_pago)->first();

            $pago->monto=$request->monto;
            $pago->descripcion = $request->descripcion;
            $pago->id_tratamiento = $request->id_tratamiento;
            $pago->id_paciente = $request->id_paciente;
            $pago->id_odontologo = Auth::user()->id_odontologo;

            $pago->save();


             return back()->withInput();
        }   

        $pago = new Pago;

        $pago->monto=$request->monto;
        $pago->descripcion = $request->descripcion;
        $pago->id_tratamiento = $request->id_tratamiento;
        $pago->id_paciente = $request->id_paciente;
        $pago->id_odontologo = Auth::user()->id_odontologo;

        $pago->save();



        
            $tratamiento = Tratamiento::where('id',$request->id_tratamiento)->first();
            // $tratamiento->descripcion = 'haber si cambia';
            $tratamiento->balance = (int) $tratamiento->balance - (int) $pago->monto;
            $tratamiento->save();

            // return  $tratamiento;

         return back()->withInput();
       
    }   

    public function historial($id)
    {
        $paciente = Paciente::where('id',$id)->first();

        return view('paciente.show')->with('paciente',$paciente);
    }
    public function odontograma($id)
    {
        $paciente = Paciente::where('id',$id)->first();

          $dientes = Diente::where('id_paciente',$id)->get();


        return view('paciente.odontograma',array('paciente' => $paciente, 'dientes' => $dientes ));
    }
    public function anamnesis($id)
    {
        $paciente = Paciente::where('id',$id)->first();

          $anamnesis = Anamnesis::where('id_paciente',$id)->first();


        return view('paciente.anamnesis',array('paciente' => $paciente, 'anamnesis' => $anamnesis ));
    }

    public function tratamientos($id)
    {
         $paciente = Paciente::where('id',$id)->first();
        // return $paciente;
         $tratamientos = Tratamiento::where('id_paciente',$id)->get();

         return view('paciente.tratamientos',array('paciente' => $paciente, 'tratamientos' => $tratamientos ));
    }

    public function pagos($id)
    {
         $paciente = Paciente::where('id',$id)->first();

         $pagos = Pago::where('id_paciente',$id)->get();

         return view('paciente.pagos',array('paciente' => $paciente, 'pagos' => $pagos ));
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
        $paciente = Paciente::where('id',$id)->first();
        //$paciente = Paciente::find($id)->first();
        $dientes = Diente::where('id_paciente',$id)->get();

        return view('paciente.mostrar',array('paciente' => $paciente, 'dientes' => $dientes ));
    }


  public function reporte_historial($id)
  {
    return view('reportes.historial');
    return 'reporte view '.$id;
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
