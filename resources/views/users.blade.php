@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>
        .row {border: 1px solid black;}
        .col {border-left: 1px solid black; border-right: 1px solid black;}
        .paginator{margin-bottom: 2%;}

    </style>

</head>
@section('content')

<body>

    <a href="{{route ('admin.show')}}">Volver</a><br>
    <a href="{{route ('adduser.show')}}">Anyadir usuario</a>

    <div class="container-fluid text-center">
        <div class="paginator">
            <div class="row" style="background:LightGray";>
                <div class="col-1 col"><a href="{{ route('users.show', ['by' => 'id']) }}">ID</a></div>
                <div class="col-2 col"><a href="{{ route('users.show', ['by' => 'nombre']) }}">Nombre</a></div>
                <div class="col-2 col"><a href="{{ route('users.show', ['by' => 'apellido']) }}">Apellido</a></div>
                <!-- <div class="col-1 col"><a href="{{ route('users.show', ['by' => 'password']) }}">Password</a></div> -->
                <div class="col-2 col"><a href="{{ route('users.show', ['by' => 'email']) }}">email</a></div>
                <div class="col-1 col"><a href="{{ route('users.show', ['by' => 'DNI']) }}">DNI</a></div>
                <div class="col-1 col"><a href="{{ route('users.show', ['by' => 'telefono']) }}">Telefono</a></div>
                <div class="col-1 col"><a href="{{ route('users.show', ['by' => 'tipoUsuario']) }}">Tipo</a></div>
                <div class="col-2 col">Interaccion</a></div>
            </div>
            @foreach ($users as $user)
            <div class="row";>
                <div class="col-1 col">{{$user->id}}</div>
                <div class="col-2 col">{{$user->nombre}}</div>
                <div class="col-2 col">{{$user->apellido}}</div>
                <!-- <div class="col-1 col">{{$user->password}}</div> -->
                <div class="col-2 col">{{$user->email}}</div>
                <div class="col-1 col">{{$user->DNI}}</div>
                <div class="col-1 col">{{$user->telefono}}</div>
                <div class="col-1 col">{{$user->tipoUsuario}}</div>
                <div class="col-2 col" style="display:flex" >
                    <form action="{{ route('erase_user', ['id' => $user->id]) }}" method="POST" >
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                    <form action="{{ route('user.showupdate', ['id' => $user->id]) }}" method="GET">
                        @csrf
                        <button type="submit">Update</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        {{ $users->links() }}
    </div>
    
</body>
@endsection
</html>