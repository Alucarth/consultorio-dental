@extends('layouts.app')

@section('head')

   

     
 
        

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><h2>Citas</h2></div>
                <div class="panel-body">
                   
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>paciente 1</td>
                                <td>012516216</td>
                                <td> 
                                    <button type="button" class="btn btn-info" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>

                                </td>
                            </tr>
                            <tr>
                                <td>paciente 2</td>
                                <td>011231216</td>
                                <td> 
                                    <button type="button" class="btn btn-info" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span>

                                </td>
                            </tr>
                        
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
