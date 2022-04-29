@extends('layouts.admin');
@section('content')
<div class="card mt-5">
    <div class="card-header" style="background-color: darkblue; color:white">
        <h4 class="text-left mb-1"> Gestion des Ecolages <i class="fa fa-calendar-week"></i> </h4>
    </div>
    <div class="card-body ">
        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead class="">
                    <th> Eleve <i class="fa fa-user"></i> </th>
                    <th> Moi <i class="fa fa-calendar"></i> </th>
                    <th> Montant <i class="fa fa-money"></i> </th>
                    <th>Option <i class="fa fa-cog"></i> </th>
                </thead>
                <tbody>
                    @foreach($ecolages as $ecolage)
                    <tr>
                        <td> {{$ecolage->inscription_id?$ecolage->inscription->eleve->nom:""}} {{$ecolage->inscription->classe_id?$ecolage->inscription->classe->name:""}} {{$ecolage->inscription->classe->serie->name}} </td>
                        <td> {{$ecolage->moi_id?$ecolage->moi->name:""}} </td>
                        <td> {{number_format($ecolage->montant)}} XAF </td>
                        <td> <a href="{{ route('admin.ecolages.show', $ecolage->id) }}" class="btn btn-default btn-sm">Détails <i class="fa fa-info"></i> </a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ecolages->links() }}
            <a style="background-color: darkblue; color:white" href="" data-toggle="modal" data-target="#panier" class="btn btn-default float-right">Effectuez un Paiement <i class="fa fa-money"></i> </a>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Paiement des Frais Scolaire <i class="fa fa-money"></i> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{ route('admin.ecolages.store')}} " method="post" class="mb-4">
                            @csrf
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <select name="classe_id" id="classe_id" class="form-control" required>
                            <option value="">Classe</option>
                            @foreach($classes as $classe)
                            <option value="{{$classe->id}}">
                                {{ $classe->name }} {{ $classe->serie->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="inscription_id" id="inscription_id" class="form-control" required>
                            <option value="">Eleve</option>

                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <select name="moi_id" id="" class="form-control" required>
                            <option value="">Mois</option>
                            @foreach($mois as $moi)
                            <option value="{{$moi->id}}"> {{ $moi->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="montant" placeholder="Entrer le montant..." required>
                    </div>
                    <div class="col-md-4">
                        <button style="background-color: darkblue; color:white" class="btn btn-default">Enrégistrer <i class="fa fa-save"></i> </button>
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
            url: '/utils/inscriptions/' + id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(Object.entries(data));
                var donnees = Object.entries(data);
                $('#inscription_id').html('');
                $('#inscription_id').prepend('<option>Selectionner un élève</option>');
                donnees.forEach(function([$k, $v]) {
                    //console.log('Inscription id :'+$k);
                    //console.log('eleve :' + $v);
                    var option = '<option value = ' + $k + '>' + $v + '</option>'
                    $('#inscription_id').append(option);
                });

            }
        });
    })
</script>

@endsection
