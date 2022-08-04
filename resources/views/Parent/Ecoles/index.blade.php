@extends('layouts.parent')
@section('content')

<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Liste de mes enfants <i class="fa fa-users"></i> </h4>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th> Nom(s) & Prénom(s) </th>
                    <th> Classe </th>
                    <th> Action (s) </th>
                </thead>
                <tbody>
                @foreach($eleves as $eleve)
                    <tr>
                        <td> {{$eleve->name}} </td>
                        <td> {{$eleve->id}} </td>
                        <td> <a href="" class="btn btn-default btn-sm"> <i class="fa fa-eye"></i> </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
