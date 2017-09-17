 <?php  require base_path() . '/app/Libs/DavidUtil.php';?>
@extends('layouts.app')

@section('head')

  <link href={{ asset("DataTables-1.10.12/media/css/dataTables.bootstrap.min.css")}} rel="stylesheet">

  <script src={{ asset("DataTables-1.10.12/media/js/jquery.dataTables.min.js")}}></script> 
  <script src={{ asset("js/keyrushelper.js")}}></script> 
 
@endsection

@section('content')
<div class="container">

    <ol class="breadcrumb">
       <li ><a href="{{url('pacientes')}}">Pacientes</a></li>
      <li class="active">{{$paciente->nombre}}</li>
    </ol>
    <div class="row">
        <div class="col-md-12 ">
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
                        
                        <li role="presentation" class="active"><a href="#odontograma" aria-controls="odontograma" role="tab" data-toggle="tab">Odontograma</a></li>

                        <li role="presentation" ><a href="#tratamiento" aria-controls="tratamiento" role="tab" data-toggle="tab">Tratamiento</a></li>

                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Historial Clinico</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">anamnesis </a></li>
                         <li role="presentation"><a href="#pagos" aria-controls="pagos" role="tab" data-toggle="tab">Pagos </a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                      
                        <div role="tabpanel" class="tab-pane active" id="odontograma">
                          
                          <div class="panel panel-default">
                  
                              
                              <div class="panel-body">

                                <table class="table" cellspacing="0" width="100%">
                                  <tr>

                                    <?php 
                                   
                                 
                                    for ($i = 18; $i >= 11; $i--) {

                                      $diente = null;

                                      $diente = DavidUtil::buscar($dientes,'nro_pieza',$i);
                                  //    echo ($diente);
                                      if($diente)
                                      {
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='".$diente['vestibular']."' data-palatino='".$diente['palatino']."' data-oclusal='".$diente['oclusal']."' data-mesial='".$diente['mesial']."' data-distal='".$diente['distal']."' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      } 
                                      else{
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='0' data-palatino='0' data-oclusal='0' data-mesial='0' data-distal='0' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      }
                                      

                                    }
                                    ?>

                                    <td>  </td>

                                    <?php 
                                   
                                 
                                    for ($i = 21; $i <= 28; $i++) {

                                      $diente = null;

                                      $diente = DavidUtil::buscar($dientes,'nro_pieza',$i);
                                   //   echo ($diente);
                                      if($diente)
                                      {
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='".$diente['vestibular']."' data-palatino='".$diente['palatino']."' data-oclusal='".$diente['oclusal']."' data-mesial='".$diente['mesial']."' data-distal='".$diente['distal']."' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      } 
                                      else{
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='0' data-palatino='0' data-oclusal='0' data-mesial='0' data-distal='0' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      }
                                      

                                    }
                                    ?>
                                    {{-- <td> <button > 21 </button> </td>
                                    <td> <button > 22 </button> </td>
                                    <td> <button > 23 </button> </td>
                                    <td> <button > 24 </button> </td>
                                    <td> <button > 25 </button> </td>
                                    <td> <button > 26 </button> </td>
                                    <td> <button > 27 </button> </td>
                                    <td> <button > 28 </button> </td>
 --}}
                                  </tr>
                                  <tr>
                                    <td> <canvas id="pieza18" width="30" height="30" > </td>
                                    <td> <canvas id="pieza17" width="30" height="30" > </td>
                                    <td> <canvas id="pieza16" width="30" height="30" > </td>
                                    <td> <canvas id="pieza15" width="30" height="30" > </td>
                                    <td> <canvas id="pieza14" width="30" height="30" > </td>
                                    <td> <canvas id="pieza13" width="30" height="30" > </td>
                                    <td> <canvas id="pieza12" width="30" height="30" > </td>
                                    <td> <canvas id="pieza11" width="30" height="30" > </td>
                                    <td>  </td>
                                    <td> <canvas id="pieza21" width="30" height="30" > </td>
                                    <td> <canvas id="pieza22" width="30" height="30" > </td>
                                    <td> <canvas id="pieza23" width="30" height="30" > </td>
                                    <td> <canvas id="pieza24" width="30" height="30" > </td>
                                    <td> <canvas id="pieza25" width="30" height="30" > </td>
                                    <td> <canvas id="pieza26" width="30" height="30" > </td>
                                    <td> <canvas id="pieza27" width="30" height="30" > </td>
                                    <td> <canvas id="pieza28" width="30" height="30" > </td>
                                  </tr>

                                  <tr>
                                    <td> <canvas id="pieza48" width="30" height="30" > </td>
                                    <td> <canvas id="pieza47" width="30" height="30" > </td>
                                    <td> <canvas id="pieza46" width="30" height="30" > </td>
                                    <td> <canvas id="pieza45" width="30" height="30" > </td>
                                    <td> <canvas id="pieza44" width="30" height="30" > </td>
                                    <td> <canvas id="pieza43" width="30" height="30" > </td>
                                    <td> <canvas id="pieza42" width="30" height="30" > </td>
                                    <td> <canvas id="pieza41" width="30" height="30" > </td>
                                    <td>  </td>
                                    <td> <canvas id="pieza31" width="30" height="30" > </td>
                                    <td> <canvas id="pieza32" width="30" height="30" > </td>
                                    <td> <canvas id="pieza33" width="30" height="30" > </td>
                                    <td> <canvas id="pieza34" width="30" height="30" > </td>
                                    <td> <canvas id="pieza35" width="30" height="30" > </td>
                                    <td> <canvas id="pieza36" width="30" height="30" > </td>
                                    <td> <canvas id="pieza37" width="30" height="30" > </td>
                                    <td> <canvas id="pieza38" width="30" height="30" > </td>
                                  </tr>

                                  <tr>
                                   <?php 
                                   
                                 
                                    for ($i = 48; $i >= 41; $i--) {

                                      $diente = null;

                                      $diente = DavidUtil::buscar($dientes,'nro_pieza',$i);
                                    //  echo ($diente);
                                      if($diente)
                                      {
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='".$diente['vestibular']."' data-palatino='".$diente['palatino']."' data-oclusal='".$diente['oclusal']."' data-mesial='".$diente['mesial']."' data-distal='".$diente['distal']."' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      } 
                                      else{
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='0' data-palatino='0' data-oclusal='0' data-mesial='0' data-distal='0' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      }
                                      

                                    }
                                    ?>
                                    {{-- <td><button> 48 </button></td>
                                    <td><button> 47 </button></td>
                                    <td><button> 46 </button></td>
                                    <td><button> 45 </button></td>
                                    <td><button> 44 </button></td>
                                    <td><button> 43 </button></td>
                                    <td><button> 42 </button></td>
                                    <td><button> 41 </button></td> --}}
                                    <td>  </td>
                                    <?php 
                                   
                                 
                                    for ($i = 31; $i <= 38; $i++) {

                                      $diente = null;

                                      $diente = DavidUtil::buscar($dientes,'nro_pieza',$i);
                                     // echo ($diente);
                                      if($diente)
                                      {
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='".$diente['vestibular']."' data-palatino='".$diente['palatino']."' data-oclusal='".$diente['oclusal']."' data-mesial='".$diente['mesial']."' data-distal='".$diente['distal']."' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      } 
                                      else{
                                        echo "<td> <button data-toggle='modal' data-target='#modal_diente' data-diente-id='".$i."' data-vestibular='0' data-palatino='0' data-oclusal='0' data-mesial='0' data-distal='0' data-paciente='".$paciente->id."'> ".$i." </button> </td>";
                                      }
                                      

                                    }
                                    ?>
                                    {{-- <td><button> 31 </button></td>
                                    <td><button> 32 </button></td>
                                    <td><button> 33 </button></td>
                                    <td><button> 34 </button></td>
                                    <td><button> 35 </button></td>
                                    <td><button> 36 </button></td>
                                    <td><button> 37 </button></td>
                                    <td><button> 38 </button></td> --}}

                                  </tr>

                                </table>
                              </div>
                          </div>

                        </div>
                          <div role="tabpanel" class="tab-pane " id="tratamiento">
                        
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
{{-- modal para registrar una cita --}}
<div class="modal fade" id="myModal" tabindex="-x role="dialog">
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

{{-- modal para diente --}}
<div class="modal fade" id="modal_diente" tabindex="-x role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> Pieza N X    </h4>
      </div>
      <form action="{{url('odontograma')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
              <input type="hidden" name="dienteId" id="dienteId" >
              <input type="hidden" name="pacienteId" id="pacienteId" >
              <div class="form-group">
              
                

                <table>

                 <tr> 
                  <td></td>
                  <td> 
                      <label>Vestibular</label> 
                  
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                 </tr> 

                 <tr> 
                  <td></td>
                  <td> 
                      
                      <select id="vestibular" name="vestibular">
                          <option value="1">Caries</option>
                          <option value="0">Sano</option>
                      </select>
                  </td>
                  <td></td>
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td> 

                  <label>Fecha</label>
                  <input type="text" class="form-control" name="fecha">

                  </td>
                 </tr>

                 </tr>

                  <tr> 
                  <td>
                    <label>Mesial</label> 

                  </td>
                  <td> 
                      <label>Oclusial</label> 
                     
                  </td>
                  <td>
                      <label>Distal</label> 
                    
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                 </tr>



                  <tr> 
                  <td>
                    
                      <select id="mesial" name="mesial">
                          <option value="1">Caries</option>
                          <option value="0">Sano</option>
                      </select>

                  </td>
                  <td> 
                     
                      <select id="oclusial" name="oclusial">
                          <option value="1">Caries</option>
                          <option value="0">Sano</option>
                      </select>
                  </td>
                  <td>
                      
                      <select id="distal" name="distal">
                          <option value="1">Caries</option>
                          <option value="0">Sano</option>
                      </select>

                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                 </tr>

                 <tr> 
                  <td></td>
                  <td> 
                      <label>Palatino</label> 
                    
                  </td>
                  <td></td>
                  <td></td>

                 </tr>

                   <tr> 
                  <td></td>
                  <td> 
                     
                      <select id="palatino" name="palatino">
                          <option value="1">Caries</option>
                          <option value="0">Sano</option>
                      </select>
                  </td>
                  <td></td>
                  <td></td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  <td>
                    <label> Descripcion </label>
                    <textarea name= "descripcion" class="form-control"></textarea>
                 

                  </td>
                 </tr>

                </table>  

              </div>
             
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"> </span>  Cancelar </button>

            <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-floppy-disk"></span> Guardar  </button>
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

  $('#modal_diente').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var dienteId = button.data('diente-id') // Extract info from data-* attributes
  var vestibular = button.data('vestibular')
  var palatino = button.data('palatino')
  var paciente = button.data('paciente')
  var oclusal = button.data('oclusal')
  var mesial = button.data('mesial')
  var distal = button.data('distal')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Pieza Nro' + dienteId)
  modal.find('.modal-body #dienteId').val(dienteId)
  modal.find('.modal-body #pacienteId').val(paciente)
  modal.find('.modal-body #vestibular').val(vestibular).change()
  modal.find('.modal-body #palatino').val(palatino).change()
  modal.find('.modal-body #oclusial').val(oclusal).change()
  modal.find('.modal-body #mesial').val(mesial).change()
  modal.find('.modal-body #distal').val(distal).change()

})

  // $('#modal_diente').on('show.bs.modal', function(e) {

  //   //get data-id attribute of the clicked element
  //     var dienteId = $(e.relatedTarget).data('diente-id');

  //     //populate the textbox
  //     $(e.currentTarget).find('input[name="diendId"]').val(diendId);
  //     //populate new title
  //     modal.find('.modal-title').text('Pieza Nro ' + deinteId)
  // });

  var dientes = <?php echo $dientes; ?> ;
  var sw=false;
  var indice =0;

 // console.log(dientes);
  for(j=0;j<dientes.length;j++)
  {
    console.log(dientes[j]['nro_pieza']);
  }

  var array1118 =[];

  for(i=0;i<8;i++)
  {
    sw=false;
    indice = 0;
    console.log('iterando sw='+sw+' indice='+indice+' i:'+i);

      for(j=0;j<dientes.length;j++)
      {

        console.log(dientes[j]['nro_pieza']+" comparando con "+(i+11));
        if(dientes[j]['nro_pieza']==(i+11))
        {
          sw=true;
          indice = j;
           console.log(dientes[j]['nro_pieza']);
            j=dientes.length;
        }
       

      }
    console.log('iterando sw='+sw+' indice='+indice+' i:'+i);

    var c = document.getElementById("pieza1"+(i+1));
    if(sw==true)
    {
      console.log('objeto econtrado ');
      //console.log(dientes[indice]);
      var d = new DibujarDienteRojo(c,dientes[indice]);

    }else{
       var d = new DibujarDiente(c);
       array1118.push(d);
    }
    //var c = document.getElementById("pieza1"+(i+1));
    //var d = new DibujarDiente(c);
    //array1118.push(d); 
  }

  var array2128 =[];

  for(i=21;i<=28;i++)
  {
     sw=false;
    indice = 0;

     for(j=0;j<dientes.length;j++)
      {

       // console.log(dientes[j]['nro_pieza']+" comparando con "+(i+11));
        if(dientes[j]['nro_pieza']==(i))
        {
          sw=true;
          indice = j;
           console.log(dientes[j]['nro_pieza']);
            j=dientes.length;
        }
       

      }

   var c = document.getElementById("pieza"+i);
   if(sw==true)
    {
      console.log('objeto econtrado ');
      //console.log(dientes[indice]);
      var d = new DibujarDienteRojo(c,dientes[indice]);

    }else{
       var d = new DibujarDiente(c);
       array1118.push(d);
    }
    // var c = document.getElementById("pieza"+i);
    // var d = new DibujarDiente(c);
   // array2128.push(d); 
  }

  var array4148 =[];
  for(i=41;i<=48;i++)
  {
     sw=false;
    indice = 0;

     for(j=0;j<dientes.length;j++)
      {

       // console.log(dientes[j]['nro_pieza']+" comparando con "+(i+11));
        if(dientes[j]['nro_pieza']==(i))
        {
          sw=true;
          indice = j;
           console.log(dientes[j]['nro_pieza']);
            j=dientes.length;
        }
       

      }

   var c = document.getElementById("pieza"+i);
   if(sw==true)
    {
      console.log('objeto econtrado ');
      //console.log(dientes[indice]);
      var d = new DibujarDienteRojo(c,dientes[indice]);

    }else{
       var d = new DibujarDiente(c);
       array1118.push(d);
    }
    // var c = document.getElementById("pieza"+i);
    // var d = new DibujarDiente(c);
   // array2128.push(d); 
  }
  // for(i=0;i<8;i++)
  // {

  //   var c = document.getElementById("pieza4"+(i+1));
  //   var d = new DibujarDiente(c);
  //   array4148.push(d); 
  // }

  // var array3138 = [];
  // for(i=0;i<8;i++)
  // {

  //   var c = document.getElementById("pieza3"+(i+1));
  //   var d = new DibujarDiente(c);
  //   array3138.push(d); 
  // }
  for(i=31;i<=38;i++)
  {
     sw=false;
    indice = 0;

     for(j=0;j<dientes.length;j++)
      {

       // console.log(dientes[j]['nro_pieza']+" comparando con "+(i+11));
        if(dientes[j]['nro_pieza']==(i))
        {
          sw=true;
          indice = j;
           console.log(dientes[j]['nro_pieza']);
            j=dientes.length;
        }
       

      }

   var c = document.getElementById("pieza"+i);
   if(sw==true)
    {
      console.log('objeto econtrado ');
      //console.log(dientes[indice]);
      var d = new DibujarDienteRojo(c,dientes[indice]);

    }else{
       var d = new DibujarDiente(c);
       array1118.push(d);
    }
    // var c = document.getElementById("pieza"+i);
    // var d = new DibujarDiente(c);
   // array2128.push(d); 
  }
  
  // var c = document.getElementById("pieza18");
  // var d18 = new DibujarDiente(c); 
  // var c = document.getElementById("pieza17");
  // var d17 = new DibujarDiente(c);
  // var c = document.getElementById("pieza16");
  // var d16 = new DibujarDiente(c);
  // var c = document.getElementById("pieza15");
  // var d15 = new DibujarDiente(c);
  // var c = document.getElementById("pieza14");
  // var d14 = new DibujarDiente(c);
  // var c = document.getElementById("pieza13");
  // var d13 = new DibujarDiente(c);
  // var c = document.getElementById("pieza12");
  // var d12 = new DibujarDiente(c);
  // var c = document.getElementById("pieza11");
  // var d11 = new DibujarDiente(c);
</script>
@endsection
