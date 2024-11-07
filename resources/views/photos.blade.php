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
    <form action="{{route ('admin.show')}}" method="GET" >
        @csrf
        <button type="submit">Volver</button>
    </form>

    <div class="container-fluid text-center">
        <div class="paginator">
            <div class="row" style="background:LightGray";>
                <div class="col"><a href=" {{ route('photos.showAll', ['by' => 'id']) }} " >ID</a></div>
                <div class="col"><a href=" {{ route('photos.showAll', ['by' => 'nombre']) }} " >Nombre</a></div>
                <div class="col"><a href=" {{ route('photos.showAll', ['by' => 'property_id']) }} " >property_id</a></div>
                <div class="col">Accion</div>
            </div>
            
            @foreach ($photos as $photo)
            <div class="row";>
                <div class="col">{{$photo->id}}</div>
                <div class="col">{{$photo->nombre}}</div>
                <div class="col">{{$photo->property_id}}</div>
                <div class="col">
                    <form action="{{ route('photos.erase', ['id' => $photo->id]) }}" method="POST" >
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        {{ $photos->links() }}
    </div>
    
</body>
@endsection
</html>