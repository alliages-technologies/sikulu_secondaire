@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ECOLES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">PARAMETRES</li>
              <li class="breadcrumb-item active">ECOLES</li>
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
                  <h3 class="card-title">LISTE DES ECOLES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>NOM</th>
                      
                      <th>TELEPHONE</th>

                      <th>EMAIL</th>
                      <th>BANQUE</th>


                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ecoles as $ecole)
                          <tr>
                              <td>{{ $ecole->name }} </td>
                              
                              <td>{{ $ecole->phone }} </td>
                              <td>{{ $ecole->email }}</td>
                              <td>{{ $ecole->banque->name }}</td>
                              

                              <td>
                                <ul style="margin-bottom: 0" class="list-inline">
                                    <li title="Afficher" class="list-inline-item"><a class="btn btn-info btn-xs" href="{{route('admin.ecoles.show',[$ecole->id])}}"><i class="fa fa-search"></i></a></li>

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