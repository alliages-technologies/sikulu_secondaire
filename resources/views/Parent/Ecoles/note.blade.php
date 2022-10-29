@extends('layouts.parent')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="text-center mt-4 mb-4" style="letter-spacing: 1px; box-shadow: 0px 0px 3px 0px #007bff;"> Notes de {{$inscription->name}} </h4>
            <div class="container menu">
                <div class="row d-flex justify-content-center p-4">
                    @foreach ($trimestre_ecoles as $trimestre_ecole)
                    <a href="/parent/inscription-note-show/{{$inscription->token}}/{{$trimestre_ecole->trimestre->id}}" class="col-md-3 m-2">
                        <i class="fa fa-file-text"></i>
                        <p> {{$trimestre_ecole->trimestre->name}} </p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
