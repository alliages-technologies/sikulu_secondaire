<!DOCTYPE html>
<html lang="fr">
<head>
    @yield('head')
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

    <!--Colorlib-->
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{asset('colorlib-wizard-30/css/montserrat-font.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('colorlib-wizard-30/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('colorlib-wizard-30/css/style.css')}}"/>
    <!--Js-->
    <script src="{{asset('colorlib-wizard-30/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('colorlib-wizard-30/js/jquery.steps.js')}}"></script>
	<script src="{{asset('colorlib-wizard-30/js/main.js')}}"></script>
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
</style>
<body>
    <nav class="container-fluid">
        <div class="">
            <i class="fa fa-user-circle"></i> {{ Auth::user()->name }} | Professeur
        </div>
    </nav>

    <div class="">
        @yield('content')
    </div>
</body>
</html>
