@extends('layouts.app')
@section('title', 'Tender System')
@section('content')
<div style="background:#E5E5E5;height: 94%;overflow:hidden;">
    <!-- calendar drop down -->
    <div style="margin-left: 2%;margin-top:1%">
        <div class="dropdown">
            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:155%;text-transform:none;text-align:left;">
                July 2019
                <img src="{{ url('/img/playArrow.svg') }}" alt="" class="" style="width: 30px;float:right;margin-left:40%">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">August 2019</a>
                <a class="dropdown-item" href="#">Sept 2019</a>
                <a class="dropdown-item" href="#">Nov 2019</a>
            </div>
        </div>
    </div>
    <!-- calendar box -->
    <div class="fixBorder calendarBox sasBgColor">
        <!-- calendar box header -->
        <div class="headerBox">
            <!-- calendar title -->
            <div class="calendarTitle">
                <b>Calendar</b>
            </div>
            <!-- calendar time -->
            <div class=" calendarTime">
                <ul class="calendarul">
                    <li class="calendarli"><a href=""> <img src="{{url('/vector/arrowLeft.svg')}}"></a></li>
                    <li class="calendarli"><a href="#">Tuesday, 16 July 2019</a></li>
                    <li class="calendarli"><a href=""> <img src="{{url('/vector/arrowRight.svg')}}"> </a></li>
                </ul>

            </div>
            <!-- calendar icon -->
            <div class=" calendarIcon">
                <img src="{{url('/vector/calendar.svg')}}">
            </div>
        </div>
        <div class="wrapTenderBox ">
            <div class="tenderDateBox ">
                <div class=" tenderDummyBox">
                </div>
                <div class=" tenderSingleDateBox">
                    <b>1 July </b>
                </div>
                <div class=" tenderSingleDateBox">
                    <b>2 July </b>
                </div>
                <div class=" tenderSingleDateBox">
                    <b>3 July </b>
                </div>
                <div class=" tenderSingleDateBox">
                    <b>4 July </b>
                </div>
                <div class=" tenderSingleDateBox">
                    <b>5 July </b>
                </div>
                <div class=" tenderSingleDateBox">
                    <b>6 July </b>
                </div>
            </div>
            <div>
                <img src="{{ url('/img/scrollbutonActivity.svg') }}" alt="addtask" class="">
            </div>
        </div>

        <div class="scrollmenu">
            <div class="scrollmenuBox">
                <div class=" tenderDummyBox">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="tenderIcon"><br>
                    <div class=" tenderIconNumber">

                        <b>JHA 2344</b>
                    </div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>TM MALAYSIAS</b></div>
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>MAXIS</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>TM MALAYSIAS</b></div>
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>MAXIS</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>TM MALAYSIAS</b></div>
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>MAXIS</b></div>
                    <div class="tenderSmallTask bgColorBlue fontColorWhite"> <b>SITE VISIT</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorRed fontColorWhite"> <b>Maxis</b></div>
                </div>

            </div>
            <div class="scrollmenuBox">
                <div class=" tenderDummyBox">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="tenderIcon"><br>
                    <div class="tenderIconNumber">

                        <b>JHA 2344</b>
                    </div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>Erricson</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>Erricson</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>Erricson</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorRed fontColorWhite"> <b>Erricson</b></div>
                </div>
            </div>
            <div class="scrollmenuBox">
                <div class=" tenderDummyBox">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="tenderIcon"><br>
                    <div class="tenderIconNumber">

                        <b>JHA 2344</b>
                    </div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>Axiata</b></div>
                    <div class="tenderSmallTask bgColorBlue fontColorWhite"> <b>Site Visit</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorRed fontColorWhite"> <b>Axiata</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorBlue fontColorWhite"> <b>Site Visit</b></div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorBlue fontColorWhite"> <b>Site Visit</b></div>
                </div>
            </div>
            <div class="scrollmenuBox">
                <div class=" tenderDummyBox">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="tenderIcon"><br>
                    <div class="tenderIconNumber">

                        <b>JHA 2344</b>
                    </div>
                </div>
                <div class="tenderTaskTitle">
                    <div class="tenderSmallTask bgColorPink fontColorBlack"> <b>Axiata</b></div>
                    <div class="tenderSmallTask bgColorBlue fontColorWhite"> <b>Site Visit</b></div>
                </div>
            </div>
            <div class="scrollmenuBox">
                <div class=" tenderDummyBox">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="tenderIcon"><br>
                    <div class="tenderIconNumber">

                        <b>JHA 2344</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- comment box -->
    <div class="fixBorder commentBox sasBgColor">
        <div style="height:15%;padding-top:2%">
            <!-- box header -->
            <div class="commentTitle">
                <b>Comment</b>
                <img src="{{ url('/vector/bell.svg') }}" alt="addtask" class="customIconImageSize8">
            </div>
        </div>
        <div style="margin-top:10%;margin-left:8%;">
            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 50px;margin-left:3%;float:left;margin-top:3%">
            <div class=" commentName"><b>Britney</b></div>
            <div class=" commentTime">
                1 hour ago
            </div>
            <div class=" commentDesc">
                Login system got problem
            </div>
        </div>

    </div>
    <!-- recent booking -->
    <div class="fixBorder recentActivitySASBox sasBgColor">
        <div style="height:15%;padding-top:2%">
            <div class="boxtitle">
                <b>Recent Bookings</b>
                <img src="{{ url('/img/activity.svg') }}" alt="addtask" class="customIconImageSize7">
            </div>
        </div>
        <div class="contentMainBox">
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class=" img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>

                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>TM Malaysia</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>JHA 2337</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Maxis</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Erricson</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Axiata</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>1 hour ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Petronas</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>59 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Telekom</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Maxis</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Maxis</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
            <div class=" contentBoxRecentBooking">
                <div class="  contentRecentBookingIcon">
                    <img src="{{ url('/vector/layoutIcon.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>Maxis</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>WEF 4456</b></div>
                    </div>
                    <div class=" contentDescRecentBooking">
                        Booking started
                    </div>
                </div>
                <div class=" contentTimeBox">
                    <b>26 minutes ago</b>
                </div>
            </div>
        </div>
        <div>
            <img src="{{ url('/img/scrollbutonActivity.svg') }}" alt="addtask" class="customIconImageSize3">
        </div>
    </div>
</div>
@endsection