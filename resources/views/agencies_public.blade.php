@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta charset="utf-8">

    <!-- Si funciona pero no se actualiza -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    <style>


    </style>


</head>
@section('content')

<body>
    <div class="container">
        <div class = "row">
            <div class = "col-2">
                <form method="GET" action="{{route ('agencies_public.filter')}}">
                    <br>
                    <h4>Filtros</h4>
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
                            <button class="button-10" type="submit">Aceptar</button>
                        </div>
                </form>
            </div>
            <div class="col-9 oferta">                 
                <div class="paginator">
                    @foreach ($agencies as $agency)
                    
                    <div class="row propiedad">
                        <div class="col-4 flexbox-style">
                            <a href="../agency/{{$agency->id}}">
                            <img src="{{URL::asset('storage/agencies/'.$agency->logo)}}" alt="" width=150px height=100px>                            
                        </img>
                            </a>

                        </div>
                        <div class="col-4 flexbox-style">
                        <img class="icon" src="{{URL::asset('/tarjeta id.png')}}" alt="">{{$agency->nombre}}
                    </img>
                        </div>
                        <div class="col-4 flexbox-style">
                            <img class="icon" src="{{URL::asset('/iconCiudad.png')}}" alt="">{{$agency->ciudad}}</img>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $agencies->links() }}
            </div>
        </div>
    </div>
</body>
@endsection
</html>