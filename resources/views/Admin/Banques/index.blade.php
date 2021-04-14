@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">BANQUES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">BANQUES</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@section('content')

    <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">LISTE DES BANQUES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>NOM</th>
                      
                      <th>TELEPHONE</th>

                      <th>EMAIL</th>


                      <th><a class="btn btn-dark btn-block btn-xs" href="#" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-circle"></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banques as $banque)
                          <tr>
                              <td>{{ $banque->name }} </td>
                              
                              <td>{{ $banque->phone }} </td>
                              <td>{{ $banque->email }}</td>
                              

                              <td>
                                <ul style="margin-bottom: 0" class="list-inline">
                                    <li title="Afficher" class="list-inline-item"><a class="btn btn-info btn-xs" href="{{route('admin.banques.show',[$banque->token])}}"><i class="fa fa-search"></i></a></li>
                                     @if($banque->active)
                                     <li title="Bloquer cette banque" class="list-inline-item"><a class="btn btn-danger btn-xs" href="/admin/banques/disable/{{ $banque->token }}"><i class="fa fa-lock"></i></a></li>
                                     @else
                                         <li title="Debloquer cette banque" class="list-inline-item"><a class="btn btn-success btn-xs" href="/admin/banques/enable/{{ $banque->token }}"><i class="fa fa-unlock"></i></a></li>
                                     @endif
                                  </ul>
                              </td>
                          </tr>
                      @endforeach

                    </tbody>

                  </table>
                </div>
                <!-- /.card-body -->
              </div>

            </div>

            <!-- /.col -->
          </div>

           <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title text-center">Nouvelle banque</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="{{route('admin.banques.store')}}" method="post">
                        {{csrf_field()}}
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <input type="text" required class="form-control" id="name" name="name" placeholder="Saisir le nom de la banque">
                                    </div>
                                </div>



                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">

                                      <input type="text" class="form-control" id="name" name="agaddress" placeholder="Saisir l'adresse">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">

                                      <input required type="text" class="form-control" id="name" name="agphone" placeholder="Telephone">
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">

                                      <input type="email" class="form-control" id="name" name="agemail" placeholder="Email pour contacter la clinque">
                                    </div>
                                </div>

                            </div>

                            <fieldset>
                                <legend>ADMINISTRATEUR</legend>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                              <input type="text" class="form-control" id="name" name="last_name" required placeholder="Nom ">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="name" name="first_name" required placeholder="Saisir le prenom">
                                            </div>
                                        </div>

                                        <div class="col-md-7 col-sm-12">
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="name" name="address" placeholder="Saisir l'adresse">
                                            </div>
                                        </div>

                                        <div class="col-md-5 col-sm-12">
                                            <div class="form-group">

                                              <input type="text" class="form-control" id="phone" name="phone" placeholder="Telephone">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">

                                              <input type="email" class="form-control" id="email" required name="email" placeholder="email">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">

                                          <input type="password" class="form-control" required id="name" name="password" placeholder="Mot de passe">
                                        </div>
                                        </div>
                                      </div>
                            </fieldset>
                          </div>
                          <!-- /.card-body -->
                          <div class="">
                            <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>


<style>
    .table th,
    .table td {
      padding: 0.35rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }
  </style>

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">


<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}} "></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable();

  });

</script>


@endsection