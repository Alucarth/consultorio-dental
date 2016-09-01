@extends('layouts.app')

@section('head')

   

     
 
        

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h2>Paciente: paciente 1</h2> </div>
                <div class="panel-body">
                   
                   
                   <label> Telefono:  </label> 12312312
                   <br>
                   <label> Grupo Sanguineo:</label> orh
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

@endsection
