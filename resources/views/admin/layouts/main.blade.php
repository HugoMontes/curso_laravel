<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'Default') | Panel de Administracion</title>
    <!-- Bootstrap Core CSS -->
    {!! Html::style('admin/vendor/bootstrap/css/bootstrap.min.css') !!}
    <!-- MetisMenu CSS -->
    {!! Html::style('admin/vendor/metisMenu/metisMenu.min.css') !!}
    <!-- Custom CSS -->
    {!! Html::style('admin/dist/css/sb-admin-2.css') !!}
    <!-- Custom Fonts -->
    {!! Html::style('admin/vendor/font-awesome/css/font-awesome.min.css') !!}
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
        @include('admin.layouts.sidebar')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @include('flash::message')
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    {!! Html::script('admin/vendor/jquery/jquery.min.js') !!}
    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('admin/vendor/bootstrap/js/bootstrap.min.js') !!}
    <!-- Metis Menu Plugin JavaScript -->
    {!! Html::script('admin/vendor/metisMenu/metisMenu.min.js') !!}
    <!-- Custom Theme JavaScript -->
    {!! Html::script('admin/dist/js/sb-admin-2.js') !!}
    @yield('javascript')
</body>
</html>
