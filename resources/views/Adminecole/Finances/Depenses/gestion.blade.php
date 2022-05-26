@extends('layouts.adminecole')


@section('title')
Admin Ecole | Gestion des dépenses
@endsection

@section('content')

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                GESTION DES DEPENSES
                <a href="{{route('adminecole.depenses.index')}}" style="float: right;" class="btn btn-sm btn-info ml-2"><i class="fa fa-arrow-left"></i> RETOUR</a>
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
                    @foreach ($depenses as $depense)
                    <tr>
                        <td>{{$depense->created_at->format('d/m/Y')}}</td>
                        <td>{{$depense->montant}} XAF</td>
                        <td><a href="{{route('adminecole.depenses.show', $depense->token)}}">{{$depense->name}}</a></td>
                        <td>{{$depense->categorie_id? $depense->categorie->name:"-"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$depenses->links()}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <form action="{{route('adminecole.depenses.store')}}" method="post">
              @csrf
              <div class="card-header">
                  <h4>INITIER UNE DEPENSE</h4>
              </div>
              <div class="card-body">
                  <div class="form-row">
                      <div class="col">
                        <label for="">Nom</label>
                        <input type="text" name="name" id="" class="form-control" required>
                      </div>
                      <div class="col">
                        <label for="">Catégorie</label>
                        <select name="categorie_id" id="" class="form-control" required>
                            <option value="">SELECTION DE LA CATEGORIE</option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col">
                        <label for="">Montant</label>
                        <input type="number" name="montant" id="" class="form-control" required>
                      </div>
                  </div>
                  <div class="form-group mt-2">
                      <label for="">Description</label>
                      <textarea name="description" id="" cols="4" rows="4" placeholder="Description de la dépense à initier" class="form-control" required></textarea>
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
