@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

<style>

        .etiqueta{
            text-align: left;
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
    <form method="POST" action="{{route('property.update')}}", enctype="multipart/form-data">
        
    @else
    <form method="POST" action="{{route('property.updatebyagente')}}", enctype="multipart/form-data">
    @endif

        @csrf
        <div class="formulario container">
            <div class="row">
                <h1>Modificar propiedad</h1>
            </div>
            @if (Auth::user()->tipoUsuario== 'admin')
                <div class="row">
                    <div class="col-2">
                        <label for="id">ID:</label>
                    </div>
                
                    <div class="col">
                        <textarea name="id" cols="10" rows="1" id="id" style="height: 30px;" readonly>{{$property->id}}</textarea> 
                    </div>
                </div>
            @endif
            <div>
            <label for="id"></label>
            <input type="hidden"  name="id" value="{{$property->id}}"> 
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="desc"><h3>Descripcion:</h3></label>
                </div>
                <br>
            </div>
            <div class="row" style="width:100%">
                <div class="col ">
                    <input type="text" name="desc" id="desc" value="{{$property->desc}}" style="width:100%; height:100%;" rows="5" ></input>
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
                            echo "<option value=" . $tipo . "";
                            if($tipo == $property->tipoPropiedad){
                                echo " selected =\"selected\"";
                            }
                            echo ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="m2">m2:</label>
                </div>
                <div class="col">
                    <input type="number" name="m2" id="m2" value="{{$property->m2}}">
                </div>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="dormitorios">Dormitorios:</label>
                </div>
                <div class="col">
                    <input type="number" name="dormitorios" id="dormitorios" value="{{$property->dormitorios}}">
                </div>
            </div><div class="row">
                <div class="col-2 etiqueta">
                    <label for="banyos">Banyos:</label>
                </div>
                <div class="col">
                    <input type="number" name="banyos" id="banyos" value="{{$property->banyos}}">
                </div>
            </div> 
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="ciudad">Ciudad:</label>
                </div>
                <div class="col">
                    <select name="ciudad">
                        <?php
                        foreach ($ciudades as $tipo){
                            echo "<option value=" . $tipo . "";
                            if($tipo == $property->ciudad){
                                echo " selected =\"selected\"";
                            }
                            echo ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="cp">CP:</label>
                </div>
                <div class="col">
                    <input type="number" name="cp" id="cp" value="{{$property->cp}}">
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="precio">Precio:</label>
                </div>
                <div class="col">
                    <input type="number" name="precio" id="Precio" value="{{$property->precio}}">
                </div>
            </div>    
            <div class="row">
                <div class="col-2 etiqueta">
                    <label for="tipoOperacion">Tipo Operacion:</label>
                </div>
                <div class="col">
                    <select name="tipoOperacion">
                        <?php
                        foreach ($operaciones as $tipo){
                            echo "<option value=" . $tipo . "";
                            if($tipo == $property->tipoOperacion){
                                echo " selected =\"selected\"";
                            }
                            echo ">" . $tipo . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">

            @if (Auth::user()->tipoUsuario== 'admin')
                <div class="row">
                    <div class="col-2 etiqueta">
                        <label for="user_id">User_id:</label>
                    </div>
                    <div class="col">
                        <input type="number" name="user_id" id="user_id" value="{{$property->user_id}}">
                    </div>
                </div>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            @endif
            

            <br>

            <input type="hidden"  name="user_id" value="{{Auth::user()->id}}"> 
            <button type="submit">Aceptar cambios</button>
        </div>
        </form>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">

        <div style="padding: 0% 4% 0% 4%">
        <div class ="row justify-content-center ">
            <div class=col-1></div>
            <div class=col-10>
                <div class='row'>
                    @foreach ($photos as $photo)
                        <div class="col-3">
                            <div class='row'>
                                <img src="{{URL::asset('storage/properties/'.$photo->nombre)}}" alt="" width=350px height=200px>
                            </div>
                            <div class='row'>
                                <div class='col-6'> 
                                    <form action="{{ route('photos.eraseAgent') }}" method="POST" >
                                        @csrf
                                        <input type="hidden"  name="prop_id" value="{{$property->id}}"> 
                                        <input type="hidden"  name="photo_id" value="{{$photo->id}}"> 

                                        <button type="submit" class='button-10'>Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class=col-1></div>
        </div>
       

        <form method="POST" action="{{route ('photos.addphotos')}}", enctype="multipart/form-data">
        @csrf

                    <label name= "files"> Eliga imagenes </label>
                <input type="file" name='files[]' multiple enctype='multipart/form-data'>
                <input type="hidden"  name="prop_id" value="{{$property->id}}"> 

                <br>
                <button type="submit">Subir fotos</button>
            </div>
        </form>
    </div>


</body>
@endsection
