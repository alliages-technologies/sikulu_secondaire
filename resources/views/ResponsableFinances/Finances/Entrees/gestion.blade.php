@extends('layouts.responsablefinances')


@section('title')
Admin Ecole | Gestion des entrées
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES ENTREES
                <a href="{{route('responsablefinances.entrees.index')}}" style="float: right;" class="btn btn-sm btn-info ml-2"><i class="fa fa-arrow-left"></i> RETOUR</a>
                <button style="float: right;" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i></button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>MONTANT</th>
                        <th>#</th>
                        <th>CATEGORIE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entrees as $entree)
                    <tr>
                        <td>{{$entree->created_at->format('d/m/Y')}}</td>
                        <td>{{$entree->montant}} XAF</td>
                        <td><a href="{{route('responsablefinances.entrees.show', $entree->token)}}">{{$entree->name}}</a></td>
                        <td>{{$entree->categorie_id? $entree->categorie->name:"-"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$entrees->links()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <form action="{{route('responsablefinances.entrees.store')}}" method="post">
              @csrf
              <div class="card-header">
                  <h4>EFFECTUER UNE ENTREE</h4>
              </div>
              <div class="card-body">
                  <div class="form-row">
                      <div class="col">
                        <label for="">Nom</label>
                        <input type="text" name="name" id="" class="form-control">
                      </div>
                      <div class="col">
                        <label for="">Catégorie</label>
                        <select name="categorie_id" id="" class="form-control">
                            <option value="">SELECTION DE LA CATEGORIE</option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col">
                        <label for="">Montant</label>
                        <input type="number" name="montant" id="" class="form-control">
                      </div>
                  </div>
                  <div class="form-group mt-2">
                      <label for="">Description</label>
                      <textarea name="description" id="" cols="4" rows="4" placeholder="Description de la dépense à initier" class="form-control"></textarea>
                  </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-success">VALIDER</button>
              </div>
          </form>
      </div>
    </div>
  </div>

@endsection
