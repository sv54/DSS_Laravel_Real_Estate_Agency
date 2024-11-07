@extends('layouts.app')
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="{{asset('css/all.css')}}">

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta charset="utf-8">

    <!-- No funciona -->
    <!--<link rel="stylesheet" href="{{ asset('css/operations.css') }}" />-->

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
    <p></p>
    <form action="{{ route('addoperation.show') }}" method="GET" >
        @csrf
        <button type="submit">Nueva operacion</button>
    </form>
    <p></p>

    <div class="container-fluid text-center">
        <div class="paginator">
            <div class="row" style="background:LightGray";>
                <div class="col-2 col"><a href=" {{ route('operations.showAll', ['by' => 'id']) }} " >ID</a></div>
                <div class="col-2 col"><a href=" {{ route('operations.showAll', ['by' => 'tipoOperacion']) }} " >Tipo Operacion</a></div>
                <div class="col-2 col"><a href=" {{ route('operations.showAll', ['by' => 'fecha']) }} " >Fecha</a></div>
                <div class="col-2 col"><a href=" {{ route('operations.showAll', ['by' => 'property_id']) }} " >Propiedad</a></div>
                <div class="col-4 col">Ajustes</div>
            </div>
            
            @foreach ($operations as $operation)
            <div class="row";>
                <div class="col-2 col">{{$operation->id}}</div>
                <div class="col-2 col">{{$operation->tipoOperacion}}</div>
                <div class="col-2 col">{{$operation->fecha}}</div>
                <div class="col-2 col"><a href="property/{{$operation->property_id}}">{{$operation->property_id}}</a></div>
                <div class="col-2 col">
                    <form action="{{ route('erase_operation', ['id' => $operation->id]) }}" method="POST" >
                        @csrf
                        <button type="submit">Borrar</button>
                    </form>
                </div>
                <div class="col-2 col">
                    <form action="{{ route('modificar_operation.show', ['id' => $operation->id]) }}" method="GET" >
                        @csrf
                        <button type="submit">Modificar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        {{ $operations->links() }}
    </div>
    
</body>
@endsection
</html>