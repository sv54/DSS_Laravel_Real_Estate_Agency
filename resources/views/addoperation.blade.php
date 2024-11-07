@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>
        .col-3 {border-right: 3px solid black;}
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
    <form action="{{route ('operations.showAll')}}" method="GET" >
        @csrf
        <button type="submit">Volver</button>
    </form>
    <p></p>
    <form method="POST" action="{{ route('AddOperation') }}">
        @csrf
        
        <div class="formulario container">
            <div class="row">
                <div class="col-2">
                    <label for="tipoOperacion">Tipo de operacion:</label>
                </div>
                <div class="col">
                    <select name="tipoOperacion">
                        <?php
                        foreach ($tipos as $tipo){
                            echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col-2">
                    <label for="property_id">Propiedad:</label>
                </div>
                <div class="col">
                    <select name="property_id">
                        <?php
                        foreach ($properties as $property){
                            echo "<option value=" . $property->id . ">" . $property->id . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-2">
                    <label for="fecha">Fecha de la operacion:</label>
                </div>
                <div class="col-2">
                    <input type="fecha" name="fecha" id="fecha">
                </div>
            </div>
            
            <button type="submit">Aceptar</button>
        </div>
    </form>

</body>
@endsection