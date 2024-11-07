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
    <form method="POST" action="{{route ('agency.update')}}">
        @csrf
        
        <div class="formulario container">
            <div class="row">
                <div class="col-2">
                    <label for="id">ID:</label>
                </div>
                <div class="col">
                    <textarea name="id" cols="10" rows="1" id="id" style="height: 30px;" readonly>{{$agency->id}}</textarea> 
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="col">
                    <input type="text" name="nombre" id="nombre" value="{{$agency->nombre}}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="CIF">CIF:</label>
                </div>
                <div class="col">
                    <input type="text" name="CIF" id="CIF" value="{{$agency->CIF}}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="telefono">Telefono:</label>
                </div>
                <div class="col">
                    <input type="text" name="telefono" id="telefono" value="{{$agency->telefono}}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="ciudad">Ciudad:</label>
                </div>
                <div class="col">
                <select name="ciudad">
                <?php
                foreach ($ciudades as $ciudad){
                    echo "<option value=" . $ciudad . "";
                    if($ciudad == $agency->ciudad){
                        echo " selected =\"selected\"";
                    }
                    echo ">" . $ciudad . "</option>";
                }

                ?>
            </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="direccion">Direccion:</label>
                </div>
                <div class="col">
                    <input type="text" name="direccion" id="direccion" value="{{$agency->direccion}}">
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="logo">Logo:</label>
                </div>
                <div class="col">
                    <input type="text" name="logo" id="logo" value="{{$agency->logo}}">
                </div>
            </div>
            <button type="submit">Aceptar</button>
        </div>
    </form>

</body>
@endsection