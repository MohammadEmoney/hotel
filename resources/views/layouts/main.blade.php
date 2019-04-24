<!DOCTYPE html>
<html>
<head>
  @include('layouts.partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.partials.navigation')
  <!-- right side column. contains the logo and sidebar -->
    @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('page-navigation')

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-left">
    <strong>Copyleft &copy; 2014-2017 <a href="https://adminlte.io">Almsaeed Studio</a> & <a href="http://hosseinizadeh.ir/adminlte">Alireza Hosseinizadeh</a></strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('layouts.partials.footer')
</body>
</html>
