@extends('......layouts.admin')

@section('page-title')
{{ $facture->name }}
@endsection

@section('content')

    <div style="padding-top: 30px" class="container">
        <div class="">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>

                    <small class="float-right">Date: {{ date_format($facture->created_at,'d/m/Y') }}</small>
                  </h4>
                  <ul id="float-menu" style="position: fixed;" class="list-inline">
                    @if(!$facture->filled)
                       <li class="list-inline-item">
                            <a  title="Payer Cette Facture" class="ripple" href="/admin/finances/facture/fill/{{ $facture->token }}"><i class="fa fa-coins fa-lg text-warning"></i></a>
                       </li>
                    @endif
                  </ul>
                  
                </div>
                <!-- /.col -->
              </div>
              <hr/>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  BANQUE: <strong>{{ $facture->banque->name }} </strong><br>
                  <address>

                    {{ $facture->banque->address }}<br>

                    Téléphone: {{ $facture->banque->phone }}<br>
                    Email: {{ $facture->banque->email }}<br/>

                  </address>
                </div>
                <!-- /.col -->

                <div class="col-sm-4 invoice-col">
                  PARTENAIRE: <strong>{{ $facture->partenaire->name }} </strong><br>
                  <address>

                    {{ $facture->partenaire->address }}<br>

                    Téléphone: {{ $facture->partenaire->phone }}<br>
                    Email: {{ $facture->partenaire->email }}<br/>

                  </address>
                </div>
                <!-- /.col -->

                <div class="col-sm-4 invoice-col">
                  ECOLE: <strong>{{ $facture->ecole->name }} </strong><br>
                  <address>

                    {{ $facture->ecole->address }}<br>

                    Téléphone: {{ $facture->ecole->phone }}<br>
                    Email: {{ $facture->ecole->email }}<br/>

                  </address>
                </div>
                <!-- /.col -->

                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>TOTAL : {{ number_format($facture->montant, 0,',','.') }} </b><br>
                <br>
                </div>

                <div class="col-sm-4 invoice-col">
                  <b>{{ number_format($facture->total_items, 0,',','.') }} PAIEMENT(S) </b><br>
                <br>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <hr/>
              <div class="row">
                <div class="table-responsive col-md-12 col-sm-12">

                </div>
              </div>



            <!-- /.invoice -->

        </div>
    </div>
    </div>
@endsection


