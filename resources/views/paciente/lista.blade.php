@extends('layouts.app')

@section('head')
  

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/> --}}
<link href={{ asset("DataTables-1.10.12/media/css/dataTables.bootstrap.min.css")}} rel="stylesheet">

<script src={{ asset("DataTables-1.10.12/media/js/jquery.dataTables.min.js")}}></script>
{{-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> --}}
 

@endsection


@section('content')
<div class="container">
    <ol class="breadcrumb">
    
      <li class="active">Pacientes</li>
    </ol>

 
    <div class="row">
   
        <br><br>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                  
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
                                <a class="btn btn-info btn-sm " href="{{url('pacientes/'.$paciente->id)}}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                </a>
               

                                    
                                </td>
                            </tr>
                        @endforeach
                          
                         
                          </tbody>
                    </table>

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
        <h4 class="modal-title">Registro de Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
            
              <div class="form-group">
                <label for="nombre_paciente">Nombre Paciente</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
              </div>
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" class="form-control" name="telefono" placeholder="Telefono">
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
    $('#lista').DataTable({
      paging: false
    });

  }

 );


</script>
@endsection
