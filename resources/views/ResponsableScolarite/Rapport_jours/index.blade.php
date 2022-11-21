@extends('layouts.responsablescolarite')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>RAPPORT JOURNALIER <i class="fa fa-edit"></i></h2>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm mt-4  ">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>OBJET</th>
                        <th><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rapport_jours as $rapport_jour)
                    <tr>
                        <td> {{$rapport_jour->created_at}} </td>
                        <td> {{$rapport_jour->name}} </td>
                        <td> <a href="/responsablescolarite/rapport-jours/{{Auth::user()->ecole->token}}/{{$rapport_jour->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
