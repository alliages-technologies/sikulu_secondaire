@extends('layouts.admin')

@section('content')


    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PAIEMENTS</h4>
                    
                </div>
               <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>OPERATEUR</th>
                                <th>MOIS</th>
                                <th>MONTANT</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ecolages->reverse() as $ecolage)
                            <tr>
                                <td>{{ date_format($ecolage->created_at,'d/m/Y') }}</td>
                                <td>{{ $ecolage->user->name }}</td>
                                <td>{{ $ecolage->moi_id }}</td>
                                <td>{{ \App\Helpers\CurrencyFr::format($ecolage->montant) }}</td>
                                <td></td>

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
                    <h5 class="card-title">{{ $ecole->name }}</h5>
                </div>
                <div class="card-body">

                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-inline-item"><h5>Adresse: {{ $ecole->address }}</h5></li>
                            <li class="list-inline-item"><h6><i class="fa fa-mobile"></i> {{ $ecole->phone }}</h6></li>
                            <li class="list-inline-item"><h6><i class="fa fa-envelope"></i> {{ $ecole->email }}</h6></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



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