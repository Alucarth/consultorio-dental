@extends("layouts.adminlte")
@section("content")
	


	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Odontologos</h3>
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
                                <th>Celular</th>
                                <th>Direccion</th>
                                <th>Especialidad</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($odontologos as $odontologo)
                 
                            <tr>

                                <td>{{$odontologo->nombre}}</td>
                                <td>{{$odontologo->celular}}</td>
                                <td>{{$odontologo->direccion}}</td>
                                <td>{{$odontologo->especialidad}}</td>
                                <td> 
                                <a class="btn btn-info btn-sm " href=#"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
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

<div class="modal modal-info" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Registro del Odontologo</h4>
      </div>
      <form action="{{url('odontologos')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
            	<legend>Datos del Odontologo</legend>
              <div class="form-group">
                <label for="nombre_paciente">Nombres</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
              </div>
             

              <div class="form-group">
                <label for="telefono">Celular</label>
                <input type="number" class="form-control" name="celular" placeholder="celular">
              </div>

           
              <div class="form-group">
                <label for="Edad">Direccion</label>
                <input type="text" class="form-control" name="direccion" placeholder="Direccion">
              </div>    
               <div class="form-group">
                <label for="Edad">Especialidad</label>
                <input type="text" class="form-control" name="especialidad" placeholder="Especialidad">
              </div>    
       		
       		<legend>Datos usuario</legend>
       		 <div class="form-group">
                <label for="nombre_paciente">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico ">
              </div>
              <div class="form-group">
                <label for="nombre_paciente">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña ">
              </div>
              <div class="form-group">
                <label for="nombre_paciente">Password</label>
                <input type="password" class="form-control" name="password_confirm" placeholder="Contraseña ">
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