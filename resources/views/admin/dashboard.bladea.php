<!DOCTYPE html>
<html lang="en">

@extends ('admin.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
    
 @extends ('admin.topnavbar')

 @extends ('admin.content')
 
  
  @extends ('admin.sidebar')
  
  @section('content')

 
  @endsection('content')
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</html>
