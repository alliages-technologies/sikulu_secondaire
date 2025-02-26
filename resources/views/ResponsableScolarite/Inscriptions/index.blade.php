@extends('layouts.responsablescolarite')


@section('title')
Responsable Scolarité | Inscriptions
@endsection

@section('content')
{{-- <a href="/responsablescolarite/inscription-auto" class="btn btn-success"></a> --}}
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES INSCRIPTIONS
                <a href="{{ route('responsablescolarite.inscriptions.create') }}" class="btn btn-sm btn-default float-right"><i class="fa fa-user-plus"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm mb-3 display" id="tab">
                <thead class="">
                    <th> STATUT </th>
                    <th> DATE </th>
                    <th> CLASSE </th>
                    <th> NOM(S) & PRENOM(S) </th>
                    <th> <i class="fa fa-gear"></i> </th>
                </thead>
                <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        @if ($inscription->reinscription_id == 1)
                            <td><span class="badge badge-primary">Réinscription</span></td>
                        @else
                            <td><span class="badge badge-success">Inscription</span></td>
                        @endif
                        <td> {{$inscription->created_at->format('d/n/Y')}} </td>
                        <td> {{$inscription->classe_id? $inscription->classe->name:"_"}} </td>
                        <td> {{$inscription->eleve_id? $inscription->eleve->nom:"_"}} {{$inscription->eleve_id?$inscription->eleve->prenom:""}} </td>
                        <td> <a href="{{ route('responsablescolarite.inscriptions.show', $inscription->token) }}" class="btn btn-primary btn-sm float-right"> <i class="fa fa-eye"></i> </a> <a class="btn btn-warning btn-sm float-right mr-2" href="{{ route('responsablescolarite.inscriptions.edit', $inscription->id) }}"> <i class="fa fa-edit"></i> </a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- {{ $inscriptions->links() }} --}}
        </div>
    </div>
</div>


<script type="text/javascript" id="lang" src="{{ asset('DataTables/media/French.json') }}"></script>
<script type="text/javascript" src="{{ asset('DataTables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>

<script>
$(document).ready(function () {
    $('#tab').DataTable();
});

$('#tab').DataTable({
    language: {
        url: $("#lang").attr("src")
    }
});
</script>

@endsection
