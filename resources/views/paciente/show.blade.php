 <?php  require base_path() . '/app/Libs/DavidUtil.php';?>
@extends('layouts.paciente')

@section('head')

  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js")}}'></script>

  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js")}}'></script>
  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js")}}'></script>

   <script src='{{ asset("bower_components/jsPDF/dist/jspdf.debug.js")}}'></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script> --}}
 
@endsection

@section('menu_paciente')
	 <div class="user-panel">
        <div class="pull-left image">
          <img src='{{asset("imagenes/user.png")}}' class="img-circle" alt="User Image">
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
         <li class ="active">
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

<div class="box box-primary ">
  <div class="box-header with-border">
    <h3 class="box-title"> {{ ucwords($paciente->nombre.' '.$paciente->apellidos)}}</h3>
          
              
    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-id="{{$paciente->id}}" data-nombre="{{$paciente->nombre}}" data-apellidos="{{$paciente->apellidos}}"  data-telefono="{{$paciente->telefono}}" data-email="{{$paciente->email}}" data-celular="{{$paciente->celular}}"  data-fecha_nacimiento="{{$paciente->fecha_nacimiento}}" data-edad="{{$paciente->edad}}" data-antecedente_enfermedad="{{$paciente->antecedente_enfermedad}}" data-informacion_adicional="{{$paciente->informacion_adicional}}" data-sexo="{{$paciente->sexo}}" data-pais="{{$paciente->pais}}"><span class="fa fa-edit"></span></a>
      <a href="#" id="imprimir" class="btn btn-success btn-sm"> <span class="fa fa-print"></span></a>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  				  
                   <label> Edad:  </label> {{$paciente->edad}}
                   <br>
                   <label> Celular:  </label> {{$paciente->celular}}
                   <br>
                   <label> Email:  </label> {{$paciente->email}}
                   <br>
                   <label> País:  </label> {{$paciente->pais}}
                   <br>
                   <label> Sexo:  </label> {{$paciente->sexo}}
                   <br>
                   <label> Fecha de Nacimiento:  </label> {{$paciente->fecha_nacimiento}}
                   <br>
                    <label> Edad:  </label> {{$paciente->edad}}
                   <br>

                   <label> Teléfono:  </label> {{$paciente->telefono}}
                   <br>
                   <label> Antedentes de Enfermedades: </label> {{$paciente->antecedente_enfermedad}}
                   <br>
                   <label> Informacion Adicional: </label> {{$paciente->informacion_adicional}}
                   <br>



  </div><!-- /.box-body -->
  <div class="box-footer">
   
  </div><!-- box-footer -->
</div><!-- /.box -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Datos del Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
                 <input type="hidden" name="paciente_id" id="paciente_id" >
              <div class="form-group">
                <label for="nombre_paciente">Nombres</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo">
              </div>

              <div class="form-group">
                <label for="nombre_paciente">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos"placeholder="Apellidos">
              </div>
              
             
              <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
              </div>

               <div class="form-group">
                <label for="nombre_paciente">Email</label>
                <input type="text" class="form-control" name="email" id="email"placeholder="Correo Electronico ">
              </div>

              <div class="form-group">
                <label for="telefono">Celular</label>
                <input type="number" class="form-control" name="celular" id="celular" placeholder="celular">
              </div>

              <div class="form-group">
                <label for="Edad">Fecha de Nacimiento </label>
                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="fecha_nacimiento" id="fecha_nacimiento" >
              </div>    

              <div class="form-group">
                <label for="Edad">Edad</label>
                <input type="number" class="form-control" name="edad"  id="edad" placeholder="Edad">
              </div>  
              <div class="form-group">
                <label for="Edad">Pais</label>
                <input type="text" class="form-control" name="pais"  id="pais" placeholder="Edad">
              </div>      
             <div class="form-group">
                <label for="Sexo">Sexo</label>

                <select  class="form-control" name="sexo" id="sexo">
                  <option value="hombre">Hombre</option>
                  <option value="mujer">Mujer</option>
                  
                </select>

                
            </div>
              <div class="form-group">
                  <label for="descripcion">Antecedente Enfermedades</label>
                  <textarea class="form-control" rows="3" name="antecedente_enfermedad" id="antecedente_enfermedad"></textarea>
              </div>

               <div class="form-group">
                  <label for="descripcion">Informacion Adicional</label>
                  <textarea class="form-control" rows="3" name="informacion_adicional" id="informacion_adicional"></textarea>
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


var paciente = <?php echo  json_encode($paciente); ?>;

  $('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var pacienteId = button.data('id') // Extract info from data-* attributes
  var nombre = button.data('nombre');
  var apellidos = button.data('apellidos');
  var telefono = button.data('telefono');
  var email = button.data('email');
  var celular = button.data('celular');
  var fecha_nacimiento = button.data('fecha_nacimiento');
  var edad = button.data('edad');
  var antecedente_enfermedad = button.data('antecedente_enfermedad');
  var informacion_adicional = button.data('informacion_adicional');
  var sexo= button.data('sexo');


  // console.log('disparando evento ');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 // modal.find('.modal-title').text('Pieza Nro' + dienteId)
  modal.find('.modal-body #paciente_id').val(pacienteId)

  modal.find('.modal-body #nombre').val(nombre)
  modal.find('.modal-body #apellidos').val(apellidos).change()
  modal.find('.modal-body #telefono').val(telefono).change()
  modal.find('.modal-body #email').val(email).change()
  modal.find('.modal-body #celular').val(celular).change()
  modal.find('.modal-body #fecha_nacimiento').val(fecha_nacimiento).change()
  modal.find('.modal-body #edad').val(edad).change()
  modal.find('.modal-body #antecedente_enfermedad').val(antecedente_enfermedad).change()
  modal.find('.modal-body #informacion_adicional').val(informacion_adicional).change()
  modal.find('.modal-body #sexo').val(sexo).change()
  

})
    
   $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

$("#imprimir").click(function() {
  // alert("hola");
  console.log(paciente);
  var doc = new jsPDF();
  doc.text(80, 20, 'Historial Clinico');
  doc.text(20, 30, 'Paciente: '+paciente.nombre +" "+paciente.apellidos);

  doc.text(20, 40, 'Correo Electronico: '+paciente.email);
  doc.text(20, 50, 'celular: '+paciente.celular);
  doc.text(20, 60, 'Fecha de Vencimiento: '+paciente.fecha_nacimiento);
  doc.text(20, 70, 'Edad : '+paciente.edad);
  doc.text(20, 80, 'Antedentes : '+paciente.antecedente_enfermedad);
  doc.text(20, 90, 'Informacion Adicional :' + paciente.informacion_adicional);
  doc.text(20, 100, 'Sexo: '+paciente.sexo );


  doc.save('histoiral.pdf');
});    

</script>

@endsection
