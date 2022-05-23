@extends('layouts.adminecole')
@section('content')
<div class="card mt-5">
    <div class="card-header" style="background-color: darkblue; color:white">
        <h4 class="text-left mb-1"> Gestion des Trimestres <i class="fa fa-book"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-sm table-hover">
                <thead class="">
                    <th> Désignation </th>
                    <th> Abreviation </th>
                    <th> Etats </th>
                </thead>
                <tbody>
                @foreach($trimestre_ecoles as $trimestre)
                    <tr>
                        <td> {{$trimestre->trimestre->name}} </td>
                        <td> {{$trimestre->trimestre->abb}} </td>
                        @if ($trimestre->active==1)
                        <td> <a href="{{ route('adminecole.trimestre.off',$trimestre->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-eye-slash"></i></a> </td>
                        @else
                        <td> <a href="{{ route('adminecole.trimestre.on',$trimestre->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a> </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
