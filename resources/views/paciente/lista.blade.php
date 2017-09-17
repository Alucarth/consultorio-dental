@extends('layouts.adminlte')

@section('head')
   <link href={{ asset("DataTables-1.10.12/media/css/dataTables.bootstrap.min.css")}} rel="stylesheet">

  <script src={{ asset("DataTables-1.10.12/media/js/jquery.dataTables.min.js")}}></script> 

  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js")}}'></script>

  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js")}}'></script>
  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js")}}'></script>

  <!-- InputMask -->
{{-- <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script> --}}

@endsection


@section('content')
<div class="container">
   
 
    <div class="row">
   
        <br><br>

        <div class="col-md-10 col-md-offset-1">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pacientes</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                {{-- <span class="label label-primary">Label</span> --}}
                 <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ><span class="fa fa-user-plus"></span></a>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              

               <table id="lista" class="table" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Celulares</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($pacientes as $paciente)
                 
                            <tr>

                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->celular}}</td>
                                <td> 
                                <a class="btn btn-info btn-sm " href="{{url('paciente/historial/'.$paciente->id)}}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                </a>
               

                                    
                                </td>
                            </tr>
                        @endforeach
                          
                         
                          </tbody>
                    </table>

            </div><!-- /.box-body -->
            {{-- <div class="box-footer"> --}}
              {{-- The footer of the box --}}
            {{-- </div>box-footer --}}
          </div><!-- /.box -->


          {{--   <div class="panel panel-default">
                  
                 <div class="panel-heading">

                  <h4>Pacientes
                    <span class="btn-group pull-right">
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-plus-sign"></span> Adiconar Nuevo Paciente</a>
                       
                    </span>
                  </h4>
                 
                 </div>
                <div class="panel-body">

                   
                   
                    
                    <table id="lista" class="table" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($pacientes as $paciente)
                 
                              <tr>
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->telefono}}</td>
                                <td> 
                                <a class="btn btn-info btn-sm " href="{{url('paciente/historial/'.$paciente->id)}}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                </a>
               

                                    
                                </td>
                            </tr>
                        @endforeach
                          
                         
                          </tbody>
                    </table>

                </div>
            </div> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registro de Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
            
              <div class="form-group">
                <label for="nombre_paciente">Nombres</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
              </div>

              <div class="form-group">
                <label for="nombre_paciente">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
              </div>
              
             
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" class="form-control" name="telefono" placeholder="Telefono">
              </div>

               <div class="form-group">
                <label for="nombre_paciente">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico ">
              </div>

              <div class="form-group">
                <label for="telefono">Celular</label>
                <input type="number" class="form-control" name="celular" placeholder="celular">
              </div>

              <div class="form-group">
                <label for="Edad">Fecha de Nacimiento </label>
                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="fecha_nacimiento" >
              </div>    

              <div class="form-group">
                <label for="Edad">Edad</label>
                <input type="number" class="form-control" name="edad" placeholder="Edad">
              </div>    
             <div class="form-group">
                <label for="Sexo">Sexo</label>

                <select  class="form-control" name="sexo">
                  <option value="hombre">Hombre</option>
                  <option value="mujer">Mujer</option>
                  
                </select>

                
            </div>
              <div class="form-group">
                  <label for="descripcion">Antecedente Enfermedades</label>
                  <textarea class="form-control" rows="3" name="antecedente_enfermedad"></textarea>
              </div>

               <div class="form-group">
                  <label for="descripcion">Informacion Adicional</label>
                  <textarea class="form-control" rows="3" name="informacion_adicional"></textarea>
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
    $('#lista').DataTable({
      paging: false
    });

  }

 );
   
   $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

</script>
@endsection