 <?php  require base_path() . '/app/Libs/DavidUtil.php';?>
@extends('layouts.paciente')

@section('head')

  <link href={{ asset("DataTables-1.10.12/media/css/dataTables.bootstrap.min.css")}} rel="stylesheet">

  <script src={{ asset("DataTables-1.10.12/media/js/jquery.dataTables.min.js")}}></script> 
  <script src={{ asset("js/keyrushelper.js")}}></script> 

  <script src='{{ asset("bower_components/jsPDF/dist/jspdf.debug.js")}}'></script>
 
@endsection

@section('menu_paciente')
	 <div class="user-panel">
        <div class="pull-left image">
          <img src='{{asset("imagenes/user.jpg")}}' class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$paciente->nombre.' '.$paciente->apellidos}}</p>
          <a href="#">Paciente </a>
        </div>
      </div>
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu del Paciente</li>
          <li>
          <a href="{{url('paciente/historial/'.$paciente->id)}}">
            <i class="fa  fa-file"></i> <span>Historial Clinico</span>
           
          </a>
        </li>

         <li>
          <a href="{{url('paciente/tratamientos/'.$paciente->id)}}">
            <i class="fa fa-plus-square"></i> <span>Tratamientos</span>
           
          </a>
        </li>


         <li>
          <a href="{{url('paciente/odontograma/'.$paciente->id)}}">
            <i class="fa fa-calendar-o"></i> <span>Odontograma</span>
           
          </a>
        </li>

         <li  class="active">
          <a href="{{url('paciente/anamnesis/'.$paciente->id)}}">
            <i class="fa fa-calendar-plus-o"></i> <span>Anamnesis</span>
            
          </a>
        </li>

         <li>
          <a href="{{url('paciente/pagos/'.$paciente->id)}}">
            <i class="fa fa-money"></i> <span>Pagos</span>
         
          </a>
        </li>

      </ul>
@endsection



@section('content')
  
  @if($anamnesis==null)

 <div class="callout callout-info lead">
    <h4>Sin Registro!</h4>
    <p> Actualmente no se cuenta con la informacion del paciente.</p><p> <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-calendar-plus-o"></span> Crear Registro</button></p>
  </div>
  

  @else

  

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"> {{ ucwords($paciente->nombre.' '.$paciente->apellidos)}}</h3>
          
              
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-descripcion="{{$anamnesis->descripcion}}" data-motivo_consulta="{{$anamnesis->motivo_consulta}}" data-alergias="{{$anamnesis->alergias}}" data-medicamentos="{{$anamnesis->medicamentos}}" data-tratamientos_autorizados="{{$anamnesis->tratamientos_autorizados}}" data-embarazo="{{$anamnesis->embarazo}}" data-sangrado_excesivo="{{$anamnesis->sangrado_excesivo}}" data-problema_cardiaco="{{$anamnesis->problema_cardiaco}}" data-diabetes="{{$anamnesis->diabetes}}" data-presion_alta="{{$anamnesis->presion_alta}}" data-presion_baja="{{$anamnesis->presion_baja}}" data-cancer="{{$anamnesis->cancer}}" data-medico_cabecera="{{$anamnesis->medico_cabecera}}" data-telefono_medico="{{$anamnesis->telefono_medico}}" ><span class="fa fa-edit"></span></a>
      <a href="#" id="imprimir" class="btn btn-success btn-sm"> <span class="fa fa-print"></span></a>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  				    
                   <label> Descripcion:  </label> {{$anamnesis->descripcion}}
                  
                  
                   <br>
                   <label> Motivo de la Consulta:  </label> {{$anamnesis->motivo_consulta}}
                   <br>
                   <label> Alergias:  </label> {{$anamnesis->alergias}}
                   <br>
                   
                   <label> Medicamentos :  </label> {{$anamnesis->medicamentos}}
                   <br>
                   <label> Tratamientos no Autorizados: </label> {{$anamnesis->tratamientos_autorizados}}
                   <br>
                

                   @if($anamnesis->embarazo>0)
                      <label> Emabraso:  </label> si
                   <br>
                   @else
                     <label> Emabraso:  </label> no
                   <br>
                   @endif 

                  @if($anamnesis->sangrado_excesivo>0)
                    <label> Sangrado Excesivo:  </label> si
                   <br>
                   @else
                     <label> Sangrado Excesivo:  </label> no
                   <br>
                   @endif 


                    @if($anamnesis->problema_cardiaco>0)
                    <label> Problema Cardiaco:  </label> si
                   <br>
                   @else
                     <label> Problema Cardiaco:  </label> no
                   <br>
                   @endif  

                   @if($anamnesis->diabetes>0)
                    <label> Diabetes:  </label> si
                   <br>
                   @else
                     <label> Diabetes:  </label> no
                   <br>
                   @endif  

                   @if($anamnesis->presion_alta>0)
                    <label> Presion Alta :  </label> si
                   <br>
                   @else
                     <label> Presion Alta :  </label> no
                   <br>
                   @endif

                   @if($anamnesis->presion_baja>0)
                    <label> Presion Baja :  </label> si
                   <br>
                   @else
                     <label> Presion Baja :  </label> no
                   <br>
                   @endif

                   @if($anamnesis->cancer>0)
                    <label> cancer :  </label> si
                   <br>
                   @else
                     <label> cancer :  </label> no
                   <br>
                   @endif




                    <legend> Datos del medico tratante
                   </legend>
                   <label> Medico de cabecera:  </label> {{$anamnesis->medico_cabecera}}
                   <br>
                   <label> Telefono :  </label> {{$anamnesis->telefono_medico}}
  </div><!-- /.box-body -->
  <div class="box-footer">
   
  </div><!-- box-footer -->
</div><!-- /.box -->

@endif

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Anamnesis: {{ $paciente->nombre}}</h4>
      </div>
      <form action="{{url('anamnesis')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
              <input type="hidden" name="id_paciente" id="id_paciente" value="{{$paciente->id}}" >
              @if($anamnesis)
              <input type="hidden" name="id_anamnesis" id="id_anamnesis" value="{{$anamnesis->id}}" >
              @endif

              <legend> Informacion del Paciente</legend>
              <div class="form-group">
                <label for="nombre_paciente">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del paciente">
              </div>

              <div class="form-group">
                <label for="nombre_paciente">Motivo de la Consulta</label>
                 <textarea class="form-control" rows="3" name="motivo_consulta" id="motivo_consulta"></textarea>
              
              </div>
              
              <div class="form-group">
                <label for="nombre_paciente">Alergias</label>
                <input type="text" class="form-control" name="alergias" id="alergias" placeholder="">
              </div>

              <div class="form-group">
                <label for="nombre_paciente">Medicamentos</label>
                 <textarea class="form-control" rows="3" name="medicamentos" id="medicamentos"></textarea>
              
              </div>

              <div class="form-group">
                <label for="nombre_paciente">Tratamientos Autorizados</label>
                 <textarea class="form-control" rows="3" name="tratamientos_autorizados" id="tratamientos_autorizados"></textarea>
              
              </div>

            
            <div class="form-group">
                <label for="Sexo">Sangrado Excesivo</label>

                <select  class="form-control" name="sangrado_excesivo" id="sangrado_excesivo">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>

            <div class="form-group">
                <label for="Sexo">Problema Cardiaco</label>

                <select  class="form-control" name="problema_cardiaco" id="problema_cardiaco">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>

            <div class="form-group">
                <label for="Sexo">Embarazo</label>

                <select  class="form-control" name="embarazo" id="embarazo">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>
           
            <div class="form-group">
                <label for="Sexo">Diabetes</label>

                <select  class="form-control" name="diabetes" id="diabetes">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>

             <div class="form-group">
                <label for="Sexo">Presion Baja </label>

                <select  class="form-control" name="presion_baja" id="presion_baja">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>

            <div class="form-group">
                <label for="Sexo">Presion Alta </label>

                <select  class="form-control" name="presion_alta" id="presion_alta">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>

             <div class="form-group">
                <label for="Sexo">Cancer</label>

                <select  class="form-control" name="cancer" id="cancer">
                  <option value="0">No</option>
                  <option value="1">Si</option>
                  
                </select>
            </div>

            <legend> Informacion del Medico Tratante</legend>

            <div class="form-group">
                <label for="nombre_paciente">Nombre del Medico</label>
                <input type="text" class="form-control" name="medico_cabecera" id="medico_cabecera" placeholder="Nombre del medico">
             </div>
            <div class="form-group">
                <label for="nombre_paciente">Telefono</label>
                <input type="number" class="form-control" name="telefono_medico" id="telefono_medico" placeholder="Telefono">
              </div>

          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar <span class="glyphicon glyphicon-remove"> </span> </button>

            <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span> </button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    
  var anamnesis= <?php echo json_encode($anamnesis);?>;
  var paciente = <?php echo  json_encode($paciente); ?>;


  $('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var descripcion = button.data('descripcion') // Extract info from data-* attributes
  var motivo_consulta = button.data('motivo_consulta')
  var alergias=button.data('alergias')
  var medicamentos = button.data('medicamentos')
  var tratamientos_autorizados = button.data('tratamientos_autorizados')
  var sangrado_excesivo = button.data('sangrado_excesivo')
  var problema_cardiaco = button.data('problema_cardiaco')
  var embarazo = button.data('embarazo')
  var diabetes = button.data('diabetes')
  var presion_baja = button.data('presion_baja')
  var presion_alta = button.data('presion_alta')
  var cancer = button.data('cancer')
  var medico_cabecera = button.data('medico_cabecera')
  var telefono_medico = button.data('telefono_medico')



  // console.log('disparando evento ');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 // modal.find('.modal-title').text('Pieza Nro' + dienteId)
  modal.find('.modal-body #descripcion').val(descripcion)
  modal.find('.modal-body #motivo_consulta').val(motivo_consulta)
  modal.find('.modal-body #alergias').val(alergias)
  modal.find('.modal-body #medicamentos').val(medicamentos).change()
  modal.find('.modal-body #tratamientos_autorizados').val(tratamientos_autorizados).change()
  modal.find('.modal-body #sangrado_excesivo').val(sangrado_excesivo).change()
  modal.find('.modal-body #problema_cardiaco').val(problema_cardiaco).change()
  modal.find('.modal-body #embarazo').val(embarazo).change()
  modal.find('.modal-body #diabetes').val(diabetes).change()
  modal.find('.modal-body #presion_alta').val(presion_baja).change()
  modal.find('.modal-body #cancer').val(cancer).change()
  modal.find('.modal-body #medico_cabecera').val(medico_cabecera).change()
  modal.find('.modal-body #telefono_medico').val(telefono_medico).change()

})

$("#imprimir").click(function() {
  // alert("hola");
  console.log(anamnesis);
  var doc = new jsPDF();
  doc.text(80, 20, 'Anamnesis');

  doc.text(20, 30, 'Paciente: '+paciente.nombre +" "+paciente.apellidos);
  doc.text(20, 40, 'Descripcion: '+anamnesis.descripcion);

  doc.text(20, 50, 'Medico de cabecera: '+anamnesis.medico_cabecera);
  doc.text(20, 60, 'Telefono del medico: '+anamnesis.telefono_medico);
  doc.text(20, 70, 'Motivo de Consulta: '+anamnesis.motivo_consulta);
  doc.text(20, 80, 'Alergias : '+anamnesis.alergias);
  doc.text(20, 90, 'Medicamentos : '+anamnesis.medicamentos);
  doc.text(20, 100, 'Tratamientos Autorizados:' + anamnesis.tratamientos_autorizados);

  doc.text(20, 110,  anamnesis.sangrado_excesivo?'Sangrado Excesivo : si':'Sangrado Excesivo : no');

  doc.text(20, 120,  anamnesis.embarazo?'Embarazo : si':'Embarazo : no');
  doc.text(20, 130,  anamnesis.problema_cardiaco?'Problemas Cardiacos : si':'Problemas Cardiacos : no');

  doc.text(20, 140,  anamnesis.diabetes?'Diabetes : si':'Diabetes : no');
  doc.text(20, 150,  anamnesis.presion_baja?'Presion Baja  : si':'Presion Baja  : no');
  doc.text(20, 160,  anamnesis.presion_alta?'presion_alta : si':'presion_alta : no');
  doc.text(20, 170,  anamnesis.cancer?'Cancer : si':'Cancer : no');


  doc.save('anamnesis.pdf');
});    

</script>
@endsection
