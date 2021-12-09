<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>Formularios</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- ================================
        CSS Files
        ================================= -->
        
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i|Open+Sans:400,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('assets/css/themefisher-fonts.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/dark.css') }}">
        <link id="color-changer" rel="stylesheet" href="{{ url('assets/css/colors/red.css') }}">
    </head>

    <body class="dark">
        @yield('content')
        
        <!-- ================================
        JavaScript Libraries
        ================================= -->
        
        <script src="{{ url('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ url('assets/js/vendor/bootstrap.min.js') }} "></script>
        <!-- <script src="js/jquery.easing.min.js"></script> -->
        <script src="{{ url('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('assets/js/jquery-validation.min.js') }}"></script>
        <script src="{{ url('assets/js/form.min.js') }}"></script>
        <script src="{{ url('assets/js/main.js') }}"></script>
        @yield('js')
    </body>
</html>