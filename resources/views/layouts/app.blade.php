<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/demos/admin-templates/admin-pro/minimal/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Jan 2019 11:34:37 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('img/logoMain2.png') }}">
    <title>Vertigo</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ url('assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!--c3 CSS -->
    <link href="{{ url('assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ url('assets/plugins/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url('css/plugins/style.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ url('css/plugins/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ url('css/plugins/colors/default.css') }}" id="theme" rel="stylesheet">
    <link href="{{ url('assets/plugins/fontawesome/css/all.css') }}" rel="stylesheet"> <!--load all styles -->
    <!-- page css -->
    <link href="{{ url('css/plugins/pages/progressbar-page.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ url('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
 
     <!-- The core Firebase JS SDK is always required and must be listed first -->
     <script src="https://www.gstatic.com/firebasejs/7.9.2/firebase-app.js"></script>

     <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-messaging.js"></script>
 
     <link rel="manifest" href="manifest.json">
    

    <link href='{{ asset('js/plugins/fullcalendar/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('js/plugins/fullcalendar/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('js/plugins/fullcalendar/timegrid/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('js/plugins/fullcalendar/list/main.css') }}' rel='stylesheet' />

    <script src='{{ asset('js/plugins/fullcalendar/core/main.js') }}'></script>
    <script src='{{ asset('js/plugins/fullcalendar/interaction/main.js') }}'></script>
    <script src='{{ asset('js/plugins/fullcalendar/daygrid/main.js') }}'></script>
    <script src='{{ asset('js/plugins/fullcalendar/timegrid/main.js') }}'></script>
    <script src='{{ asset('js/plugins/fullcalendar/list/main.js') }}'></script>

    <style>
        <style>
            .zoom {
                padding: 0px;
                transition: transform .1s; /* Animation */
                margin: 0 auto;
            }
            
            .zoom:hover {
                transform: scale(1.01); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            }

            .zoom2 {
                padding: 0px;
                transition: transform .1s; /* Animation */
                margin: 0 auto;
            }
            
            .zoom2:hover {
                transform: scale(1.07); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            }

            .mdi.md-18 { font-size: 18px; }
            .mdi.md-24 { font-size: 24px; }
            .mdi.md-36 { font-size: 36px; }
            .mdi.md-48 { font-size: 48px; }
    </style>

<style>
        .lds-facebook {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        }
        .lds-facebook div {
        display: inline-block;
        position: absolute;
        left: 8px;
        width: 16px;
        background: red;
        animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }
        .lds-facebook div:nth-child(1) {
        left: 8px;
        animation-delay: -0.24s;
        }
        .lds-facebook div:nth-child(2) {
        left: 32px;
        animation-delay: -0.12s;
        }
        .lds-facebook div:nth-child(3) {
        left: 56px;
        animation-delay: 0;
        }
        @keyframes lds-facebook {
        0% {
            top: 8px;
            height: 64px;
        }
        50%, 100% {
            top: 24px;
            height: 32px;
        }
        }
  

  
  </style>

    @stack('styles')
</head>

<body class="fix-header fix-sidebar card-no-border">
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ url('img/logoMain2.png') }}" alt="homepage" class="dark-logo" style="width:40px;height:40px"/>
                            <!-- Light Logo icon -->
                            <img src="{{ url('img/logoMain2.png') }}" alt="homepage" class="light-logo" style="width:40px;height:40px"/>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{ url('img/header2.png') }}" alt="homepage" class="dark-logo" style="width:100%;height:100%" />
                         <!-- Light Logo text -->    
                         <img src="{{ url('img/header2.png') }}" class="light-logo" alt="homepage" style="width:100%;height:100%"/></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- Setting -->
                        <!-- ============================================================== -->
                        
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <i class="mdi mdi-settings md-46"></i>
                        
                            </a>
                           
                        </li> --}}

                        <!-- ============================================================== -->
                        <!-- End Setting -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Notification -->
                        <!-- ============================================================== -->
                      
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <i class="mdi mdi-bell-outline"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">

                                            @php
                                            use App\Notification;

                                            $notis = Notification::orderBy('created_at','DESC')->where('to_user' , '=' , auth()->user()->id)->limit(50)->get();
                                            @endphp
                                            @foreach ($notis as $noti)
                                            <a href="#">
                                                <div class="user-img"> <img src="{{URL::to($noti->createduser ? $noti->createduser->img_path : '')}}" alt="user" class="img-circle"> </div>
                                                <div class="mail-contnet">
                                                    <h5>{{$noti->title}}</h5> 
                                                    <span class="mail-desc">{{$noti->desc}}</span> 
                                                    <span class="time">{{ Carbon\Carbon::parse($noti->created_at)->diffForHumans()}} </span> 
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </li>
                                    {{-- <li>
                                        <a class="nav-link text-center" style="color:#455a64" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                     
                        <!-- ============================================================== -->
                        <!-- End Notification -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{auth()->user()->img_path}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{auth()->user()->img_path}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>{{auth()->user()->first_name}}&nbsp;{{auth()->user()->last_name}}</h4>
                                                <p class="text-muted">{{auth()->user()->staff_id}}</p>
                                                <p class="text-muted">{{auth()->user()->email}}</p>
                                                <p class="text-muted">{{auth()->user()->role->name}}</p>
                                            </div>
                                        </div>
                                    </li>
                                   
                                   
                                   
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Profile -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Logout -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="{{URL::to('logout')}}"> 
                                <i class="mdi mdi-logout"></i>
                        
                            </a>
                           
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Logout -->
                        <!-- ============================================================== -->
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                       
                        
                        <li id="dash_activate"> 
                            <a class="waves-effect waves-dark" href="{{URL::to('dashboard2')}}" aria-expanded="false"><img src="{{URL::to('/img/whitehouse.svg')}}" alt="" class="iconSidebar dashboard"><span class="hide-menu">&nbsp;&nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li> <a class="waves-effect waves-dark " href="{{URL::to('staff2')}}" aria-expanded="false"><img src="{{URL::to('/img/user.svg')}}" alt="" class="iconSidebar staff"><span class="hide-menu">&nbsp;&nbsp;Staff</span></a>
                            
                        </li>
                        <li> <a class="waves-effect waves-dark " href="{{URL::to('equipment2')}}" aria-expanded="false"><img src="{{URL::to('/img/printer.svg')}}" alt="" class="iconSidebar equipment"><span class="hide-menu">&nbsp;&nbsp;Equipment </span></a>
                            
                        </li>
                    
                        <li> <a class="waves-effect waves-dark " href="{{URL::to('transport2')}}" aria-expanded="false"><img src="{{URL::to('/img/truck.svg')}}" alt="" class="iconSidebar transport"><span class="hide-menu">&nbsp;&nbsp;Transport</span></a>
                           
                        </li>
                        <li> <a class="waves-effect waves-dark " href="{{URL::to('maintenance2')}}" aria-expanded="false"><img src="{{URL::to('/img/settings.svg')}}" alt="" class="iconSidebar maintenance"><span class="hide-menu">&nbsp;&nbsp;Maintenance</span></a>
                            
                        </li>
                        <li> <a class="waves-effect waves-dark " href="{{URL::to('tender2')}}" aria-expanded="false"><img src="{{URL::to('/img/tender.svg')}}" alt="" class="iconSidebar tender"><span class="hide-menu">&nbsp;&nbsp;Tender</span></a>
                           
                        </li>
                       
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Preloader - style you can find in spinners.css -->
                <!-- ============================================================== -->
                <div class="preloader" style="margin-left: -25px;top: unset;">
                    <div class="loader" style="left: 45%;">
                        <div class="loader__figure"></div>
                        <p class="loader__label">Vertigo</p>
                    </div>
                </div>
             
                @yield('content')
               
                
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2020 IKOM Solution Sdn Bhd </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{secure_asset('js/firebase.js')}}"></script>
    <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{ url('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('assets/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ url('assets/plugins/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ url('assets/plugins/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ url('assets/plugins/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="{{ url('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ url('assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ url('assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!--c3 JavaScript -->
    <script src="{{ url('assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ url('assets/plugins/c3-master/c3.min.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{ url('assets/plugins/toast-master/js/jquery.toast.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ url('assets/plugins/dashboard1.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ url('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ url('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ url('assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

    
    <script type="text/javascript">
        $('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();
    </script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
         toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }

        @if($errors->any())

            @foreach($errors->all() as $error)
                toastr["error"]('{{$error}}') 
            @endforeach

        @endif

        @if(session('success'))
            toastr["success"]('{!!session("success")!!}');
        @endif

        @if(session('error'))
            toastr["error"]('{{session("error")}}')       
        @endif

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
        if (window.location.href.indexOf("dashboard2?") > -1) {
            $( "#dash_activate" ).addClass( "active" );
        }
        });

        // For select 2
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    </script>

    @stack('scripts')
</body>


</html>































