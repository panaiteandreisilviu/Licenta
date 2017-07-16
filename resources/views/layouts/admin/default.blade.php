<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Licenta - Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ URL::asset('AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ URL::asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('AdminLTE-2.3.11/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

{{-- ------------------  SCRIPTS ------------------ --}}

<!-- jQuery 2.2.3 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('AdminLTE-2.3.11/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ URL::asset('AdminLTE-2.3.11/plugins/chartjs/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('AdminLTE-2.3.11/dist/js/demo.js') }}"></script>

{{-- ------------------  BODY ------------------ --}}


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.admin.nav')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('layouts.admin.title-breadcrumb')

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.admin.footer')

    <!-- Control Sidebar -->
    @include('layouts.admin.control-sidebar')

</div>
<!-- ./wrapper -->

</body>
</html>