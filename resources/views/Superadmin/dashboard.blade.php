<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/design.css')}}">
    <!--FONTS-->
    <link rel="stylesheet" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.css')}}">
    <!--JS-->
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <title>
        Dashboard
    </title>
</head>
<body>
    <nav class="container-fluid">
        <div class="">logo</div>
        <div class="">menu</div>
    </nav>

    <div class="container">
        <div class="row d-flex justify-content-center p-4">
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-bar-chart"></i>
                <p>Statistiques</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-building"></i>
                <p>Etablissement</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-users"></i>
                <p>R.H</p>
            </a>
            <a href="{{ route('superadmin.programmenationals.index') }}" class="col-md-3 m-2">
                <i class="fa fa-globe"></i>
                <p>Programme National</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-user-plus"></i>
                <p>Réinscriptions</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-graduation-cap"></i>
                <p>Scolarité</p>
            </a>
            <a href="{{ route('admin.emploies.index') }}" class="col-md-3 m-2">
                <i class="fa fa-calendar"></i>
                <p>Emploi du temps</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-file"></i>
                <p>Avancements</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-file-text"></i>
                <p>QCM</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-truck"></i>
                <p>Logistique</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-money"></i>
                <p>Finances</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-book"></i>
                <p>E-Bibliothèque</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-info"></i>
                <p>Infos</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-list"></i>
                <p>Réglement interieur</p>
            </a>
            <a href="" class="col-md-3 m-2">
                <i class="fa fa-cog"></i>
                <p>Paramètres</p>
            </a>
            <a href="/deconnexion" class="col-md-3 m-2">
                <i class="fa fa-power-off"></i>
                <p>Déconnexion</p>
            </a>
        </div>
    </div>
</body>
</html>
