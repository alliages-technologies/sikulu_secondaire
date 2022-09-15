@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Historique global ecolage
@endsection

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2> HISTORIQUE GLOBAL DES PAIEMENTS DES FRAIS D'ECOLAGE </h2>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="col">
                    <select name="salle_id" id="salle_id" class="form-control" required>
                        <option>SELECTIONNEZ LA SALLE DE CLASSE</option>
                        @foreach ($salles as $salle)
                        <option value="{{$salle->id}}">{{$salle->name}} ({{$salle->classe->name}}) </option>
                        @endforeach
                    </select>
                </div>
                <div id="selectionEleve" class="col">
                    <select name="inscriptions" id="inscriptions" class="form-control">
                        <!-- options -->
                    </select>
                </div>
                <div class="col">
                    <select name="month" id="month" class="form-control">
                        <option>SELECTINNEZ LE MOIS</option>
                        @foreach ($mois as $month)
                        <option value="{{$month->id}}">{{$month->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="resultats" class="mt-4">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>MOIS</th>
                        <th id="eleveSelected">ELEVE</th>
                    </thead>
                    <tbody id="historiquePaiements">
                        <!---->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- SCRIPT -->
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>

$("#selectionEleve").hide();
$("#resultats").hide();
$("#eleveSelected").hide();
$("#salle_id").change(function (e) {
    e.preventDefault();
    var salleId = $(this).val();
    $.ajax({
        type: "get",
        url:' /responsablefinances/ecolages-historique-find-salle/'+salleId+' ',
        data: { salleId:salleId },
        dataType: "json",
        success: function (inscriptions) {
            var inscriptionsSalle = Object.entries(inscriptions);
            $('#selectionEleve').show();
            $("#eleveSelected").hide();
            $("#resultats").hide();
            $('#inscriptions').html("");
            $('#inscriptions').prepend("<option>SELECTONNEZ L'ELEVE CONCERNE</option>");
            inscriptionsSalle.forEach(function([$key ,$value]){
                var option = '<option value='+$value["id"]+'> '+$value["name"]+' </option>';
                $('#inscriptions').append(option);
                $("#inscriptions").change(function (e) {
                    e.preventDefault();
                    var inscriptionId = $(this).val();
                    $.ajax({
                        type: "get",
                        url: ' /responsablefinances/ecolages-historique-eleve/'+inscriptionId+' ',
                        data: { inscriptionId },
                        dataType: "json",
                        success: function (ecolages) {
                            var ecolagesHistorique = Object.entries(ecolages);
                            $("#resultats").show();
                            $("#eleveSelected").hide();
                            $("#historiquePaiements").html("");
                            ecolagesHistorique.forEach(function ([$key, $value]){
                                var tr = '<tr> <td>'+$value["jour"]+'</td> <td>'+$value["montant"]+' XAF</td> <td>'+$value["month"]+'</td> </tr>';
                                $('#historiquePaiements').append(tr);
                            });
                        }
                    });
                });
            });
        }
    });
});

//ajouter la colonne ecole_id dans la table ecolages
$('#month').change(function (e) {
    e.preventDefault();
    var monthId = $(this).val();
    $.ajax({
        type: "get",
        url: ' /responsablefinances/ecolages-historique-find-month/'+monthId+' ',
        data: { monthId },
        dataType: "json",
        success: function (ecolages) {
            var ecolagesData = Object.entries(ecolages);
            $("#resultats").show();
            $('#selectionEleve').hide();
            $("#eleveSelected").show();
            $("#historiquePaiements").html("");
            ecolagesData.forEach(function ([$key, $value]){
                var tr = '<tr> <td>'+$value["jour"]+'</td> <td>'+$value["montant"]+' XAF</td> <td>'+$value["month"]+'</td> <td>'+$value["eleve"]+'</td> </tr>';
                $('#historiquePaiements').append(tr);
            });
        }
    });
});
</script>
@endsection
