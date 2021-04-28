@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h4 class="text-left mb-1"> Gestion des Emploies du temps <i class="fa fa-calendar-week"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-hover table-striped">
                <thead class="">
                    <th> Classe </th>
                    <th> Cour </th>
                    <th> Tranche Horaire </th>
                </thead>
                <tbody>
                    @foreach($emploie_temps as $emploie_temp)
                    <tr>
                        <td> {{$emploie_temp->cour->classe->name}} {{$emploie_temp->cour->classe->serie->name}} </td>
                        <td> {{$emploie_temp->cour->matiere->name}} </td>
                        <td> {{$emploie_temp->tranche->name}} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $emploie_temps->links() }}
            <a href="" data-toggle="modal" data-target="#panier" class="btn btn-dark float-right">Nouveau <i class="fa fa-plus-square"></i></a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Ajouter un emploie du Temps </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action=" {{ route('admin.emploies.store')}} " method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <select name="tranche_id" id="tranche_id" class="form-control" required>
                            <option value="">Tranche Horaire</option>
                            @foreach($tranches as $tranche)
                            <option value="{{$tranche->id}}">
                                {{$tranche->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="classe_id" id="classe_id" class="form-control" required>
                            <option value="">Classe</option>
                            @foreach($classes as $classe)
                            <option value="{{$classe->id}}"> {{ $classe->name }} {{ $classe->serie->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="cour_id" id="cour_id" class="form-control" required>
                            <option value="">Cour</option>

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button class="btn btn-success">Enrégistrer <i class="fa fa-save"></i> </button>
                    </div>
                </div>
                </form>

            </div>

        </div>
    </div>
</div>
</div>

<script>
    $('#classe_id').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '/admin/emploie-temps/' + id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(Object.entries(data));
                var donnees = Object.entries(data);
                $('#cour_id').html('');
                $('#cour_id').prepend('<option>Choix du cour</option>');
                donnees.forEach(function([$k, $v]) {
                    var option = '<option value = ' + $k + '>' + $v + '</option>'
                    $('#cour_id').append(option);
                });

            }
        });
    })
</script>

@endsection
