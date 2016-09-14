@extends('layouts.app')

@section('head')

  <link href={{ asset("DataTables-1.10.12/media/css/dataTables.bootstrap.min.css")}} rel="stylesheet">

  <script src={{ asset("DataTables-1.10.12/media/js/jquery.dataTables.min.js")}}></script> 

@endsection

@section('content')
<div class="container">

    <ol class="breadcrumb">
       <li ><a href="{{url('pacientes')}}">Pacientes</a></li>
      <li class="active">{{$paciente->nombre}}</li>
    </ol>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">

               {{--  <h4>{{$paciente->nombre}}    
                    
                    <button type="button" class="btn btn-warning btn-xs" > <span class="glyphicon glyphicon-pencil" ></span> </button>
                    <button type="button" class="btn btn-danger btn-xs" > <span class="glyphicon glyphicon-remove" ></span> </button> 
               </h4>  --}}
                <h4>{{ ucwords($paciente->nombre)}}
                  <span class="btn-group pull-right">

                      <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-plus-sign" ></span> Adicionar Cita</a>
                      <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" ></span> Editar</a>
                      <a href="#" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash" ></span> Borrar</a>
                     
                  </span>
                </h4>
                 
                
                </div>
                <div class="panel-body">
                   
                   
                   <label> Telefono:  </label> {{$paciente->telefono}}
                   <br>
                   <label> Informacion Adicional: </label> {{$paciente->informacion_adicional}}
                
                   <br>
                   <div>

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tratamiento" aria-controls="tratamiento" role="tab" data-toggle="tab">Tratamiento</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Odontograma</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Historial Clinico</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">anamnesis </a></li>
                         <li role="presentation"><a href="#pagos" aria-controls="pagos" role="tab" data-toggle="tab">Pagos </a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tratamiento">
                        
                           <div class="panel panel-default">
                  
                              
                              <div class="panel-body">

                                <span class="btn-group pull-left">
                                      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-plus-sign"></span> Nuevo Tratamiento</a>
                                     
                                  </span>
                                  <table id="lista_tratamiento" class="table" cellspacing="0" width="100%">

                                      <thead>
                                          <tr>
                                              <th>Descipcion</th>
                                              <th>Odontograma</th>
                                              <th>Costo</th>
                                              <th>Saldo</th>
                                              <th>Accion</th>
                                          </tr>
                                      </thead>
                                      <tbody>

                                      {{-- @foreach ($pacientes as $paciente) --}}
                               
                                            <tr>
                                              <td> descripcion</td>
                                              <td> Odontograma</td>
                                              <td> 500 </td>
                                              <td> 200 </td>
                                              <td>
                                              <a class="btn btn-info btn-sm " href="#"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                              </a>
                             

                                                  
                                              </td>
                                          </tr>
                                      {{-- @endforeach --}}
                                        
                                       
                                        </tbody>
                                  </table>

                              </div>
                          </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">odontograma</div>
                        <div role="tabpanel" class="tab-pane" id="messages">historial lista</div>
                        <div role="tabpanel" class="tab-pane" id="settings">anamnesis</div>
                         <div role="tabpanel" class="tab-pane" id="pagos">pagos</div>

                      </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Establecer Cita con el Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
            
              <div class="form-group">
                <label for="nombre_paciente">Fecha</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
              </div>
              <div class="form-group">
                <label for="telefono">hora</label>
                <input type="number" class="form-control" name="telefono" placeholder="Telefono">
              </div>
              
              <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" rows="3" name="descripcion"></textarea>
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


</script>
@endsection
