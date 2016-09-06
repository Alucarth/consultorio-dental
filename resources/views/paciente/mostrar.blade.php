@extends('layouts.app')

@section('head')

   

     
 
        

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
                  <h3 class="panel-title">
                  {{--   <a data-toggle="collapse" href="#details" class="collapsed"> --}}
                      <div>
                        <span> {{ strtoupper($paciente->nombre)}} </span>
                        <span class="pull-right">
                          <button type="button" class="btn btn-warning btn-xs" > <span class="glyphicon glyphicon-pencil" ></span> </button>
                          <button type="button" class="btn btn-danger btn-xs" > <span class="glyphicon glyphicon-trash" ></span> </button> 
                        </span>
                      </div>
                    {{-- </a> --}}
                  </h>
                
                </div>
                <div class="panel-body">
                   
                   
                   <label> Telefono:  </label> {{$paciente->telefono}}
                   <br>
                   <label> Informacion Adicional: </label> {{$paciente->informacion_adicional}}
                   <br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> Nueva Cita <span class="glyphicon glyphicon-plus" ></span> </button>
                        
                   <br>
                   <br>
                   <div>

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tratamiento</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Odontograma</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Historial Clinico</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">anamnesis </a></li>
                         <li role="presentation"><a href="#pagos" aria-controls="pagos" role="tab" data-toggle="tab">Pagos </a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">lista de tratamientos</div>
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

@endsection
