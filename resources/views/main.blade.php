@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->

    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>


        .flexbox-style {
            display: flex;
            align-items: center;
            min-height: 100px; /* arbitrary height */
            font-size:18px;
        }
    </style>

</head>

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-2 filtro">
                <form method="GET" action="{{route ('main.filter')}}">
                    <br>
                    <h4>Filtros</h4>
                    <div>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        
                        <input type="checkbox" name="tipo[]" value='venta' autocomplete='on'> Venta <br>
                        <input type="checkbox" name="tipo[]" value='alquiler'> Alquiler <br>

                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div>
                        <label for="ciudadReq">Ciudad:</label>
                        <select name="ciudadReq">
                            <option value=0>-Not Selected-</option>
                            <?php
                            foreach ($ciudades as $tipo){
                                echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div>
                        <label for="precio">Precio:</label>
                        <label for="preciomin"></label>
                        <label for="preciomax"></label>
                        <br>
                        <input type="number" name="preciomin" id="preciomin" class="precios" placeholder="min" value= "{{old('preciomin')}}">
                        <input type="number" name="preciomax" id="preciomax" class="precios" placeholder="max">
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div>
                        <p>Numero de minimo de habitaciones:</p>
                        <input type="number" name="numHab" class="precios">
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div>
                        <label for="tipoPropiedadReq">Tipo Propiedad:</label>
                        <select name="tipoPropiedadReq">
                            <option value=0>-Not Selected-</option>
                            <?php
                            foreach ($tipoPropoiedad as $tipo){
                                echo "<option value=" . $tipo . ">" . $tipo . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div>
                        <label for="m2req">m2:</label>
                        <input type="number" name="m2req" class="precios" value="{{ old('m2req') }}">
                    </div>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <button class="button-10" type="submit">Aceptar</button>
                </form>
                <br>
                <form method="GET" action="{{route ('main.showAll')}}">
                    <button class="button-10" type="submit">Limpiar</button>
                </form>
                <br>
            </div>
            <!-- Ofertas -->
            <div class="col-8 oferta">
                <h3>Ofertas</h3>
                <br>
                <div class="paginator">
                    @foreach ($properties as $property)
                    <div class="row propiedad flexbox-style" style="background-color:">
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
                        <div class=col-10>
                            <div class="row">
                                <div class="col-8 text">{{$property->desc}}</div>
                            </div>
                            <div class="row">
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
                            <div class="row">
                                <div class="col-2 text">
                                <img class="icon" src="{{URL::asset('/tipoPropiedad.png')}}" alt="">
                                    {{$property->tipoPropiedad}}</img>
                                </div>
                                <div class="col-2 text">
                                <img class="icon" src="{{URL::asset('/tipoOperacion.png')}}" alt="">

                                    {{$property->tipoOperacion}}</img>
                                </div>
                                <div class = "col-6"></div>
                                <div class="col-2">
                                    <img src="{{URL::asset('/iconPrecio.png')}}" alt="" width=30px heigth=30px>
                                    <p style="display:inline; font-size: 25px;">{{$property->precio}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</body>
@endsection
</html>