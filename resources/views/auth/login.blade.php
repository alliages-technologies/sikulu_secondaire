<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKU | Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js' defer></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js' defer></script>
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
</head>

<style>
    body {
        color: #000;
        overflow-x: hidden;
        height: 100%;
        background-color: #eceff0;
        background-repeat: no-repeat
    }

    .card0 {
        box-shadow: 0px 4px 8px 0px #757575;
        border-radius: 0px
    }

    .card2 {
        margin: 0px 40px
    }

    .logo {
        width: 500px !important;
        height: 425px  !important;
        margin-top: 20px;
        margin-left: 40px !important;
        border-radius: 5pc;
        margin-bottom: -23px;
    }

    .image {
        width: 80%;
        height: 280px;
    }

    .border-line {
        border-right: 1px solid #EEEEEE
    }

    .facebook {
        background-color: #007bff;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .twitter {
        background-color: #007bff;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .linkedin {
        background-color: #007bff;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .line {
        height: 1px;
        width: 45%;
        background-color: #E0E0E0;
        margin-top: 10px
    }

    .or {
        width: 10%;
        font-weight: bold
    }

    .text-sm {
        font-size: 20px !important;
        padding-bottom: 10px;
    }

    ::placeholder {
        color: #BDBDBD;
        opacity: 1;
        font-weight: 300
    }

    :-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    ::-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 2px;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #007bff;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    a {
        color: inherit;
        cursor: pointer
    }

    .btn-blue {
        background-color: #007bff;
        width: 150px;
        color: #fff;
        border-radius: 2px
    }

    .btn-blue:hover {
        background-color: #1077e5;
        color: #fff;
        cursor: pointer
    }

    .bg-blue {
        color: #fff;
        background-color: #0956a9;
    }

    @media screen and (max-width: 991px) {
        .logo {
            margin-left: 0px;
        }

        .image {
            width: 90%;
            height: 350px;
        }

        .border-line {
            border-right: none
        }

        .card2 {
            border-top: 1px solid #EEEEEE !important;
            margin: 0px 15px
        }
    }
</style>

<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row"> <img src="{{asset('images/anso.jpeg')}}" class="logo"> </div>
                            <div class="" style="margin-left: 65px;margin-top: -16px;">
                                <p class="ml-5" style="font-size: 23px;
                                font-family: inherit;
                                letter-spacing: 0px;
                                font-weight: ;
                                ">
                                    <span>Entreprise : <span style="color: #007bff; font-weight: 500;"> Onso_congo </span> </span> <br>
                                    <span>Contact 1 : <span style="color: green; font-weight: 500;"> +242 05-014-09-33 </span></span> <br>
                                    <span>Contact 2 : <span style="color: #df5239;font-weight: 500;"> +242 06-845-65-33 </span></span> <br>
                                    <span>Adresse email : <span style="color: #0136b9;font-weight: 500;"> onsocongo@gmail.com </span></span>
                                </p>
                            </div>
                        </div>
                        <div class="container">
                            <marquee behavior="" direction=""><h2 style="font-size:40px;background-color: #50a850;color: #fff;letter-spacing: 2px;border-radius: 5px;" class="text-center">POUR UNE GESTION SANS STRESS DE VOTRE ECOLE</h2></marquee>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row justify-content-center"> <img style="width: 100%; height: 342px;margin-left: 4%;" src="{{asset('images/gesschool.png')}}" class=""> </div>
                            <div class="row px-3 mb-4">
                                <div class="line"></div> <small class="or text-center"> </small>
                                <div class="line"></div>
                            </div>
                            <div class="row px-3">
                                 <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Adresse Email</h6>
                                 </label>
                                 <input id="email" type="email" class="mb-4 @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Saisissez votre mail" autofocus autocomplete="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                 <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Mot de passe</h6>
                                 </label>
                                 <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Saisissez votre mot de passe" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                     <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                                     <label for="chk1" class="custom-control-label text-sm">Se souvenir de moi</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="ml-auto mb-0 text-sm" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">SE CONNECTER</button> </div>
                        </div>
                    </div>
                </div>
                <div class="bg-blue py-4">
                    <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2022. Alliages Technologies.</small>
                        <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
