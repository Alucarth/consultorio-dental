@extends('layouts.public')

@section('content')
<!-- <a href="http://localhost/consultorio/public/saludar/david"> enviar </a> -->
		<form action="http://localhost/consultorio/public/saludar" method="POST">
		{{ csrf_field() }}
			    <label>nonbre </label>

				<input class="form-control" type="text" name="nombre">
				<br>
				<label>password</label>
				<input class="form-control" type="text" name="password"><br>
				<button type="submit"> enviar</button>

		</form>

@endsection