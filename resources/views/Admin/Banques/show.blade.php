@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ECOLES</h4>
                    <ul style="float: right" class="list-inline">
                        <li class="list-inline-item">
                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg" href="">Ajouter une ecole</a>
                        </li>
                    </ul>
                </div>
               <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NOM</th>
                                <th>TELEPHONE</th>
                                <th>POURCENTAGE</th>
                                <th>PARTENARIATS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banque->ecoles as $ecole)
                            <tr>
                                <td>{{ $ecole->name }}</td>
                                <td>{{ $ecole->phone }}</td>
                                <td>{{ $ecole->pourcentage }}%</td>
                                <td>
                                    <ul class="list-inline">
                                        @foreach($ecole->partenariats as $p)
                                            <li class="list-inline-item">
                                                <span class="badge badge-dark">{{ $p->partenaire->name }} - {{ $p->pourcentage }}%</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="#" data-target="#modal-partenaire" data-toggle="modal" data-id="{{ $ecole->id }}" class="btn btn-ecole btn-xs btn-primary">definir partenariat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
            </div>

        </div>

        <div class="col-md-4 col-sm-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h5 class="card-title">{{ $banque->name }}</h5>
                </div>
                <div class="card-body">

                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-inline-item"><h5>Adresse: {{ $banque->address }}</h5></li>
                            <li class="list-inline-item"><h6><i class="fa fa-mobile"></i> {{ $banque->phone }}</h6></li>
                            <li class="list-inline-item"><h6><i class="fa fa-envelope"></i> {{ $banque->email }}</h6></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


      <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Nouvelle ecole</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="/admin/banque/ecole/add" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="banque_id" value="{{ $banque->id }}"/>
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">NOM</label>
                              <input type="text" class="form-control" id="name" name="name" required placeholder="Saisir le nom ">
                            </div>

                            <div class="form-group">
                              <label for="name">TELEPHONE</label>
                              <input type="text" class="form-control" id="name" name="phone" required placeholder="Telephone">
                            </div>

                            <div class="form-group">
                              <label for="name">ADRESSE</label>
                              <input type="text" class="form-control" id="name" name="address" required placeholder="Adresse">
                            </div>

                            <div class="form-group">
                              <label for="name">ID NASCHOOL</label>
                              <input type="text" class="form-control" id="name" name="remote_id" required placeholder="ID DANS LA BD DE NASCHOOL">
                            </div>

                            <div class="form-group">
                              <label for="name">POURCENTAGE</label>
                              <input type="text" class="form-control" id="name" name="pourcentage" required placeholder="Pourcentage de la banque dans">
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>



      <div class="modal fade" id="modal-partenaire">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Nouveau partenariat</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" role="form" action="/admin/ecole/partenaire/add" method="post">
                        {{csrf_field()}}
                        <input type="hidden"  id="ecole_id" name="ecole_id"/>
                          <div class="card-body">
                            <div class="form-group">
                              <label for="name">NOM</label>
                              <select required class="form-control" name="partenaire_id" id="name">
                                <option value="">SELECTIONNER</option>
                                @foreach($partenaires as $part)
                                    <option value="{{ $part->id }}">{{ $part->name }}</option>
                                @endforeach

                              </select>
                            </div>


                            <div class="form-group">
                              <label for="name">POURCENTAGE</label>
                              <input type="text" class="form-control" id="name" name="pourcentage" required placeholder="Pourcentage de la banque dans">
                            </div>

                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-w fa-save"></i> Enregistrer</button>
                          </div>
                        </form>
                      </div>

                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
           </div>

    <script>
        $('.btn-ecole').click(function(e){
            e.preventDefault();
            $('#ecole_id').val($(this).data('id'));
        });
    </script>

    <style>
        #table-lots th {
            padding: .50rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            font-size: 13px;
        }
    </style>

    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">


    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}} "></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script>
      $(function () {
        $(".table").DataTable();

      });
    </script>
@endsection