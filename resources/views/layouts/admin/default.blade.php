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
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('AdminLTE-2.3.11/plugins/select2/select2.min.css') }}">
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


{{-- ------------------  BODY ------------------ --}}

@include('layouts.admin.scripts')


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">
    @include('layouts.admin.nav')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        @include('layouts.admin.title-breadcrumb', ['title' => isset($title) ? $title : null, 'subtitle' => isset($subtitle) ? $subtitle : null, 'breadcrumbs' => \App\Breadcrumbs::get(Request::path())])

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            {{ Session::get('success_message') }}
                        </div>
                    @endif
                </div>
            </div>

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

