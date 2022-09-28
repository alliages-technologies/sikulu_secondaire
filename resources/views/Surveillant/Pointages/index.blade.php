@extends('layouts.surveillant')


@section('title')
Surveillant | Pointage
@endsection

@section('content')
@if ($errors->any())
    <div
        class="alert alert-info"> {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
@endif
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                <i class="fa fa-door-open"></i> | GESTION DES POINTAGES
                <a href="" data-toggle="modal" data-target="#consulter" class="btn btn-sm btn-default float-right ml-2"> <i class="fa fa-eye"></i> </a>
                <a href="" data-toggle="modal" data-target="#panier" class="btn btn-sm btn-default float-right"> <i class="fa fa-pen"></i> </a>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="">
                    <th>PROF</th>
                    <th>CLASSE</th>
                    <th>MATIERE</th>
                    <th>NBR_HEURE</th>
                    <th>JOURS</th>
                </thead>
                <tbody>
                    @foreach ($pointages as $pointage)
                    <tr>
                        <td>{{ $pointage->prof->name }}</td>
                        <td>{{ $pointage->pel->programmeecole->salle->classe->name}} ({{ $pointage->pel->programmeecole->salle->abb}})</td>
                        <td>{{ $pointage->pel->matiere->name }}</td>
                        <td>{{ $pointage->nbr_heure }} H</td>
                        <td>{{ $pointage->jour }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $pointages->links() }}
</div>


<!-- pointages -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Effectuer un pointage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('surveillants.pointages.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <select name="prof_id" id="" class="form-control prof_id">
                                        <option value="">Choix du prof</option>
                                        @foreach ($prof_ecoles as $prof_ecole)
                                        <option value="{{$prof_ecole->prof->id}}"> {{$prof_ecole->prof->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="jour" id="jour" class="form-control jour">
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col-md-10">
                                    <select name="matiere_id" id="" class="form-control matiere_id">
                                        <option value="">Choix de la matiere</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="nbr_heure" id="nbr_heure" class="form-control nbr_heure" placeholder="H">
                                </div>
                            </div>
                            <button class="btn btn-default mt-3 btn-save-pointage">ENREGISTRER </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- pointages recherche -->
<div class="modal fade" id="consulter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLabel">Consultation des pointages <i class="fa fa-search"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container">
                    <div class="form-group">
                        <form action="{{route('surveillants.recherche')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row mt-2">
                                <div class="col-md-6">
                                    <input type="date" name="day" id="day" class="form-control day">
                                </div>
                                <div class="col-md-6">
                                    <select name="classe" id="" class="form-control classe">
                                        <option value="">Choix du prof</option>
                                        @foreach ($prof_ecoles as $prof_ecole)
                                        <option value="{{$prof_ecole->prof->id}}"> {{$prof_ecole->prof->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-default mt-3 btn-search"> <i class="fa fa-search"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.btn-save-pointage').click(function (e) {
            e.preventDefault();
        });
        $('.prof_id').change(function (e) {
            e.preventDefault();
            $('.matiere_id').html("");
            var opt = '<option value=""> Choix de la Matiere </option>';
            $('.matiere_id').append(opt);
            var prof_id = $(this).val();

            //console.log(prof_id);
            $.ajax({
                type: "get",
                url: "/surveillant/pointages/get-matiere-by-prof/"+prof_id,
                data: "",
                dataType: "json",
                success: function (matieres) {
                    var matiereData = Object.entries(matieres);
                    //console.log(matiereData);
                    matiereData.forEach(function ([$key, $value]){
                        var option = '<option class="pel" value='+$value["id"]+' data-programme_ecole_ligne_id='+$value["id"]+' value=""> '+$value["matieren"]+' / ('+$value["sallen"]+') - ('+$value["abb"]+')  </option>'
                        //console.log(option);
                        $('.matiere_id').append(option);

                    });
                }
            });
        });

        $('.matiere_id').change(function (e) {
            e.preventDefault();
            var pel = $(this).val();
            console.log(pel);
            $(".btn-save-pointage").click(function (e) {
                e.preventDefault();
                var jour = $('.jour').val();
                var nbr_heure = $('.nbr_heure').val();
                var programme_ecole_ligne_id = $('.pel').data('programme_ecole_ligne_id');
                var prof_id = $('.prof_id').val();
                if (jour && nbr_heure) {
                    $.ajax({
                        type: "post",
                        url: "/surveillant/pointages",
                        data: {
                            prof_id: prof_id,
                            jour: jour,
                            nbr_heure: nbr_heure,
                            programme_ecole_ligne_id: pel,
                            '_token': $('input[name="_token"]').val()
                        },
                        dataType: "json",
                        success: function (response) {
                            alert('Enseignant pointé avec succèss !!!!');
                            window.location.reload();
                        },
                        error: function() {
                            alert('Une erreur est survenue sur le serveur !!!!')
                        }
                    });
                } else {
                    alert("Attention !!! vous avez oublié une information !");
                }
            });

        });
    });
</script>

@endsection
