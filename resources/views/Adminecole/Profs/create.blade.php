@extends('layouts.adminecole')

@section('title')
Admin Ecole | Configuration Professeur
@endsection

@section('content')
<div class="container mt-4">
	<h2 class="mb-4 text-center">CONFIGURATION PROFESSEUR</h2>
	<form action="" method="post">
		@csrf
		<div class="card etape1">
			<div class="card-header">
				<h4>ETAPE 1</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="left col-md-6">
						<div class="form-group">
							<label for="">Numéro de téléphone</label>
							<input type="number" id="" name="phone" placeholder="242 xx xxx xx xx" class="form-control col-md-10 phone" required>
						</div>
						<div class="form-group">
							<button class="btn btn-sm btn-info verifier1">VERIFIER</button>
							<button class="btn btn-sm btn-primary suivant1">SUIVANT</button>
							<button class="btn btn-sm btn-success terminer1">TERMINER</button>
						</div>
					</div>
					<div class="right col-md-6 d-flex justify-content-center">
						<p class="p1">
							
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="card etape2">
			<div class="card-header">
				<h4>ETAPE 2</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="left col-md-7">
						<div class="form-row">
							<div class="col">
								<label for="">Nom</label>
								<input type="text" id="" name="nom" class="form-control col-md nom" required>
							</div>
							<div class="col">
								<label for="">Prénom</label>
								<input type="text" id="" name="prenom" class="form-control col-md prenom" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<label for="">Adrese</label>
								<input type="text" id="" name="adresse" class="form-control col-md adresse" required>
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<label for="">Dernier Diplome</label>
								<select name="diplome_id" id="" class="form-control col-md diplome_id" required>
									<option value="">Selectionnez le diplome</option>
									@foreach ($diplomes as $diplome)
									<option value="{{$diplome->id}}">{{$diplome->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group mt-4">
							<button class="btn btn-sm btn-info verifier2">VERIFIER</button>
							<button class="btn btn-sm btn-primary suivant2">SUIVANT</button>
							<button class="btn btn-sm btn-success terminer2">TERMINER</button>
						</div>
					</div>
					<div class="right col-md-5 d-flex justify-content-center">
						<p class="p2">
							
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="card etape3">
			<div class="card-header">
				<h4>ETAPE 3</h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="left col-md-5">
						<div class="form-row">
							<div class="col">
								<label for="">Email</label>
								<input type="email" id="" name="email" class="form-control col-md email" required>
							</div>
							<div class="col">
								<label for="">Mot de passe</label>
								<input type="text" id="" name="password" class="form-control col-md password" required>
							</div>
						</div>
						<div class="form-group">
							
							<label for="">Image</label>
							<input type="file" id="" name="" placeholder="242 xx xxx xx xx" class="form-control col-md-10">
						</div>
						<div class="form-group">
							<button class="btn btn-sm btn-success terminer3">TERMINER</button>
						</div>
					</div>
					<div class="right col-md-7">
						<h5>Resultats</h5> <br>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script src="{{asset('colorlib-wizard-30/js/prof.js')}}"></script>
@endsection