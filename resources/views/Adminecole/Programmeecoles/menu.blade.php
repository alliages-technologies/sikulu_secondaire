@extends('layouts.adminecole')
@section('content')
<div class="card mt-5 menu">
    <div class="card-header">
        <h4 class="text-left mb-1"> Programme /> {{ $salle->name }} </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <div class="container text-center">
                <div class="row d-flex justify-content-center p-1">

                    <a href="{{ route('adminecole.programmes-ecole.show',$salle->id) }}" class="col-md-3 m-2">
                        <i class="fa fa-folder"></i>
                        <p>Programme</p>
                    </a>
                    <a href="{{ route('adminecole.index',$salle->id) }}" class="col-md-3 m-2">
                        <i class="fa fa-edit"></i>
                        <p>Emploi du temps</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
