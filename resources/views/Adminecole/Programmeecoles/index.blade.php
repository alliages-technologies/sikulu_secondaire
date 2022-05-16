@extends('layouts.adminecole')
@section('content')
<div class="card mt-5 menu">
    <div class="card-header">
        <h4 class="text-left mb-1"> Programme /> Salles </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">
                    @foreach ($salles as $salle)
                    <a href="{{ route('adminecole.menu',$salle->id) }}" class="col-md-3 m-2">
                        <i class="fa fa-door-open"></i>
                        <p>{{ $salle->name }}</p>
                    </a>
                    <input type="hidden" name="id" value="{{ $salle->id}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
