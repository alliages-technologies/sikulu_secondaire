<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    @yield('title')
  </title>

  <!--CSS-->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/design.css')}}">
  <!--FONTS-->
  <link rel="stylesheet" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/media/css/jquery.dataTables.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<style>
    .card-header{
        background-color: #007bff;
        color: white;
    }
    .btn-default{
        background-color: #007bff;
        color: white;
    }
    .btn-default:hover{
        background-color: #007bff;
        color: white;
    }
    h4{
        font-weight: lighter;
        letter-spacing: 1px;
    }
    ul li a p {
        color: white;
    }
    ul li a i {
        color: white;
    }
</style>

<div class="wrapper" style="background-color: #f4f6f9">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="" height="60" width="60">
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <p class="nav-link">{{Auth::user()->ecole->name}}</p>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #007bff">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Directeur des Etudes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ACCEUIL
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.diplomes.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                DIPLOMES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.profs.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                ENSEIGNANTS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.inscriptions.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                INSCRIPTIONS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.inscriptions.salle') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                INSCRIPTIONS/CLASSES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.reinscriptions') }}" class="nav-link">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                REINSCRIPTIONS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.emploistemps.salles.menu') }}" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                EMPLOIS DU TEMPS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.rapports.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                RAPPORTS COURS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('responsablescolarite.rapports.ecole.jour') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                RAPPORTS JOUR
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/deconnexion" class="nav-link">
              <i class="nav-icon fas fa-power-off" style="color: "></i>
              <p>
                Déconnexion
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
    @yield('content-header')
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section><!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#">Alliages Technologies</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
    $(document).ready(function () {

        //$('#card-body').hide();
        $('#btn-modifier').click(function (e) {
            e.preventDefault();
            var h5 = '';
            //$('#h5').html("");
            //$('#h5').append(h5);
            $('#card-body').toggle(900);
        });
    });


</script>

<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminLTE/dist/js/pages/dashboard.js')}}"></script>
<!-- SCRIPT -->
<script src="{{asset('js/jquery-3.5.1.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('DataTables/media/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" id="lang" src="{{ asset('DataTables/media/French.json') }}"></script>

</body>
</html>
