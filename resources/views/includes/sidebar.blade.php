<html>

<head>
    <title>App Name - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link type="text/css" href="{{ url('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{ url('/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{ url('/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{( url('/css/argon-design-system.css?v=1.2.0'))}}" rel="stylesheet" />
    <link href="{{( url('/css/generalCustom.css'))}}" rel="stylesheet" />

</head>
<bodd>
    <div class="sidebarBox">
        <div style="margin-top: 15%;">
            <ul class="customul">
                <li class="customli">
                    <a class="{{ (request()->is('/')) ? 'active' : '' }}" href="/">
                        <img src="{{ (request()->is('/')) ? url('/img/home.svg') : url('/img/whitehouse.svg') }}" alt="" class="iconSidebar">
                        <b>Dashboard</b>
                    </a>
                </li>
                <li class="customli">
                    <a class="{{ (request()->is('staff')) ? 'active' : '' }}" href="/staff">
                        <img src="{{ (request()->is('staff')) ? url('/img/userBlack.svg') : url('/img/user.svg') }}" alt="" class="iconSidebar">
                        <b>Staff</b>
                    </a>
                </li>
                <li class="customli">
                    <a class="{{ (request()->is('equipment')) ? 'active' : '' }}" href="/equipment">
                        <img src="{{ (request()->is('equipment')) ? url('/vector/printerColor.svg') : url('/img/printer.svg') }}" alt="" class="iconSidebar">
                        <b>Equipment</b>
                    </a>
                </li>
                <li class="customli">
                    <a class="{{ (request()->is('transport')) ? 'active' : '' }}" href="/transport">
                        <img src="{{ (request()->is('transport')) ? url('/vector/truckColor.svg') : url('/img/truck.svg') }}" alt="" class="iconSidebar">
                        <b>Transport</b>
                    </a>
                </li>
                <li class="customli">
                    <a class="{{ (request()->is('maintenance')) ? 'active' : '' }}" href="/maintenance">
                        <img src="{{ (request()->is('maintenance')) ? url('/vector/gearColor.svg') : url('/img/settings.svg') }}" alt="" class="iconSidebar">
                        <b>Maintenance</b>
                    </a>
                </li>
                <li class="customli">
                    <a class="{{(request()->is('tender'))? 'active':''}}" href="/tender">
                        <img src="{{ (request()->is('tender'))? url('/vector/tenderColor.svg'): url('/img/tender.svg') }}" alt="" class="iconSidebar">
                        <b>Tender</b>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <script src="{{ url('/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{url('/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ url('/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/plugins/moment.min.js') }}"></script>
    <script src="{{ url('/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="{{ url('/js/argon-design-system.min.js?v=1.2.0') }}" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</bodd>

</html>