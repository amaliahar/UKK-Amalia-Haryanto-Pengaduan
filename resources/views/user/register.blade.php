<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Halaman Login </title>
<!-- plugins:css -->
<link rel="stylesheet" href="../../asset/admin/template/vendors/feather/feather.css">
<link rel="stylesheet" href="../../asset/admin/template/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="../../asset/admin/template/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="../../asset/admin/template/vendors/typicons/typicons.css">
<link rel="stylesheet" href="../../asset/admin/template/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="../../asset/admin/template/vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="../../asset/admin/template/css/vertical-layout-light/style.css">
<!-- endinject -->
{{-- <link rel="shortcut icon" href="../../asset/admin/template/images/favicon.png" /> --}}
</head>

<body>
    <!-- sweetalert harus di taro di master layout-->
@include('sweetalert::alert')

<div class="container-scroller">
<div class="container-fluid page-body-wrapper full-page-wrapper">
<div class="content-wrapper d-flex align-items-center auth px-0" style="background-color:#98b6ef;">
<div class="row w-100 mx-0">
<div class="col-lg-4 mx-auto">
<div class="auth-form-light text-left py-5 px-4 px-sm-5">
{{-- <div class="brand-logo">
<img src="../../asset/admin/template/images/logo.svg" alt="logo">
</div> --}}
<h4>Laporan Pengaduan Masyarakat</h4>
<h6 class="fw-light">Silakan Anda login terlebih dahulu.</h6>

    @if ($message = Session::get('success'))
    <div class="alert alert-success mt-2">
      <p>{{ $message }}</p>
    </div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger mt-2">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</div>
@endif

{{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

<form action="/register" role="from" method="POST" class="Register 100-form validate-form">
@csrf
<div class="form-group">
<input type="text" value="{{ old('nik') }}" name="nik" class="form-control form-control-lg @error('nik') is-invalid @enderror" id="nik" placeholder="NIK">
@error('nik')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<input type="text" value="{{ old('nama') }}" name="nama" class="form-control form-control-lg @error('nama') is-invalid @enderror" id="nama" placeholder="Nama">
@error('nama')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<input type="text" value="{{ old('username') }}" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" id="text" placeholder="Username">
@error('username')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<input type="text" value="{{ old('email') }}" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="Email">
@error('email')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<input type="password" value="{{ old('password') }}" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="Password">
@error('password')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="form-group">
<input type="text" value="{{ old('telp') }}" name="telp" class="form-control form-control-lg @error('telp') is-invalid @enderror" id="telp" placeholder="Telp">
@error('telp')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<div class="col-md-10">
<div class="form-group row">
<a>Jenis Kelamin</a>
<div class="col-sm-5">
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input @error('jender') is-invalid @enderror" name="jender" id="laki-laki" value="laki-laki" {{ old('laki-laki') == 'laki-laki'? 'checked' : '' }}>
Laki-laki
</label>
@error('laki-laki')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
</div>
<div class="col-sm-5">
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input @error('jender') is-invalid @enderror" name="jender" id="perempuan" value="perempuan" {{ old('perempuan') == 'perempuan'? 'checked' : '' }}>
Perempuan
</label>
@error('perempuan')
<div class="invalid-feedback">
{{ $message }}
</div>
@enderror
</div>
</div>
</div>
</div>
</div>
</div>
<div class="mt-3">
<button type="submit" class="btn btn-primary btn-rounded btn-fw">{{ __('Daftar')}}</button>
</div>
<!-- <div class="my-2 d-flex justify-content-between align-items-center">
<div class="form-check">
<label class="form-check-label text-muted">
<input type="checkbox" class="form-check-input">
Keep me signed in
</label>
</div>
<a href="#" class="auth-link text-black">Lupa password?</a>
</div> -->

<!-- <div class="mb-2">
<button type="button" class="btn btn-block btn-facebook auth-form-btn">
<i class="ti-facebook me-2"></i>Connect using facebook
</button>
</div> -->
<div class="text-center mt-4 fw-light">
Sudah Punya akun? <a href="{{ url('login')}}" class="text-primary">Silakan Masuk</a>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../asset/admin/template/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../asset/admin/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../asset/admin/template/js/off-canvas.js"></script>
<script src="../../asset/admin/template/js/hoverable-collapse.js"></script>
<script src="../../asset/admin/template/js/template.js"></script>
<script src="../../asset/admin/template/js/settings.js"></script>
<script src="../../asset/admin/template/js/todolist.js"></script>
<!-- endinject -->
</body>

</html>
