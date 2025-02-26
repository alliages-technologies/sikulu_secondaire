@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Historique {{$inscription->eleve->name}}
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2> <i class="fa fa-user-circle"></i> {{$inscription->eleve->name}} </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>MOIS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscription->ecolages as $ecolage)
                    <tr>
                        <td>{{$ecolage->created_at->format('d/m/Y')}}</td>
                        <td>{{$ecolage->montant}} XAF</td>
                        <td>{{$ecolage->month}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
