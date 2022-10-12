@extends('layouts.adminecole')


@section('title')
Admin Ecole | {{ $trimestre_ecole->trimestre->name }}
@endsection

@section('content')
<div class="container">
    <div class="card mt-4 menu">
        <div class="card-header">
            <h2> {{ $trimestre_ecole->trimestre->name }} </h2>
            <input type="hidden" value="{{ $trimestre_ecole->trimestre->id }}" name="trimestre_ecole" class="trimestre_id">
            @if($trimestre)
                <input type="hidden" value="{{ $trimestre->trimestre->id }}" class="trimestre_active">
            @endif
        </div>
        <div class="card-body ">
            <div class="container-fluid">
                <div class="container text-center">
                    <div class="row d-flex justify-content-center p-1">
                        <a href="/adminecole/scolarite-releve/{{ $trimestre_ecole->trimestre->id }}/{{ $trimestre_ecole->ecole->token }}/{{ $trimestre_ecole->id }}" class="col-md-3 m-2">
                            <i class="fa fa-book"></i>
                            <p>Relevés de notes</p>
                        </a>
                        @csrf
                        <a href="" data-toggle="modal" data-target="#exampleModal" class="col-md-3 m-2">
                            <i class="fa fa-power-off"></i>
                            <p>Géneration des Relevés de notes</p>
                        </a>
                        <a href="" data-toggle="modal" data-target="#exampleModalLabelDelete" class="col-md-3 m-2">
                            <i class="fa fa-trash"></i>
                            <p>Supprimer les Relevés de notes</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="font-size: 20px;text-align: center;font-family: system-ui;">
            Voulez vous vraiment génerer les releves de notes ??? Car cette action est irréversible <i style="color: #f71a1a" class="fa fa-exclamation-triangle"></i> !!!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
          <button type="button" class="btn btn-success btn-save">OUI <i class="fa fa-save"></i></button>
        </div>
      </div>
    </div>
  </div>


    <!-- Modal Delete -->
    <div class="modal fade" id="exampleModalLabelDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="font-size: 20px;text-align: center;font-family: system-ui;">
                Voulez vous vraiment supprimer les releves de notes du "{{$trimestre_ecole->trimestre->name}}" ??? Car cette action est irréversible <i style="color: #f71a1a" class="fa fa-exclamation-triangle"></i> !!!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">NON</button>
              <button type="button" class="btn btn-success btn-delete">OUI <i class="fa fa-trash"></i></button>
            </div>
          </div>
        </div>
      </div>


<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

<script>
    var composition_active = $('.trimestre_active').val();
    var composition_id = $('.trimestre_id').val();

    $(".btn-save").click(function (e) {
        if (composition_active == composition_id) {
            e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "/adminecole/scolarite/generation-auto-releve",
                data: {
                    trimestre_id: $(".trimestre_id").val(),
                    '_token': $('input[name="_token"]').val()
                },
                dataType: "json",
                success: function (response) {
                    alert("Géneration éffectuée avec succès !!!");
                    window.location.reload();
                },
                error: function () {
                    alert('Vous ne pouvez plus génerer les relevés de ce trimestre !!!!');
                }
            });
        }
        else {
            alert('Désolé vous ne pouvez pas genérer les relevés de cette composition, car elle n\'est pas active');
        }
});


$(".btn-delete").click(function (e) {
        if (composition_active == composition_id) {
            e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "/adminecole/scolarite/delete-releves",
                data: {
                    trimestre_id: $(".trimestre_id").val(),
                    '_token': $('input[name="_token"]').val()
                },
                dataType: "json",
                success: function (response) {
                    alert("Rélevés supprimés avec succès !!!");
                    window.location.reload();
                },
                error: function () {
                    alert('Vous ne pouvez pas supprimés les relevés de ce trimestre !!!!');
                }
            });
        }
        else {
            alert('Désolé vous ne pouvez pas supprimés les relevés de cette composition, car elle n\'est pas active');
        }
});
</script>

@endsection
