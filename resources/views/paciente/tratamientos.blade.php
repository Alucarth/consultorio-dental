 <?php  require base_path() . '/app/Libs/DavidUtil.php';
 use App\Diente;
 use App\Odontologo;

 ?>
@extends('layouts.paciente')

@section('head')

  <link href={{ asset("DataTables-1.10.12/media/css/dataTables.bootstrap.min.css")}} rel="stylesheet">

  <script src={{ asset("DataTables-1.10.12/media/js/jquery.dataTables.min.js")}}></script> 
  <script src={{ asset("js/keyrushelper.js")}}></script> 
 
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

         <li class="active">
          <a href="{{url('paciente/tratamientos/'.$paciente->id)}}">
            <i class="fa fa-plus-square"></i> <span>Tratamientos</span>
           
          </a>
        </li>


         <li>
          <a href="{{url('paciente/odontograma/'.$paciente->id)}}">
            <i class="fa fa-calendar-o"></i> <span>Odontograma</span>
           
          </a>
        </li>

         <li>
          <a href="{{url('paciente/anamnesis/'.$paciente->id)}}">
            <i class="fa fa-calendar-plus-o"></i> <span>Anamnesis</span>
            
          </a>
        </li>

         {{-- <li>
          <a href="{{url('paciente/pagos/'.$paciente->id)}}">
            <i class="fa fa-money"></i> <span>Pagos</span>
         
          </a>
        </li> --}}

      </ul>
@endsection



@section('content')

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"> Tratamientos del Paciente: {{ ucwords($paciente->nombre.' '.$paciente->apellidos)}}</h3>
          
              
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      
      <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" ><span class="fa fa-plus-square"></span> Nuevo Tratamiento</a>

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  				   
               <span class="btn-group pull-left">
                                    
                                  </span>
                                  <table id="lista_tratamiento" class="table" cellspacing="0" width="100%">

                                      <thead>
                                          <tr> 
                                              <th> Id </th>
                                              <th>Fecha </th>
                                              <th>Nro de Pieza</th>
                                              <th>Descripción</th>
                                              
                                              <th>Odontologo</th>
                                              <th>Saldo</th>
                                              <th>Costo del tratamiento</th>
                                              <th>Accion</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                      @foreach ($tratamientos as $tratamiento)
                               
                                            <tr>
                                              <td> {{$tratamiento->id }}</td>
                                              <td> {{$tratamiento->created_at}}
                                              <td> {{Diente::where('id',$tratamiento->id_diente)->first()->nro_pieza }} </td>
                                              <td> {{$tratamiento->descripcion}}</td>
                                              
                                              <td> {{Odontologo::where('id',$tratamiento->id_odontologo)->first()->nombre}} </td>
                                              <td> {{$tratamiento->balance}} </td>
                                              <td> {{$tratamiento->costo_tratamiento}}</td>
                                              <td>
                                              <a class="btn btn-info btn-sm " href="#" data-toggle="modal" data-target="#myModal"   data-id_tratamiento="{{$tratamiento->id}}" data-id_diente="{{$tratamiento->id_diente}}" data-costo_tratamiento="{{$tratamiento->costo_tratamiento}}" data-descripcion="{{$tratamiento->descripcion}}"> <span class="fa fa-edit" aria-hidden="true"></span>
                                              </a>
                             

                                                  
                                              </td>
                                          </tr>
                                      @endforeach
                                        
                                       
                                        </tbody>
                                  </table>
  </div><!-- /.box-body -->
  <div class="box-footer">
   
  </div><!-- box-footer -->
</div><!-- /.box -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tratamiento</h4>
      </div>
      <form action="{{url('tratamientos')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
                <input type="hidden" name="id_paciente" id="id_paciente" value="{{$paciente->id}}" >
                <input type="hidden" name="id_tratamiento" id="id_tratamiento"  >
                <div class="form-group">
                  <label for="Sexo">Numero de Pieza Dental</label>

                  <select  class="form-control" name="id_diente" id="id_diente">
                  @foreach( Diente::where('id_paciente',$paciente->id)->get() as $diente )
                     <option value="{{$diente->id}}">{{$diente->nro_pieza}}</option>

                  @endforeach
                 
                    
                   
                  
                </select>

              <div class="form-group">
                <label for="nombre_paciente">Descripcion </label>
                
                <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
              </div>

            
             
              <div class="form-group">
                <label for="telefono">Costo del Tratamiento </label>
                <input type="number" class="form-control" name="costo_tratamiento" id="costo_tratamiento" placeholder="0">
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
   $(document).ready(function() {
    $('#lista_tratamiento').DataTable({
      paging: false
    });

  }

 );

    $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var descripcion = button.data('descripcion') // Extract info from data-* attributes
     // var id_diente = button.data('id_diente')
      var id_tratamiento=button.data('id_tratamiento')
      var costo_tratamiento = button.data('costo_tratamiento');
      // var medicamentos = button.data('medicamentos')
      // var tratamientos_autorizados = button.data('tratamientos_autorizados')
      // var sangrado_excesivo = button.data('sangrado_excesivo')
      // var problema_cardiaco = button.data('problema_cardiaco')
      // var embarazo = button.data('embarazo')
      // var diabetes = button.data('diabetes')
      // var presion_baja = button.data('presion_baja')
      // var presion_alta = button.data('presion_alta')
      // var cancer = button.data('cancer')
      // var medico_cabecera = button.data('medico_cabecera')
      // var telefono_medico = button.data('telefono_medico')



      // console.log('disparando evento ');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
     // modal.find('.modal-title').text('Pieza Nro' + dienteId)
      modal.find('.modal-body #descripcion').val(descripcion)
     // modal.find('.modal-body #id_diente').val(id_diente).change()
      modal.find('.modal-body #id_tratamiento').val(id_tratamiento)
      modal.find('.modal-body #costo_tratamiento').val(costo_tratamiento).change()
      // modal.find('.modal-body #tratamientos_autorizados').val(tratamientos_autorizados).change()
      // modal.find('.modal-body #sangrado_excesivo').val(sangrado_excesivo).change()
      // modal.find('.modal-body #problema_cardiaco').val(problema_cardiaco).change()
      // modal.find('.modal-body #embarazo').val(embarazo).change()
      // modal.find('.modal-body #diabetes').val(diabetes).change()
      // modal.find('.modal-body #presion_alta').val(presion_baja).change()
      // modal.find('.modal-body #cancer').val(cancer).change()
      // modal.find('.modal-body #medico_cabecera').val(medico_cabecera).change()
      // modal.find('.modal-body #telefono_medico').val(telefono_medico).change()

    });
</script>

@endsection
