<html>

<head>
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link type="text/css" href="https://vertigoapi.herokuapp.com/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://vertigoapi.herokuapp.com/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="https://vertigoapi.herokuapp.com/css/font-awesome.css" rel="stylesheet" />
    <link href="https://vertigoapi.herokuapp.com/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="https://vertigoapi.herokuapp.com/css/argon-design-system.css?v=1.2.0" rel="stylesheet" />
    <link href="https://vertigoapi.herokuapp.com/css/generalCustom.css" rel="stylesheet" />
    <!-- css for staff assingment system -->
    <link href="https://vertigoapi.herokuapp.com/css/staffAssignmentSystem.css" rel="stylesheet" />
    <link href="https://vertigoapi.herokuapp.com/css/equipment.css" rel="stylesheet" />
    <link href="https://vertigoapi.herokuapp.com/css/maintenance.css" rel="stylesheet" />
    <link href="https://vertigoapi.herokuapp.com/css/tender.css" rel="stylesheet" />

</head>

<body>
    @include('includes.header')
    @include('includes.sidebar')
    @yield('content')
    <script src="https://vertigoapi.herokuapp.com/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="https://vertigoapi.herokuapp.com/js/core/popper.min.js" type="text/javascript"></script>
    <script src="https://vertigoapi.herokuapp.com/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://vertigoapi.herokuapp.com/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="ttps://vertigoapi.herokuapp.com/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="https://vertigoapi.herokuapp.com/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="https://vertigoapi.herokuapp.com/js/plugins/moment.min.js"></script>
    <script src="https://vertigoapi.herokuapp.com/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="https://vertigoapi.herokuapp.com/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://vertigoapi.herokuapp.com/js/argon-design-system.min.js?v=1.2.0" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</body>

</html>