@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">PAIEMENTS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">FINANCES</li>
              <li class="breadcrumb-item active">ECOLAGES</li>
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
                  <form class="form-inline" action="/admin/finances/ecolages" method="get">
                      <div style="padding: 0 10px" class="form-group">
                        <label for="moi_id">MOIS</label>
                        <select name="moi_id" class="form-control" id="moi_id">
                            <option value="">TOUTE L'ANNEE</option>
                            @foreach($mois as $m)
                               <option value="{{ $m->id }}">{{ $m->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div style="padding: 0 10px" class="form-group">
                        <label for="annee">ANNEE</label>

                        <select name="annee" class="form-control" id="annee">
                             <option value="">TOUTES</option>
                            @for($i= 0; $i<=2;$i++ )
                               <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                            @endfor
                        </select>
                      </div>
                      <div style="padding: 0 10px" class="form-group">
                        <label for="centre_id">BANQUE</label>
                        <select name="banque_id" class="form-control" id="centre_id">
                            <option value="">TOUTES</option>
                            @foreach($banques as $banque)
                               <option value="{{ $banque->id }}">{{ $banque->name }}</option>
                            @endforeach
                        </select>
                      </div>

                      <div style="padding: 0 10px" class="form-group">
                        <label for="centre_id">ECOLE</label>
                        <select name="ecole_id" class="form-control" id="centre_id">
                            <option value="">TOUTES</option>
                            @foreach($ecoles as $ecole)
                               <option value="{{ $ecole->id }}">{{ $ecole->name }}</option>
                            @endforeach
                        </select>
                      </div>



                      <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>

                  </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table-lots" class="table table-bordered table-hover table-condensed">
                                      <thead>
                                      <tr>
                                        <th>DATE</th>
                                        <th>MATRICULE</th>
                                        <th>ECOLE</th>
                                        <th>BANQUE</th>
                                        <th>MOIS</th>

                                        <th>MONTANT</th>
                                       
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $total = 0; $net = 0 ?>
                                      @foreach($ecolages->reverse() as $ecolage)
                                            <tr>
                                                <?php $total = $total + $ecolage->montant; ?>
                                                <th>{{ date_format($ecolage->created_at,'d/m/Y H:i:s') }}</th>
                                                <td>{{ $ecolage->matricule }}</td>
                                                <td>{{ $ecolage->ecole?$ecolage->ecole->name:'-' }}</td>
                                               <td>{{ $ecolage->banque?$ecolage->banque->name:'-' }}</td>


                                               <td>{{ $ecolage->mois?$ecolage->mois->name . '/'.$ecolage->annee:'-'  }}</td>
                                                <th>{{ number_format($ecolage->montant,0,',','.') }}</th>
                                               
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th colspan="5">TOTAL</th>
                                                <th>{{ number_format($total,0,',','.') }}</th>

                                            </tr>

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