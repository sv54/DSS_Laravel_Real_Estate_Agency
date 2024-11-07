@extends('layouts.app')
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="{{asset('css/all.css')}}">

<head>
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta charset="utf-8">

    <style>
        .row {border: 1px solid black;}
        .col {border-left: 1px solid black; border-right: 1px solid black;}
        .paginator{margin-bottom: 2%;}

    </style>

</head>
@section('content')

<body>
    <a href="{{route('admin.show')}}">Volver</a> <br>
    <a href="{{route('addproperty.show')}}">Anyadir Propiedad</a>
    <br>
    <div class="container-fluid text-center">
        <div class="paginator">
            <div class="row";>

                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'id']) }} " >Id</a> </div>
                <div class="col-2 col"><a href="{{ route('properties.showAll', ['by' => 'ciudad']) }}">Ciudad</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'precio']) }}">Precio</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'm2']) }}">m2</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'dormitorios']) }}">Dormitorios</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'banyos']) }}">Banyos</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'tipoPropiedad']) }}">Tipo propiedad</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'tipoOperacion']) }}">Tipo Operacion</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'cp']) }}">CP</a></div>
                <div class="col-1 col"><a href="{{ route('properties.showAll', ['by' => 'user_id']) }}">ID agente</a></div>
                <div class="col-1 col">Interaccion</div>
                 
            </div>
            @foreach ($properties as $property)
            <div class="row";>
                <div class="col-1 col">{{$property->id}}</div>
                <div class="col-2 col">{{$property->ciudad}}</div>
                <div class="col-1 col">{{$property->precio}}</div>
                <div class="col-1 col">{{$property->m2}}</div>
                <div class="col-1 col">{{$property->dormitorios}}</div>
                <div class="col-1 col">{{$property->banyos}}</div>
                <div class="col-1 col">{{$property->tipoPropiedad}}</div>
                <div class="col-1 col">{{$property->tipoOperacion}}</div>
                <div class="col-1 col">{{$property->cp}}</div>
                <div class="col-1 col">{{$property->user->id}}</div>
                <form action="{{ route('properties.erase', ['id' => $property->id]) }}" method="POST" >
                    @csrf
                    <button type="submit">Eliminar</button>
                </form>
                <form action="{{ route('property.showupdate', ['id' => $property->id]) }}" method="GET">
                    @csrf
                    <button type="submit">Update</button>
                </form>
            </div>
            @endforeach
        </div>
        {{ $properties->links() }}
    </div>
    
</body>
@endsection
</html>