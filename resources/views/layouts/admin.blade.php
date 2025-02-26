@include('includes.head-tl3')
<style>
    .card-header{
        background-color: darkblue;
        color: white;
    }
    .btn-default{
        background-color: darkblue;
        color: white;
    }
    .btn-default:hover{
        background-color: rgb(13, 13, 95);
        color: white;
    }
    h4{
        font-weight: lighter;
        letter-spacing: 1px;
    }
</style>
<body style="font-size: .9rem" class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <?php $active = \Illuminate\Support\Facades\Session::get('active'); ?>
            <?php

            use Illuminate\Support\Facades\Auth; ?>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto" style="padding-right: 65px;">

                <!-- Profil Dropdown Menu -->
                <li class="nav-item dropdown mr-2">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="badge  navbar-badge"> <img style="max-height: 20px; max-width: 20px;" src="<?= Auth::user()->imageUri ? asset('img/' . Auth::user()->imageUri) : asset('img/avatar.png') ?>" class="img-circle" alt="{{ auth()->user()->last_name }}"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <small style="font-size: 0.7rem" class="dropdown-item dropdown-header"><?= Auth::user()->name ?> - <?= Auth::user()->email ?></small>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#user-profil-form">
                            <i class="fas fa-pencil-alt mr-2"></i> Mon Profil

                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="/deconnexion" class="dropdown-item">
                            <i class="fa fa-sign-out-alt mr-2"></i> Déconnexion
                        </a>

                    </div>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar elevation-4 sidebar-dark-success">
            <!-- Brand Logo -->
            <a href="#" class="brand-link navbar-dark">
                <img src="{{asset('img/logo-obac.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"> ECOLE </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= Auth::user()->imageUri ? asset('img/' . Auth::user()->imageUri) : asset('img/avatar.png') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= Auth::user()->name ?></a>
                        <li class="nav-item dropdown">
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Brad Diesel
                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">Call me whenever you can...</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">I got your message bro</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Nora Silvester
                                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">The subject goes here</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                            </div>
                        </li>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                        <li class="nav-item">
                            <a href="/home" class="nav-link {{ $active==1?'active':'' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p class="p">
                                    TABLEAU DE BORD

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/users" class="nav-link {{ $active==1?'active':'' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p class="p">
                                    GESTION DES UTILISATEURS

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.inscriptions.index')}}" class="nav-link {{ $active==2?'active':'' }}">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p class="p">
                                    INSCRIPTIONS
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/eleves" class="nav-link {{ $active==2?'active':'' }}">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p class="p">
                                    ELEVES
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.annee-acads.index')}}" class="nav-link {{ $active==3?'active':'' }}">
                                <i class="nav-icon fas fa fa-lemon"></i>
                                <p class="p">
                                    ANNEE SCOLAIRE
                                </p>
                            </a>
                        </li>


                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link {{ $active==5?'active':'' }}">
                                <i class="nav-icon fas fa-coins"></i>
                                <p class="p">
                                    AUTRES GESTIONS
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.series.index')}}" class="nav-link">
                                        <i class="fa fa-calendar"></i>
                                        <p class="af">Série</p>
                                    </a>
                                </li>
                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.classes.index')}}" class="nav-link">
                                        <i class="fa fa-calendar"></i>
                                        <p class="af">Classes</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.mois.index')}}" class="nav-link">
                                        <i class="fa fa-calendar-week"></i>
                                        <p class="af">Mois</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.ecolages.index')}}" class="nav-link">
                                        <i class="fa fa-person-booth"></i>
                                        <p class="af">Ecolages</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.matieres.index')}}" class="nav-link">
                                        <i class="fa fa-book"></i>
                                        <p class="af">Matieres</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.cours.index')}}" class="nav-link">
                                        <i class="fa fa-book"></i>
                                        <p class="af">Cours</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.tranches.index')}}" class="nav-link">
                                        <i class="fa fa-calendar"></i>
                                        <p class="af">Tranches Horaires</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                                        <i class="fa fa-user"></i>
                                        <p class="af">Rôles</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.emploies.index')}}" class="nav-link">
                                        <i class="fa fa-calendar"></i>
                                        <p class="af">Emploie du temps </p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.diplomes.index')}}" class="nav-link">
                                        <i class="fa fa-folder"></i>
                                        <p class="af">Diplômes</p>
                                    </a>
                                </li>

                                <li class="nav-item ml-4">
                                    <a href="{{route('admin.profs.index')}}" class="nav-link">
                                        <i class="fa fa-users"></i>
                                        <p class="af">Profs</p>
                                    </a>
                                </li>


                                <li class="nav-item ml-4">
                                    <a href="/" class="nav-link">
                                        <i class="fa fa-euro"></i>
                                        <p class="af">...</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="/users" class="nav-link {{ $active==4?'active':'' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p class="p">
                                    COMPTES UTILISATEURS
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                @yield('content-header')
                @yield('nav_actions')
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <div class="container">
                    @include('includes.flash-message')
                </div>
                <div class="">
                    <script type="text/javascript" src="{{ asset('js/api.js') }}"></script>
                    @yield('content')

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('includes.footer')
</body>

</html>
