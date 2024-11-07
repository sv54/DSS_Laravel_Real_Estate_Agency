@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <meta charset="utf-8">


    <style>
        .flexbox-style {
            display: flex;
            align-items: center;
            min-height: 100px; /* arbitrary height */
        }

        .propiedad {
            border: 1px solid;
            margin: 0.5%;
            box-shadow: 3px 5px 4px #888888;
        }

        .icon {
            width: 20px;
            height: 20px;
        }
    </style>


</head>
@section('content')
<body>
    <div class="container-fluid">
        <div class = "row">
            <div class= 'col-1'></div>
            <div class = "col-3">
                <div class = "col-10">
                    <br>
                    <img src="{{URL::asset('storage/agencies/'.$agency->logo)}}" alt="" width=300px height=200px>
                    <br>
                    <br>
                    <h2>{{$agency->nombre}}</h2>
                    <br>
                    <img class="icon" src="{{URL::asset('/phone.png')}}" alt="">
                    <label>Telefono:</label>{{$agency->telefono}}
                    <br>
                    <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">
                    <label>CIF:</label>{{$agency->CIF}}<br>
                    <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">

                    <label>Ciudad:</label>{{$agency->ciudad}}<br>
                    <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">

                    <label>Direccion:</label>{{$agency->direccion}}<br>
                        <br>
                        <h4>Nuestros agentes</h4>   
                <div class="paginator">
                    @foreach ($agents as $agent)
                    
                    <div class="row propiedad" style="font-size:12px;line-height:20pt">
                        <div class="col-5">
                        <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">

                            <label>{{$agent->nombre}}</label>
                        </div>
                        <div class="col-5">
                        <img class="icon" src="{{URL::asset('/phone.png')}}" alt="">

                            <label>{{$agent->telefono}}</label>
                        </div>
                    </div>
                    @endforeach
                    <br>

                </div>
                {{ $agents->appends(['agents'=>$agents->currentPage()])->links() }}
            </div>
            </div>

            <div class="col-7">  
                <h4>Nuestras propiedades</h4>   
                <div class="paginator">
                    @foreach ($properties as $property)
                    
                    <div class="row propiedad flexbox-style">
                    <div class="col-2">
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
                        </div>
                        <div class="col-2">
                        <img class="icon" src="{{URL::asset('/tipoPropiedad.png')}}" alt="">{{$property->tipoPropiedad}}</img>
                        </div>
                        <div class="col-2">
                            <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">
                            {{$property->ciudad}}</img>
                        </div>
                        <div class="col-2">
                        <img class="icon" src="{{URL::asset('/iconPrecio.png')}}" alt="">{{$property->precio}}</img>

                        </div>
                        <div class="col-2">
                        <img class="icon" src="{{URL::asset('/tipoOperacion.png')}}" alt="">
                           {{$property->tipoOperacion}}</img>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $properties->appends(['properties'=>$properties->currentPage()])->links() }}
            </div>
            <div class= 'col-1'></div>

        </div>
    </div>
</body>
@endsection

</html>