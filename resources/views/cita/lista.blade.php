<?php 
    use App\Paciente;
 ?>
@extends('layouts.adminlte')

@section('head')


      <!-- Bootstrap time Picker -->
      {{-- <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css"> --}}
  <link rel="stylesheet" href='{{ asset("bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css")}}'>
  {{-- <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script> --}}
  <script src='{{ asset("bower_components/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js") }}'></script>
        

@endsection

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
   
   
  </div><!-- /.box-header -->
  <div class="box-body">
    {{-- {{$citas}} --}}
   

    <div id='calendar'></div>
  </div><!-- /.box-body -->
  <div class="box-footer">

  </div><!-- box-footer -->
</div><!-- /.box -->




 <div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
      <form action="{{url('citas')}}" method="post"> 
        {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body">
                
            <label>Paciente: </label> 
           
            <select class="form-control" name="id_paciente" id="id_paciente">
             @foreach( Paciente::all() as $p)
                {{-- <option value="{{json_encode(Array('id_paciente'=> $p->id,'nombre'=> $p->nombre.' '.$p->apellidos )) }}" > {{ $p->nombre.' '.$p->apellidos}} </option> --}}

                <option value="{{$p->id}}" > {{ $p->nombre.' '.$p->apellidos}} </option>
             @endforeach

            </select>


            <br>
            <label>Asunto: </label>
            <input type="text" class ="form-control" name="descripcion" id="descripcion" >
            
            <br>
            

            <!-- time Picker -->
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora Inicio:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker"  name="hora_inicio">
                    <i class="fa fa-clock-o"></i>
                   
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
            <br>
              <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Hora fin:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker"  name="hora_fin">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
        {{--     <label>Hora de Fin:</label>

            <div class="input-group">
               <input type="text" class="form-control pull-right" id="datepicker">

              <div class="input-group-addon">
                <i class="fa fa-clock-o"></i>
              </div>
            </div> --}}
              
            <input type="hidden" class="form-control" name="fecha" id="fecha" class>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" type="submit"> Guardar</button>
            </div>
        </div>
      </form>  
    </div>
</div> 

@endsection
@section('script')
<!-- Page specific script -->
<script>


  $(document).ready(function() {
    console.log("XD");
    $(".timepicker").timepicker({
      showInputs: false,
      defaultTime:'00:00',
      explicitMode: true,
      showMeridian: false
    });
    var citas = <?php echo($citas) ?>;
       var eventos= new Array();
       console.log(citas);
       for (i = 0; i < citas.length; i++) { 
           
           var evento = {
                         title: citas[i].nombre+ ':' +citas[i].descripcion ,
                         start: citas[i].fecha +' '+citas[i].hora_inicio,
                         end: citas[i].fecha +' '+citas[i].hora_fin,
                         // backgroundColor: "#f39c12", //red
                         // borderColor: "#f39c12" //red
                       };
            console.log(evento);   
            eventos.push(evento);        
           //text += cars[i] + "<br>";
    }
    for (i = 0; i < citas.length; i++) {       
        var evento = {
                      title: citas[i].nombre+ ':' +citas[i].descripcion ,
                      start: citas[i].fecha +' '+citas[i].hora_inicio,
                      end: citas[i].fecha +' '+citas[i].hora_fin,
                      // backgroundColor: "#f39c12", //red
                      // borderColor: "#f39c12" //red
                    };
          console.log(evento);   
          eventos.push(evento);        
        //text += cars[i] + "<br>";
    }

    var citas = <?php echo($citas) ?>;
    var eventos= new Array();
    console.log(citas);
    for (i = 0; i < citas.length; i++) { 
        
        var evento = {
                      title: citas[i].nombre+ ':' +citas[i].descripcion ,
                      start: citas[i].fecha +' '+citas[i].hora_inicio,
                      end: citas[i].fecha +' '+citas[i].hora_fin,
                      // backgroundColor: "#f39c12", //red
                      // borderColor: "#f39c12" //red
                    };
        console.log(evento);   
        eventos.push(evento);        
        //text += cars[i] + "<br>";
    }


 
    $('#calendar').fullCalendar({
      header: {
           left: 'prev,next today',
           center: 'title',
           right: 'month,agendaWeek,agendaDay'
         },
          //Random default events
         events: eventos,
          editable: true,
         droppable: false, 
   
       //   eventClick: function(event, element) {
   
       //     event.title = "CLICKED!";
   
       //     $('#calendar').fullCalendar('updateEvent', event);
   
       // }
   
       dayClick: function(date, jsEvent, view) {
   
   
            $('#modalTitle').html('Agendar Cita');
           $('#modalBody #fecha').val(date.format());
   
            $('#fullCalModal').modal();
   
           // alert('Clicked on: ' + );
   
           // alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
   
           // alert('Current view: ' + view.name);
   
           // change the day's background color just for fun
           // $(this).css('background-color', 'red');
   
       },
   
        eventClick: function(event){
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#fullCalModal').modal();
        },
   
     
      });
         
  });

   </script>
       
@endsection