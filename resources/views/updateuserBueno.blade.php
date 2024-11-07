@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/updateuserBueno.css')}}">

    <style>
        .col-3 {
            border-right: 3px solid black;
        }

        .btnVolver {
            border-radius: 20px;
            text-align: center;
            font-size: 100%;
            color: black;
        }
        
        .btnAceptar {
            border-radius: 20px;
            text-align: center;
            font-size: 100%;
            color: black;
        }
    </style>
</head>

@section('content')
<body>
    <div class="actualizacion">
        {{-- Error messages --}}
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{route ('user.showBueno',['id' => Auth::user()->id])}}" method="GET" >
            @csrf
            <button type="submit" class="btnVolver">
                Volver
            </button>
        </form>

        <!-- Formulario -->
        <form action="{{route ('user.updateBueno')}}" method="POST">
            @csrf
            <div class="formulario ">
                <div class="rowMy" >
                    <div class="col-2">
                        <label for="id"  style="visibility:hidden;">ID:</label>
                    </div>
                    <div class="col">
                        <textarea style="visibility:hidden;" name="id" cols="10" rows="1" id="id" style="height: 30px;" readonly>{{$user->id}}</textarea> 
                    </div>
                </div>
                <div class="rowMY">
                    <div class="col-2">
                        <label for="email">Correo:</label>
                    </div>
                    <div class="col">
                        <input type="email" name="email" id="email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="rowMY">
                    <div class="col-2">
                        <label for="nombre">Nombre:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="nombre" id="nombre" value="{{$user->nombre}}">
                    </div>
                </div>
                <div class="rowMY">
                    <div class="col-2">
                        <label for="apellido">Apellido:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="apellido" id="apellido" value="{{$user->apellido}}">
                    </div>
                </div>
                <div class="rowMY">
                    <div class="col-2">
                        <label for="password">Password:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="password" id="password">
                    </div>
                </div>
                <div class="rowMY">
                    <div class="col-2">
                        <label for="telefono">Telefono:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="telefono" id="telefono" value="{{$user->telefono}}">
                    </div>
                </div>
                <div class="rowMY">
                    <div class="col-2">
                        <label for="DNI">DNI:</label>
                    </div>
                    <div class="col">
                        <input type="text" name="DNI" id="DNI" value="{{$user->DNI}}">
                    </div>
                </div>
            </div>

        
            <button type="submit" class="btnAceptar">Aceptar</button>
        </form>
    </div>

</body>
@endsection
</html>