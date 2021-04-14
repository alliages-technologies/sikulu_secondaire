@extends('layouts.admin')

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">FACTURES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">ACCUEIL</a></li>
              <li class="breadcrumb-item">FINANCES</li>
              <li class="breadcrumb-item active">FACTURES</li>
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
                  <form class="form-inline" action="/admin/finances/factures" method="get">
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

                      <div style="padding: 0 10px" class="form-group">
                        <label for="centre_id">PARTENAIRE</label>
                        <select name="prestataire_id" class="form-control" id="centre_id">
                            <option value="">TOUS</option>
                            @foreach($partenaires as $pretataire)
                               <option value="{{ $pretataire->id }}">{{ $pretataire->name }}</option>
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

                                        <th>#</th>
                                        <th>BANQUE</th>
                                        <th>ECOLE</th>
                                        <th>PARTENAIRE</th>
                                        <th>MOIS</th>

                                        <th>MONTANT</th>
                                        <th></th>

                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php $total = 0; $net = 0 ?>
                                      @foreach($factures as $facture)
                                            <tr>
                                                <?php $total = $total + $facture->montant; ?>
                                                <td>{{ $facture->name }}</td>
                                               <td>{{ $facture->banque?$facture->banque->name:'-' }}</td>
                                               <td>{{ $facture->ecole?$facture->ecole->name:'-' }}</td>
                                               <td>{{ $facture->partenaire?$facture->partenaire->name:'-' }}</td>
                                               <td>{{ $facture->mois?$facture->mois->name . '/'.$facture->annee:'-'  }}</td>
                                                <th>{{ number_format($facture->montant,0,',','.') }}</th>
                                               <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a title="Afficher" class="btn btn-xs btn-info" href="/admin/finances/facture/{{ $facture->token }}"><i class="fa fa-eye"></i></a>
                                                        </li>

                                                    </ul>
                                               </td>

                                            </tr>
                                        @endforeach
                                            <tr>
                                                <th colspan="5">TOTAL</th>
                                                <th>{{ number_format($total,0,',','.') }}</th>
                                                <th></th>

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