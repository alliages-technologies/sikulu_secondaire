@extends('layouts.parent')


@section('content')
@csrf

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header">
            <h4> <strong> MODIFICATION </strong> DES NOTES DE <strong> {{ $inscription->name }} </strong> </h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm  table-notes">
                <thead>
                    <tr>
                        <th>MATIERES</th>
                        <th>NOTES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->pel->matiere->name }}</td>
                        <td>{{ $note->valeur}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
