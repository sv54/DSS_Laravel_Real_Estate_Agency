@extends('layouts.app')

<!DOCTYPE html>
<html><link rel="stylesheet" href="{{asset('css/all.css')}}">


<head>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">

</head>
@section('content')

<body>
    {{ $photo->nombre }}
    {{ $photo }}
</body>
@endsection
</html>