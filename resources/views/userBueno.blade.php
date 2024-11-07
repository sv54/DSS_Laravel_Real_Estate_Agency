@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ asset('css/users.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" />

    <style>
        /*
        .datosPropiedad{
            display: flex;
            position: absolute;
            left: 20%;
        }
        */
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .icon {
            display: flex;
            width: 20px;
            height: 20px;
        }
        .row{
            margin: 1%;
        }
        .btnEd {
            display: flex;
            float: right;
            position: absolute;
            left: 60%;
            top: 60%;
            border-radius: 20px;
            text-align: center;
            font-size: 100%;
            color: black;
        }
        .img_agencyDiv {
            display: flex;
            position: absolute;
            left: 80%;
            top: 0%;
            width: 150px;
            height: 100px;
        }
        .labelATD
        {
            display: flex;
            float: right;
            position: absolute;
            left: 95%;
            top: 30%;
            border-radius: 20px;
            text-align: center;
            font-size: 100%;
            color: black;
        }
        
        .footer-distributed
        {
            position: relative;
            top: 150px;
        }
        .flexbox-styles {
            display: flex;
            align-items: center;
            min-height: 150px; /* arbitrary height */
            font-size:18px;
        }
    </style>
</head>

@section('content')
<body>
    <div class ="CuadroExt">
        <div class="row propiedad flexbox-styles" style="background-color:">
            <div class="divimgdatos">
                <div class="img_profileDiv ">          
                    <img src="{{URL::asset('/ejemplo_avatar.jpg')}}" alt="" width=150px height=100px>             
                </div>
                
                <div class="datos">
                    <label class="labelN">Agente: </label>
                    <label class="labelND">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</label>

                    <label class="labelE">Email: </label>
                    <label class="labelED">{{ Auth::user()->email }}</label>

                    <label class="labelT">Telefono: </label>
                    <label class="labelTD">{{ Auth::user()->telefono }}</label>

                    <label class="labelA">Agencia: </label>
                    <label class="labelAD">{{ $agency->nombre }}</label>

                    <label class="labelAT">Telefono de la agencia: </label>
                    <label class="labelATD">{{ $agency->telefono }}</label>

                    @if (Auth::user()->tipoUsuario == "agente")
                        <form action="{{route('user.showupdateBueno',['id' => Auth::user()->id])}}" method="GET" >
                            @csrf
                            <button type="submit" class="btnEd">
                                Editar datos usuario
                            </button>
                        </form>
                    @endif
                </div>

                <div class="img_agencyDiv">
                    <form action="{{route('agency.show',['id' => $agency->id])}}" method="GET" >
                        @csrf
                        <button type="submit" class="btn">
                        <img src="{{URL::asset('/ejemplo_agencia.jpg')}}" alt="" width=150px height=100px>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="puto-flex">
            <div class="propiedades">
                <h3>Propiedades</h3>
                <br>
                <div class="paginator">
                    <div class="flex-general">
                        @foreach ($properties as $property)
                        <div class="rowMY">
                            <div class="rowMY propiedad flexbox-style" style="background-color:">
                                <div class="col-2">
                                    <form action="{{route('properties.show',['id' => $property->id])}}" method="GET" >
                                        @csrf
                                        <div style="display:none">
                                            {!! $encontrado = false !!}
                                                {!! $nombre = null !!}
                                                @foreach ($photos as $photo)    
                                                    @if($photo->property_id === $property->id)
                                                        {!! $encontrado = true !!}
                                                        {!! $nombre = $photo->nombre !!}
                                                        @break
                                                    @endif
                                            @endforeach
                                        </div>
                                        <a href="{{route('properties.show',['id' => $property->id])}}">
                                            
                                            @if ($encontrado)
                                                <img src="{{URL::asset('storage/properties/'.$nombre)}}" alt="" width=100% height=100%>
                                            @else
                                                <img src="{{URL::asset('/no_data.png')}}" alt="" width=100% height=100%>
                                            @endif
                                        </a>
                                    </form>
                                </div>
                                <div class="col-10">
                                    <div class="rowMY">
                                        <div class="col-8 text">{{$property->desc}}</div>
                                    </div>
                                    <div class="rowMY">
                                        <div class="col-2 text">
                                            <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">
                                            <p style="display:inline">{{$property->ciudad}}</p>
                                        </div>
                                        <div class="col-2">
                                            <img class="icon" src="{{URL::asset('/iconM2.png')}}" alt="">
                                            <p style="display:inline">{{$property->m2}} m2</p>
                                        </div>
                                        <div class="col-2">
                                            <img class="icon" src="{{URL::asset('/iconHab.png')}}" alt="">
                                            <p style="display:inline">{{$property->dormitorios}}</p>
                                        </div>
                                        <div class="col-2">
                                            <img class="icon" src="{{URL::asset('/iconBanyo.png')}}" alt="">
                                            <p style="display:inline">{{$property->banyos}}</p>
                                        </div>
                                    </div>
                                    <div class="rowMY">
                                        <div class="col-2 text">
                                            <p style="display:inline">Tipo: {{$property->tipoPropiedad}}</p>
                                        </div>
                                        <div class="col-2 text">
                                            <p style="display:inline">{{$property->tipoOperacion}}</p>
                                        </div>
                                        <div class="col-2">
                                            <img src="{{URL::asset('/iconPrecio.png')}}" alt="" width=30px heigth=30px>
                                            <p style="display:inline; font-size: 20px;">{{$property->precio}}</p>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                            @if (Auth::user()->tipoUsuario == "agente")
                                            <form action="{{ route('property.showupdateAgente', ['id' => $property->id]) }}" method="GET">
                                                @csrf
                                                <button type="submit">Update</button>
                                            </form>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{ $properties->links() }}
            </div>
        </div>
        
    </div>
</body>
@endsection
</html>