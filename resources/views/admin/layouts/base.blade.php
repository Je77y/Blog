<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Admin - @yield('title')</title>

    <base href="{{ asset(' ') }}">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layouts.navbar')

        <div id="page-wrapper">
            
            <!-- /.row -->
            @yield('content')
            <!-- /.row -->

            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/raphael.min.js"></script>
    {{-- <script src="js/morris.min.js"></script>
    <script src="js/morris-data.js"></script> --}}

    <!-- Custom Theme JavaScript -->
    {{-- <script src="js/sb-admin-2.min.js"></script> --}}
    <script src="js/notify.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('.anchor').click(function() {
                $('.anchor').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    @yield('js')
</body>

</html>
