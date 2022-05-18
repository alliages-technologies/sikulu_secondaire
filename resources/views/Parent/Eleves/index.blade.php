@extends('layouts.parent')
@section('content')
<h4 class="text-center mt-4" style="letter-spacing: 1px">Bienvenue Mr   (Mme) {{ Auth::user()->name }} à l'école {{ $ecole->name }}</h4>
<div class="container menu">

</div>
@endsection
