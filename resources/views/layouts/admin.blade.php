<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/admin/assets/img/favicon.png" rel="icon">
  <link href="/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <title>@yield('title')</title>
  <!-- Template Main CSS File -->
  <link href="/admin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/admin/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
    
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/admin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <form action="/logout" method="post">
                @csrf
                <a class="dropdown-item d-flex align-items-center" href="/logout"
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    class="nav-link collapsed"
                >
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
                </a>
                </form>
              {{--<a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>--}}
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Voos</span>
            </a>
          </li>
          <li>
            <a href="{{route('fleets')}}">
              <i class="bi bi-circle"></i><span>Frotas</span>
            </a>
          </li>
          <li>
            <a href="{{route('tariffs')}}">
              <i class="bi bi-circle"></i><span>Tarifas</span>
            </a>
          </li>
          <li>
            <a href="{{route('perks')}}">
              <i class="bi bi-circle"></i><span>Regalias</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="tables-data.html">
          <i class="bi bi-currency-dollar"></i><span>Compras</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link" href="charts-chartjs.html">
          <i class="bi bi-bar-chart"></i><span>Estatística</span>
        </a>
      </li><!-- End Charts Nav -->

      {{--<li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->
      --}}
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">@yield('route')</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PDC Airline</span></strong>. Todos direitos reservados
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#"></a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/admin/assets/js/jquery.min.js"></script>

  <script src="/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/admin/assets/vendor/quill/quill.min.js"></script>
  <script src="/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin/assets/js/main.js"></script>
  <script src="/admin/assets/js/admin.js"></script>
  <script src="/admin/assets/js/jquery.mask.min.js"></script>

  <script>
    
    function modalDropFleet(id) {
      $("#drop_fleet_id").val(id);
      var modal = document.getElementById('exampleModalDropFleet')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
    function modalDropTariff(id) {
      $("#drop_tariff_id").val(id);
      var modal = document.getElementById('exampleModalDropTariff')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
    function modalDropPerk(id) {
      $("#drop_tariff_id").val(id);
      var modal = document.getElementById('exampleModalDropTariff')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
    /*function modalDropUser(id) {
      $("#drop_user_id").val(id);
      var modal = document.getElementById('exampleModalDropUser')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }*/
    function modalFleet(params) {
      $("#btn-addFleet").html('Adicionar');
      $("#brand").val("");
      $("#model").val("");
      $("#capacity").val("");
      var modal = document.getElementById('exampleModalFleet')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }

    function modalPerk(params) {
      $("#btn-addPerk").html('Adicionar');
      $("#brand").val("");
      $("#model").val("");
      $("#capacity").val("");
      var modal = document.getElementById('exampleModalPerk')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }


    function modalTariff(params) {
      $("#btn-addTariff").html('Adicionar');
      $("#brand").val("");
      $("#model").val("");
      $("#capacity").val("");
      var modal = document.getElementById('exampleModalTariff')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }

    function modalTariff(params) {
      $("#btn-addTariff").html('Adicionar');
      $("#brand").val("");
      $("#model").val("");
      $("#capacity").val("");
      var modal = document.getElementById('exampleModalTariff')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }

    function modalEditFleet(id,brand,model,capacity){
      $("#btn-addFleet").html('Editar');
      $("#fleet_id").val(id);
      $("#brand").val(brand);
      $("#model").val(model);
      $("#capacity").val(capacity);
      var modal = document.getElementById('exampleModalFleet')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }

    function modalEditPerk(id,brand,model,capacity){
      $("#btn-addPerk").html('Editar');
      $("#fleet_id").val(id);
      $("#brand").val(brand);
      $("#model").val(model);
      $("#capacity").val(capacity);
      var modal = document.getElementById('exampleModalPerk')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
  </script>
</body>

</html>