@extends('layouts.app')

<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta charset="utf-8">

    <!-- No funciona -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>
        .row {border: 1px solid black;}
        .col {border-left: 1px solid black; border-right: 1px solid black;}
        .paginator{margin-bottom: 2%;}

    </style>

</head>
@section('content')

<body>

    <a href="{{route ('admin.show')}}">Volver</a>
    <a href="{{route ('addagency.show')}}">Anyadir agencia</a>

    <div class="container-fluid">
        <div class="paginator">
            <div class="row";>
                <div class="col-1 col"><a href="{{ route('agencies.showAll', ['by' => 'id']) }} " >ID</a></div>
                <div class="col-2 col"><a href="{{ route('agencies.showAll', ['by' => 'nombre']) }} " >Nombre</a></div>
                <div class="col-1 col"><a href="{{ route('agencies.showAll', ['by' => 'CIF']) }} " >CIF</a></div>
                <div class="col-1 col"><a href="{{ route('agencies.showAll', ['by' => 'telefono']) }} " >Telefono</a></div>
                <div class="col-2 col"><a href="{{ route('agencies.showAll', ['by' => 'ciudad']) }} " >Ciudad</a></div>
                <div class="col-2 col"><a href="{{ route('agencies.showAll', ['by' => 'direccion']) }} " >Direccion</a></div>
                <div class="col-1 col">Logo</div>
                <div class="col-2 col">Interaccion</div>
            </div>
            @foreach ($agencies as $agency)
            
            <div class="row";>
                <div class="col-1 col">{{$agency->id}}</div>
                <div class="col-2 col">{{$agency->nombre}}</div>
                <div class="col-1 col">{{$agency->CIF}}</div>
                <div class="col-1 col">{{$agency->telefono}}</div>
                <div class="col-2 col">{{$agency->ciudad}}</div>
                <div class="col-2 col">{{$agency->direccion}}</div>
                <div class="col-1 col">{{$agency->logo}}</div>
                <div class="col-2 col" style="display:flex"  >
                    <form action="{{ route('agency.showupdate', ['id' => $agency->id]) }}" method="GET">
                            @csrf
                            <button type="submit">Update</button>
                    </form>
                    <form action="{{ route('erase_agency', ['id' => $agency->id]) }}" method="POST">
                            @csrf
                            <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        {{ $agencies->links() }}
    </div>
    
</body>
@endsection
</html>