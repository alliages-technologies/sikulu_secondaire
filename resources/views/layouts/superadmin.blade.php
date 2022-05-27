<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
    <!--FONTS-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.css')}}">
    <!--JS-->
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <title>
        @yield('title')
    </title>
</head>

@include('includes.head-tl3')

<style>
    .card-header{
        background-color: darkblue;
        color: white;
    }
    .btn-default{
        background-color: darkblue;
        color: white;
    }
    .btn-default:hover{
        background-color: rgb(13, 13, 95);
        color: white;
    }
    h4{
        font-weight: lighter;
        letter-spacing: 1px;
    }
</style>
<body>
    <nav class="container-fluid">
        <div class="">
            <i class="fa fa-user-circle"></i> <a href="/home" style="color: white;">{{ Auth::user()->name }}</a> | SUPERADMIN
        </div>
    </nav>

    <div class="">
        @yield('content')
    </div>
</body>
</html>
