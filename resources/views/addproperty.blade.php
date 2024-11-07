@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>
        .row{
            padding: 2px
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
    @if (Auth::user()->tipoUsuario== 'admin')
    <form method="POST" action="{{route ('addproperty')}}", enctype="multipart/form-data">

    @else
    <form method="POST" action="{{route ('addpropertyAgente')}}", enctype="multipart/form-data">
    @endif
        @csrf
        <div class="container">
            <div class="row">
                <h1>Nueva propiedad</h1>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="desc"><h3>Descripcion:</h3></label>
                </div>
                <br>
            </div>
            <div class="row" style="width:100%">
                <div class="col ">
                    <textarea name="desc" value='' style="width:100%; height:100%;" rows="5" placeholder="Si no tiene text preparado, es mejor que empiece describiendo la propiedad para llamar la atencion del cliente. A continuacion ponga detalles que no aparecen en los apartados de abajo, por ejemplo si dispone de piscina o parking.."></textarea>
                    <!-- <input type="textarea" name="desc" id="desc" value="{{ old('desc') }}"> -->
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="tipoPropiedad">Tipo Propiedad:</label>
                </div>
                <div class="col">
                    <select name="tipoPropiedad">
                        <?php
                        foreach ($tiposPropiedad as $tipo){
                            echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="m2">Metros cuadrados:</label>
                </div>
                <div class="col">
                    <input type="number" name="m2" id="m2" value="{{ old('m2') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="dormitorios">Dormitorios:</label>
                </div>
                <div class="col">
                    <input type="number" name="dormitorios" id="dormitorios" value="{{ old('dormitorios') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="banyos">Banyos:</label>
                </div>
                <div class="col">
                    <input type="number" name="banyos" id="banyos" value="{{ old('banyos') }}">
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">

            <div class="row">
                <div class="col-1 etiqueta">
                    <label for="ciudad">Ciudad:</label>
                </div>
                <div class="col-1">
                    <select name="ciudad">
                        <?php
                        foreach ($ciudades as $tipo){
                            echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-1 etiqueta">
                    <label for="cp">CP:</label>
                </div>
                <div class="col-1">
                    <input type="number" name="cp" id="cp" value="{{ old('cp') }}">
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="precio">Precio:</label>
                </div>
                <div class="col">
                    <input type="number" name="precio" id="Precio" value="{{ old('precio') }}">
                </div>
            </div>
            
            
            
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="operaciones">Tipo Operacion:</label>
                </div>
                <div class="col">
                    <select name="operaciones">
                        <?php
                        foreach ($operaciones as $tipo){
                            echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            
            <
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <label name= "files"> Eliga imagenes </label>
            <input type="file" name='files[]' multiple enctype='multipart/form-data'>

            <br>
            <button type="submit" class='button-10'>Aceptar</button>
        </div>
    </form>

</body>

@endsection
</html>