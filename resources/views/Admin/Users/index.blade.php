@extends('layouts.admin');
@section('content')
<div class="container-fluid mt-5 ml-2">
    <div class="row">
        <div class="col-md-4">
            <h6 for=""> Information Personelle </h6>
            <canvas class="canvas">
                
            </canvas>
        </div>
        <div class="col-md-6">
            <h6>  </h6>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Nouveau <i class="fa fa-person-booth"></i> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="flex-container">
            <div class="form-group">
        <form action="/" method="post">
        @csrf
            <div class="row">

            </div>
            <div class="row">

            </div>
            </div>

        </div>

                <div class="row">
                    <div class="">
                        <button class="btn btn-success ml-2">Enrégistrer</button>
                    </div>
                </div>
        </form>

      </div>

    </div>
  </div>
</div>
</div>

@endsection
