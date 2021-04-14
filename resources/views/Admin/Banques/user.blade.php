@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">PRESTATIONS</h4>
                </div>
                <div class="card-body">
                   <table id="example1" class="table table-bordered table-hover table-condensed">
                    <thead>
                    <tr>
                      <th>DESIGNATION</th>
                      <th>DATE DE CREATION</th>

                      <th>CARTE</th>
                      <th>PORTEUR DE CARTE</th>
                      <th>BENEFICIAIRE</th>
                      <th>SERVICE</th>
                      <th>COUT</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->debits as $debit)
                          <tr>
                             <td>{{ $debit->name }}</td>
                             <td>{{ date_format($lot->created,'d/m/Y') }}</td>
                             <td>{{ $debit->carte->name }}</td>
                             <td>{{ $debit->membre?$debit->membre->name:$debit->carte->owner->name }}</td>
                             <td>{{ $debit->service->name }}</td>
                             <td>{{ number_format($debit->cout,0,',','.') }}</td>

                          </tr>
                      @endforeach

                    </tbody>

                  </table>
                </div>
            </div>

        </div>

        <div class="col-md-4 col-sm-12">

            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">{{ $user->name }}</h5>
                </div>
                <div class="card-body">
                    <div style="width: 90%; height: 320px; background-size: cover; background: url('{{ asset('img/'.$user->imageUri) }}')">

                    </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-inline-item"><h5>Adresse: {{ $user->address }}</h5></li>
                            <li class="list-inline-item"><h6><i class="fa fa-mobile"></i> {{ $user->phone }}</h6></li>
                            <li class="list-inline-item"><h6><i class="fa fa-envelope"></i> {{ $user->email }}</h6></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="card card-success">
                <div class="card-header">
                    <h5 class="card-title">{{ $user->centre->name }}</h5>
                </div>
                <div class="card-body">
                    <div style="width: 90%; height: 320px; background-size: cover; background: url('{{ asset('img/'.$user->centre->imageUri) }}')">

                    </div>
                    <div style="padding: 10px;">
                        <ul class="list-group">
                            <li class="list-inline-item"><h5>Adresse: {{ $user->centre->address }}</h5></li>
                            <li class="list-inline-item"><h6><i class="fa fa-mobile"></i> {{ $user->centre->phone }}</h6></li>
                            <li class="list-inline-item"><h6><i class="fa fa-envelope"></i> {{ $user->centre->email }}</h6></li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection