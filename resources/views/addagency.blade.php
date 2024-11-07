@extends('layouts.app')

<!DOCTYPE html>
<html>

<head>
<link href="{{ asset('css/agency.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <meta charset="utf-8">

</head>



@section('content')

<body>
<a href="{{route ('admin.show')}}">Volver</a><br>

{{-- Error messages --}}
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <div class="container-fluid" >
        <h2>Crear nueva agencia</h2>
    <form method="POST" action="{{route ('addagency')}}" enctype="multipart/form-data">
        @csrf
        <div class="create">
        <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">

            <label for="nombre">Nombre:</label>
            <input type="text" value="{{ old('nombre') }}" name="nombre" id="nombre">
            <br>
            <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">

            <label for="CIF">CIF:</label>
            <input type="text" value="{{ old('CIF') }}" name="CIF" id="CIF">
            <br>
            <img class="icon" src="{{URL::asset('/phone.png')}}" alt="">
            <label for="telefono">Telefono:</label>
            <input type="text" value="{{ old('telefono') }}" name="telefono" id="telefono">
            <br>
            <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">

            <label for="ciudad">Ciudad:</label>
            <select name="ciudad" selected="{{ old('ciudad') }}">
                <?php
                foreach ($ciudades as $ciudad){
                    echo "<option value=" . $ciudad . ">" . $ciudad . "</option>";
                }

                ?>
            </select>
            <br>
            <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">

            <label for="direccion">Direccion:</label>
            <input type="text" value="{{ old('direccion') }}" name="direccion" id="direccion">
            <br>
            <img class="icon" src="{{URL::asset('/photo.png')}}" alt="">

            <label for="logo">Logo:</label>
            <input type="file" value="{{ old('file') }}" name="logofile">
            <br><br>
            <button type="submit">Aceptar</button>
        </div>
    </form>
    </div>
    <!-- Formulario -->


</body>
@endsection