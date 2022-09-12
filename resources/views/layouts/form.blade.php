<!DOCTYPE html>
<html lang="fr">
<head>
    @yield('head')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    <!--CSS-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
    <!--FONTS-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.css')}}">

</head>

@include('includes.head-tl3')

<style>
    .card-header{
        background-color: #007bff;
        color: white;
    }
    .btn-default{
        background-color: #007bff;
        color: white;
    }
    .btn-default:hover{
        background-color: #007bff;
        color: white;
    }
    h4{
        font-weight: lighter;
        letter-spacing: 1px;
    }
</style>
<body>
    <div class="">
        @yield('content')
    </div>

    <!--JS-->
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
</body>
</html>
