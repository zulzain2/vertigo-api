<!--
=========================================================
* Argon Design System - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-design-system
* Copyright 2020 Creative Tim (http://www.creative-tim.com)

Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--     Fonts and icons     -->
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
<img src="{{ url('/img/header.png') }}" alt="Avatar" style="width:10%;position:fixed">

<body class="login-page mainColor">

    <section class="section section-shaped section-lg">
        <div class="shape">

            <img src="{{ url('/img/sideLogo.png') }}" alt="Avatar" style="width:12%;margin-left:44%;margin-top:5%">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container pt-lg-7" style="margin-top: 13%;">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" id="customBorderBottomLine" placeholder="Username" type="username">
                                    </div>
                                </div>
                                <div class="form-group focused">
                                    <div class="input-group input-group-alternative">
                                        <input class="form-control" id="customBorderBottomLine" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-icon mainColor mainFontColor my-4" style="text-transform: unset">
                                        <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                        <span class="btn-inner--text">Login</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
</body>

</html>