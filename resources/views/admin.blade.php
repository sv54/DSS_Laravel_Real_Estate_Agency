@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

@section('content')
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="{{URL::asset('/Logo2.png')}}" alt="" width=50% height="100%">  
            </div>
            <div class="col-8 bienvenida">
                <p>Bienvenido a la pagina de Admin, desde aqui puede gestionar las tablas de propiedades, usuarios, fotos, trabajando directamente con la base de datos.</p>
            </div>
        </div>
        <br>
        <div class="row enlaces">
            <div class="col hrefs">
                <a href="users"><h3 class="texto link">Usuarios</h3></a><br>
            </div>
            <div class="col hrefs">
                <a href="properties"><h3 class="texto link">Propiedades</h3></a><br>
            </div>
            <div class="col hrefs">
                <a href="operations"><h3 class="texto link">Operaciones</h3></a><br>
            </div>
            <div class="col hrefs">
                <a href="agencies"><h3 class="texto link">Agencias</h3></a><br>
            </div>
            <div class="col hrefs">
                <a href="{{route('photos.showAll')}}"><h3 class="texto link" >Fotos</h3></a>      
            </div>

            
        </div>
    </div>
</div>
</body>
@endsection
</html> 