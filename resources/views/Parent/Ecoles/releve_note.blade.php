@extends('layouts.parent')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="text-center mt-4 mb-4" style="letter-spacing: 1px; box-shadow: 0px 0px 3px 0px #007bff;"> Relevés de Notes de {{$inscription->name}} </h4>
            <div class="container menu">
                <div class="row d-flex justify-content-center p-4">
                    @foreach ($releves as $releve)
                    <a href="/parent/inscription-releve-note-show/{{$inscription->token}}/{{$releve->id}}" class="col-md-3 m-2">
                        <i class="fa fa-file-text"></i>
                        <p> {{$releve->trimestre->name}} </p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
