@extends('layouts.app')

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>
        .col-3 {
            border-right: 3px solid black;
        }
    </style>
</head>
@section('content')

<body>
{{-- Error messages --}}
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <!-- Formulario -->
    <a href="{{route ('users.show')}}">Volver</a>
    <form method="POST" action="{{route ('AddUser')}}">
        @csrf
        <div class="formulario container">
            <div class="row">
                <div class="col-2">
                    <label for="email">Correo:</label>
                </div>
                <div class="col">
                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="nombre">Nombre:</label>
                    </div>
                    <div class="col">
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="apellido">Apellido:</label>
                </div>
                <div class="col">
                    <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="password">Password:</label>
                </div>
                <div class="col">
                    <input type="text" name="password" id="password" value="{{ old('password') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="telefono">Telefono:</label>
                </div>
                <div class="col">
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="DNI">DNI:</label>
                </div>
                <div class="col">
                    <input type="text" name="DNI" id="DNI" value="{{ old('DNI') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="agency_id">Agency_id</label>
                </div>
                <div class="col">
                    <input type="text" name="agency_id" id="agency_id" value="{{ old('agency_id') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="tipoUsuario">Tipo de usuario:</label>
                </div>
                <div class="col">
                    <select name="tipoUsuario">
                        <?php
                        foreach ($tipos as $tipo){
                            echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>

            <button type="submit">Aceptar</button>
        </div>
    </form>

</body>
@endsection
