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
    <link href="{{( url('/css/header.css'))}}" rel="stylesheet" />
</head>
<body>

    <div class="navBox">
        <!-- vertigo image -->
        <div class="vertigoBox">
            <img src="{{ url('/img/headersidebar.png') }}" alt="vertigo">
        </div>
        <!-- dummy box ignore it -->
        <div class="dummyBox1"> </div>
        <!-- search box -->
        <div class="mainSearchBox">
            <!-- search icon     -->
            <div class="subSearchBox">
                <div class="searchIconBox">
                    <img class="searchIcon" src="{{ url('/vector/searchIcon.svg') }}" alt="search icon">
                </div>
                <input class="placeHolderColor" placeholder="Search" type="text">
            </div>
        </div>
        <!-- dummy box ignore it -->
        <div class="dummyBox2"> </div>
        <!-- gear icon -->
        <div class="iconBox">
            <img class="displayed" src="{{ url('/img/gear.svg') }}" alt="Avatar">
        </div>
        <!-- bell icon -->
        <div class="iconBox">
            <img class="displayed" src="{{ url('/img/bell.svg') }}" alt="Avatar">
        </div>
        <!-- profile picture -->
        <div class="iconBox">
            <img src="{{ url('/img/team2.jpg') }}" alt="Circle image" class="img-fluid rounded-circle profilePicture">
        </div>
        <!-- name and position -->
        <div class="namePositionBox">
            <div class="nameBox">
                <b>Philip</b>
            </div>
            <div class="positionBox">
                Director
            </div>
        </div>
         <!-- bell icon -->
         <div class="iconBox">
            <a href="{{URL::to('logout')}}"><i class="fas fa-sign-out-alt fa-2x zoom2" style="padding-top:14px;color:white"></i></a>
            
        </div>
    </div>



    <script src="{{ url('/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{url('/js/plugins/bootstrap-switch.js') }}"></script>
    <script src="{{ url('/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/plugins/moment.min.js') }}"></script>
    <script src="{{ url('/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('/js/argon-design-system.min.js?v=1.2.0') }}" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
</bodd>

</html>