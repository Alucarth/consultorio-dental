 <?php  require base_path() . '/app/Libs/DavidUtil.php';?>
@extends('layouts.paciente')

@section('head')

  {{-- <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js")}}'></script>

  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js")}}'></script>
  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js")}}'></script> --}}

   {{-- <script src='{{ asset("bower_components/jsPDF/dist/jspdf.debug.js")}}'></script> --}}
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
      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-json="{{$paciente}}"><span class="fa fa-edit"></span></a>
      <a href="#" id="imprimir" class="btn btn-success btn-sm"> <span class="fa fa-print"></span></a>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  				  
               
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Datos del Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
                 <input type="hidden" name="paciente_id" id="paciente_id" >
              <div class="row">
                <div class="form-group col-md-5">
                  <label for="nombre_paciente">Nombres</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Completo">
                </div>
  
                <div class="form-group col-md-5">
                  <label for="nombre_paciente">Apellidos</label>
                  <input type="text" class="form-control" name="apellidos" id="apellidos"placeholder="Apellidos">
                </div>
                
               
                <div class="form-group col-md-2">
                  <label for="telefono">Telefono</label>
                  <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                </div>

              </div>

         
              <crear-paciente inline-template>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="telefono">Celular</label>
                    <input type="number" class="form-control" name="celular" id="celular" placeholder="celular">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="Edad">Fecha de Nacimiento </label>
                    <input type="text" class="form-control" v-model='birthdate' data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="fecha_nacimiento" id="fecha_nacimiento">
                  </div>    
                  <div class="form-group col-md-3">
                    <label for="Edad">Edad</label>
                    <input type="number" class="form-control" :value='getAge(birthdate)' name="edad" placeholder="Edad">
                  </div>  
                  <div class="form-group col-md-3">
                      <label for="nombre_paciente">Email</label>
                      <input type="text" class="form-control" name="email" id="email"placeholder="Correo Electronico ">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-2">
                    <label for="Pais">Pais</label>
                    <input type="text" class="form-control" name="pais"  id="pais" placeholder="Pais">
                  </div>      
                  <div class="form-group col-md-2">
                      <label for="Sexo">Sexo</label>
      
                      <select  class="form-control" name="sexo" id="sexo">
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                      </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="descripcion">Antecedente Enfermedades</label>
                      <textarea class="form-control" rows="3" name="antecedente_enfermedad" id="antecedente_enfermedad"></textarea>
                  </div>
    
                  <div class="form-group col-md-4">
                      <label for="descripcion">Informacion Adicional</label>
                      <textarea class="form-control" rows="3" name="informacion_adicional" id="informacion_adicional"></textarea>
                  </div> 
                  
                </div>
                <div class="row" v-if="getAge(birthdate) < 16">
                  
                  <div class="col-md-12"> <h5 class="text-primary">DATOS DEL PADRE</h5> </div>
                  <div class="form-group col-md-5">
                    <label for="nombre_paciente">Nombre completo</label>
                    <input type="text" class="form-control" name="father_name" placeholder="Nombre del Padre">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="nombre_paciente">Domilio</label>
                    <input type="text" class="form-control" name="father_address" placeholder="Domicilio">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="telefono">Celular </label>
                    <input type="number" class="form-control" name="father_phone" placeholder="celular">
                  </div>
              
                </div>
              </crear-paciente>
  

          
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
@section("script")
<script type="text/javascript"> 


  // var paciente = <?php echo  json_encode($paciente); ?>;
  
    $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var paciente = button.data('json') // Extract info from data-* attributes
    console.log(paciente);
    var date = moment(paciente.fecha_nacimiento);
    console.log(date);
    var modal = $(this);
   // modal.find('.modal-title').text('Pieza Nro' + dienteId)
    modal.find('.modal-body #paciente_id').val(paciente.id)
  
    modal.find('.modal-body #nombre').val(paciente.nombre)
    modal.find('.modal-body #apellidos').val(paciente.apellidos).change()
    modal.find('.modal-body #telefono').val(paciente.telefono).change()
    modal.find('.modal-body #email').val(paciente.email).change()
    modal.find('.modal-body #celular').val(paciente.celular).change()
    modal.find('.modal-body #fecha_nacimiento').val(date.format('DD/MM/YYYY')).change()
    modal.find('.modal-body #edad').val(paciente.edad).change()
    modal.find('.modal-body #antecedente_enfermedad').val(paciente.antecedente_enfermedad).change()
    modal.find('.modal-body #informacion_adicional').val(paciente.informacion_adicional).change()
    modal.find('.modal-body #sexo').val(paciente.sexo).change()
    modal.find('.modal-body #father_name').val(paciente.father_name).change()
    modal.find('.modal-body #father_address').val(paciente.father_address).change()
    modal.find('.modal-body #father_phone').val(paciente.father_phone).change()
    
  
  });
      
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();
    
    $("#imprimir").click(function() {
      // alert("hola");
      let paciente = <?php echo json_encode($paciente)?>;
      // console.log(paciente);
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
