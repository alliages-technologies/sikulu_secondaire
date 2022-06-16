@extends('layouts.responsablefinances')


@section('title')
Responsable Finances | Depenses
@endsection

@section('content')

<div class="container col-md-6 mt-4">
    <div class="card">
        <div class="card-header">
            <h2>
                <a href="{{route('responsablefinances.depenses.gestion')}}" class="btn btn-info"><i class="fa fa-th"></i> GESTION DES DEPENSES</a>
                <a href="/home" style="float: right;" class="btn btn-sm btn-default ml-2"> RETOUR</a>
                <button style="float: right;" class="btn btn-sm btn-default" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fa fa-plus-circle"></i> </button>
            </h2>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <th>CATEGORIES DES DEPENSES</th>
                </thead>
                <tbody>
                    @foreach ($categories_depenses as $categorie)
                    <tr>
                        <td>{{$categorie->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories_depenses->links()}}
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form action="{{route('responsablefinances.depenses.categorie.store')}}" method="post">
            @csrf
            <div class="card-header">
                <h4>CONFIGURATION DE LA CATEGORIE</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nom de la catégorie</label>
                    <input type="text" name="name" id="" class="form-control" required>
                    <input type="hidden" name="ecole_id" id="" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success">ENREGISTRER</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection
