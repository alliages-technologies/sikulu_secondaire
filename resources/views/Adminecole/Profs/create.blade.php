<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Admin Ecole | Configuration professeur
	</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{asset('colorlib-wizard-30/css/montserrat-font.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('colorlib-wizard-30/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('colorlib-wizard-30/css/style.css')}}"/>
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

</head>
<body>
	<div class="container">
		<div class="wizard-v10-content mt-5">
			<div class="wizard-form">
				<div class="wizard-header">
					<h3>CONFIGURATION D'UN NOUVEAU PROFESSEUR</h3>
				</div>
		        <form class="form-register" action="{{route('adminecole.profs.store')}}" method="post">
					@csrf
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>1</h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder">
										<label for="">Nom</label>
										<input type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-holder form-holder-2">
										<label for="">Numéro de téléphone</label>
										<input type="number" class="form-control" id="phone" name="phone">
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="">Email</label>
										<input type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-holder form-holder-2">
										<label for="">Nouveau mot de passe</label>
										<input type="text" class="form-control" id="password" name="password">
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>2</h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder">
										<label for="">Prénom</label>
										<input type="prenom" class="form-control" id="prenom" name="prenom">
									</div>
									<div class="form-holder form-holder-2">
										<label for="">Adresse</label>
										<input type="text" class="form-control" id="adresse" name="adresse">
									</div>
								</div>
								<div class="form-row">
									
									<div class="">
										<label for="">Dernier Diplome</label>
										<select name="diplome_id" id="" class="form-control">
											<option value="">SELECTIONNEZ LE DIPLOME</option>
										</select>
									</div>
									<div class="form-holder form-holder-2">
										<label for="">Azerty</label>
										<input type="text" class="form-control" id="azerty" name="azerty">
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>3</h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="subject">Subject</label>
										<select name="subject" id="subject" class="form-control">
											<option value="" disabled selected>Your Subject</option>
											<option value="Finance">Finance</option>
											<option value="Marketing">Marketing</option>
											<option value="IT Support">IT Support</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="comment">Comment</label>
										<input type="text" name="comment" class="form-control" id="comment">
									</div>
								</div>
							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="{{asset('colorlib-wizard-30/js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{asset('colorlib-wizard-30/js/jquery.steps.js')}}"></script>
	<script src="{{asset('colorlib-wizard-30/js/main.js')}}"></script>
</body>
</html>