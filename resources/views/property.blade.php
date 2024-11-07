@extends('layouts.app')
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="{{asset('css/all.css')}}">

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">

    <style>

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .carousel-inner {
            border: 5px solid #B7D156;
            
        }
        .icon {
            width: 20px;
            height: 20px;
        }
        .row{
            margin: 1%;
        }

    </style>
</head>

<!-- Para que funcionen slides -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="center col imagenes">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @if(count($photos)< 1)
                            <img src="{{URL::asset('/no_data.png')}}" alt="" width=100% height=100%>
                        @else
                            @foreach ($photos as $photo)
                                @if ($loop->first)
                                    <div class="carousel-item active">
                                        <img src="{{URL::asset('storage/properties/'.$photo->nombre)}}" class= "d-block w-100" alt="" width=1280px height=720px>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{URL::asset('storage/properties/'.$photo->nombre)}}" class= "d-block w-100" alt="" width=1280px height=720px>
                                    </div>
                                @endif       
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class='col-1'></div>
            <div class='col-10'>
                <p>{{$property->desc}}</p>
            </div>
            <div class='col-1'></div>
        </div>
        
        
        <div class="row">
            <div class="col-1">

            </div>
            <div class="col-5">
                <div class="row">
                    <p style="display:inline">
                    <h3>Informacion Basica:</h3>
                    </p>
                </div>
                <div class="row info">
                    <div class="col-4">
                        <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">
                        <p style="display:inline">Ciudad:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$property->ciudad}}</p>
                    </div>
                </div>
                <div class="row info">
                    <div class="col-4">
                        <img class="icon" src="{{URL::asset('/iconM2.png')}}" alt="">
                        <p style="display:inline">M2:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$property->m2}}</p>
                    </div>
                </div>
                <div class="row info">
                    <div class="col-4">
                        <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">
                        <p style="display:inline">tipo:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$property->tipoPropiedad}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img class="icon" src="{{URL::asset('/iconHab.png')}}" alt="">
                        <p style="display:inline">Dormitorios:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$property->dormitorios}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <img class="icon" src="{{URL::asset('/iconBanyo.png')}}" alt="">
                        <p style="display:inline">Baños:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$property->banyos}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class='col-4'>
                        <img src="{{URL::asset('/iconPrecio.png')}}" alt="" class='icon'>
                        <p style="display:inline">Precio:</p>
                    </div>
                    <div class='col-6'>
                        <p style="display:inline;">{{$property->precio}}€</p>
                    </div>
                    <div class="info">
                        
                        
                    </div>
                </div>
            </div>
            <div class="col-1">
                
            </div>
            <div class="col-5">
                <div class="row">
                    <p style="display:inline">
                        <h3>Informacion de Agente:</h3>
                    </p>
                </div>
                <div class="row">
                    <div class="col-4">
                    <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">

                        <p style="display:inline">Nombre:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$user->nombre}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                    <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">

                        <p style="display:inline">Apellido:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$user->apellido}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                    <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">

                        <p style="display:inline">Agencia:</p>
                    </div>
                    <div class="col-6">
                        <a href="{{route('agency.show',['id' => $agency->id])}}">
                            <p style="display:inline">{{$agency->nombre}}</p>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <p style="display:inline">
                        <h3>Contacto:</h3>
                    </p>
                </div>
                <div class="row">
                    <div class="col-4">
                    <img class="icon" src="{{URL::asset('/phone.png')}}" alt="">

                        <p style="display:inline">Telefono:</p>
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$user->telefono}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                    <img class="icon" src="{{URL::asset('/email.png')}}" alt="">

                        <p style="display:inline">Email:</p>   
                    </div>
                    <div class="col-6">
                        <p style="display:inline">{{$user->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        
                    </div>
                    <div class="col-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        
                    </div>
                    <div class="col-6">

                    </div>
                </div>
            </div>
            
        </div>

    </div>
</body>
@endsection
</html>