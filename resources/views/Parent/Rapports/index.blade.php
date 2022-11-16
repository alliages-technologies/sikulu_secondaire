@extends('layouts.parent')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>RAPPORT DE COURS <i class="fa fa-edit"></i></h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm mt-4  ">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>MATIERE</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rapport_cours as $rapport_cour)
                    <tr>
                        <td> {{$rapport_cour->created_at}} </td>
                        <td> {{ $rapport_cour->pel->matiere->name }} </td>
                        <td> <a href="/parent/rapport-ecole-show/{{$rapport_cour->ecole->token}}/{{$rapport_cour->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
