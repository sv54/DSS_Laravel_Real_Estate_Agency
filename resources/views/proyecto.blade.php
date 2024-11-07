@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/proyecto.css')}}">

</head>
@section('content')

<body>
    <div class="container-fluid">
        <div class="row">
            <div class='col-1'></div>
            <div class="col-5 texto" id="">
                <h3>Sobre nuestro proyecto</h3>
                <p>Gracias a nuestra pagina, <u>miles de personas</u> por toda España pueden encontrar
                    un hogar con el que siempre han soñado. A partir de ahora no hace falta que vaya agencia por
                    agencia,
                    pagina por pagina, todo esta agrupado en <u>un solo sitio web</u>, y además disponen de las ofertas
                    que más se
                    ajustan a sus necesidades!
                    <br>Bienvenidos y nuestro equipo espera haber ayudado en la busqueda de vivienda!
                </p>
            </div>
            <div class="col-1"></div>
            <div class="col-4 texto" id="">
                <h3>Fundadores del proyecto</h3>
                <br>
                <div class="row">
                    <div class="col-6 centrar">
                        <img src="{{URL::asset('/indice.png')}}" alt="profile Pic" width=50%>
                        <p>Lucas Ochoa Pérez-Enciso</p>
                    </div>
                    <div class="col-6 centrar">
                        <img src="{{URL::asset('/indice.png')}}" alt="profile Pic" width=50%>
                        <p>Izan Ayllón Palazón</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 centrar">
                        <img src="{{URL::asset('/indice.png')}}" alt="profile Pic" width=50%>
                        <p>Nikita Polyanskiy</p>
                    </div>
                    <div class="col-6 centrar">
                        <img src="{{URL::asset('/indice.png')}}" alt="profile Pic" width=50%>
                        <p>Serhii Vidernikov</p>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>

        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <p>
                <h3>Como contactar con nosotros?</h3>
                <h5>Es representante de una agencia y esta interesado en trabajar con nosotros?</h5>
                Email: inmoDSS@gmail.com<br>
                Telefono: 642 321 123<br>
                <br>
                <h4>Quiere reportar un error de la pagina?</h4>
                Email: inmoDSSerror@gmail.com
                </p>
            </div>
        </div>
    </div>
</body>
@endsection
</html>