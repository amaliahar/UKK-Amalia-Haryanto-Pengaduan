<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard </title>

  <!-- plugins:css -->
    <link rel="stylesheet" href="../../asset/admin/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../asset/admin/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../asset/admin/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../asset/admin/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../asset/admin/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../asset/admin/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->

  <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../asset/admin/template/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../asset/admin/template/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
    <link rel="stylesheet" href="../../asset/admin/template/css/vertical-layout-light/style.css">
  <!-- endinject -->

  <link rel="shortcut icon" href=" " />

   <!-- CKeditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/date-1.1.2/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sp-2.0.2/datatables.min.css"/>

</head>
<body>

<!-- sweetalert harus di taro di master layout-->
@include('sweetalert::alert')


    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
                {{-- <a class="navbar-brand brand-logo" href="/">
                <img src="../../asset/admin/template/images/logo.svg" alt="logo" />
                </a> --}}
              <a class="navbar-brand brand-logo-mini" href="/">
                <img src="../../asset/admin/template/images/logo.svg" alt="logo" />
              </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Selamat datang<span class="text-black fw-bold">@auth {{ Auth::user()->name }} @endauth</span></h1>
              <h3 class="welcome-sub-text">Pengaduan Masyarakat Kecamatan Ciawi  </h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item d-none d-lg-block">
              <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" class="form-control">
              </div>
            </li>
            <li class="nav-item">
              <form class="search-form" action="#">
                <i class="icon-search"></i>
                <input type="search" class="form-control" placeholder="Search Here" title="Search here">
              </form>
            </li>
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../../asset/admin/template/images/faces/face8.jpg" alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    <img class="img-md rounded-circle" src="../../asset/admin/template/images/faces/face8.jpg" alt="Profile image">
                    <p class="mb-1 mt-3 font-weight-semibold">@auth {{ Auth::user()->name }} @endauth</p>
                    <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                  </div>
                  <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                  <a class="dropdown-item" href="login"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Logout</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        <!-- </div> -->
      </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item nav-category">Masyarakat</li>
            <li class="nav-item">
              <a class="nav-link" href="pengaduan">
                <i class="menu-icon mdi mdi-animation"></i>
                <span class="menu-title">Data Pengaduan</span>
              </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="detail">
                  <i class="menu-icon mdi mdi-file-multiple"></i>
                  <span class="menu-title">Data Tanggapan</span>
                </a>
            </li> --}}

          <li class="nav-item nav-category">page</li>

          {{-- <li class="nav-item">
            <a class="nav-link" href="detail">
              <i class="menu-icon mdi mdi-file-multiple"></i>
              <span class="menu-title">Data Tanggapan</span>
            </a>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link" href="user">
              <i class="menu-icon mdi mdi-file-multiple"></i>
              <span class="menu-title">Data User</span>
            </a>
          </li>

            <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                  <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>

            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="login"> Login </a></li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link" href="about">
              <i class="menu-icon mdi mdi-file-multiple"></i>
              <span class="menu-title">About</span>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link" href="ekskul">
              <i class="menu-icon ti-layout"></i>
              <span class="menu-title">Ekskul</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="gallery">
              <i class="menu-icon mdi mdi-image-multiple"></i>
              <span class="menu-title">Portofolio</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="major">
              <i class="menu-icon  icon-graduation"></i>
              <span class="menu-title">Major</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="favicon">
              <i class="menu-icon ti-medall"></i>
              <span class="menu-title">Populer</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="teacher">
              <i class="menu-icon icon-people"></i>
              <span class="menu-title">Teacher</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="testimonial">
              <i class="menu-icon mdi mdi-comment-account"></i>
              <span class="menu-title">Testimonial</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="blog">
              <i class="menu-icon mdi mdi-checkbox-multiple-blank"></i>
              <span class="menu-title">Blog</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="mitra">
              <i class="menu-icon mdi mdi-link-variant"></i>
              <span class="menu-title">Mitra</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="config">
              <i class="menu-icon mdi mdi-settings"></i>
               <span class="menu-title">Config</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="pagetitle">
              <i class="menu-icon ti-smallcap"></i>
              <span class="menu-title">Page Title</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="metadata">
              <i class="menu-icon mdi mdi-tag-multiple"></i>
              <span class="menu-title">Meta Data</span>
            </a>
          </li> -->


          <!-- <li class="nav-item nav-category">Forms and Datas</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="menu-icon mdi mdi-card-text-outline"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
              </ul>
            </div>
          </li> -->

          <!-- <li class="nav-item nav-category">pages</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
                <i class="menu-icon mdi mdi-account-circle-outline"></i>
                  <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="login"> Login </a></li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">
          <div id="layoutSidenav_content">
                <main>
                    <br>
                    @yield('content')
                </main>
          </div>
        </div>
        <!-- content-wrapper ends -->


        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->


      <!-- main-panel ends -->

    <!-- </div> -->
    <!-- page-body-wrapper ends -->

  <!-- </div> -->
  <!-- container-scroller -->

  <!-- plugins:js -->
    <script src="../../asset/admin/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
    <script src="../../asset/admin/template/vendors/chart.js/Chart.min.js"></script>
    <script src="../../asset/admin/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../asset/admin/template/vendors/progressbar.js/progressbar.min.js"></script>
  <!-- End plugin js for this page -->

  <!-- inject:js -->
    <script src="../../asset/admin/template/js/off-canvas.js"></script>
    <script src="../../asset/admin/template/js/hoverable-collapse.js"></script>
    <script src="../../asset/admin/template/js/template.js"></script>
    <script src="../../asset/admin/template/js/settings.js"></script>
    <script src="../../asset/admin/template/js/todolist.js"></script>
  <!-- endinject -->

  <!-- Custom js for this page-->
    <script src="../../asset/admin/template/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../asset/admin/template/js/dashboard.js"></script>
    <script src="../../asset/admin/template/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../../asset/admin/js/datatables-simple-demo.js"></script>

      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/date-1.1.2/kt-2.7.0/r-2.3.0/rg-1.2.0/sc-2.0.7/sb-1.3.4/sp-2.0.2/datatables.min.js"></script>

    <script>
    $(document).ready(function () {
    $('#MyTables').DataTable({
      processing: true,
      'pageLength': 4,
      "responsive": true,
    });
});
</script>


</body>

</html>


