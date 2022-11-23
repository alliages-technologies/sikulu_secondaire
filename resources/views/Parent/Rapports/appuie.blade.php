@extends('layouts.parent')
@section('content')
<div class="container ges-ac mt-5">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | APPUIES DE COURS
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <tr>
                        <th>DESIGNATION</th>
                        <th>MATIERE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appuie_cours as $appuie_cour)
                    <tr>
                        <td> {{$appuie_cour->objet}} </td>
                        <td> {{$appuie_cour->pel->matieren}} </td>
                        <td> <a href="/parent/appuie-cours-ecole/{{$appuie_cour->ecole->token}}/{{$appuie_cour->id}}" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> </a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
