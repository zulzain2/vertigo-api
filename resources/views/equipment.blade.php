@extends('layouts.app')
@section('title', 'Equipment System')
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
            <!-- dropdown -->
            <div class="dropdown  calendarDropDown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Daily
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <!-- calendar icon -->
            <div class=" calendarIcon">
                <img src="{{url('/vector/calendar.svg')}}">
            </div>
        </div>
        <div class=" timelineScroll">
            <!-- timeline -->
            <div class=" timeline">
                <div style="width:100%;height:13.5%;">
                </div>
                <div class="timelineSmallBox">
                    <b>7:00 am</b>
                </div>
                <div class="timelineSmallBox">
                    <b>7:30 am</b>
                </div>
                <div class="timelineSmallBox">
                    <b> 8:00 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b>8:30 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b> 9:00 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b> 9:30 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b> 10:00 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b> 10:30 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b>11:00 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b>11:30 am </b>
                </div>
                <div class="timelineSmallBox">
                    <b>12:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>12:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>1:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>1:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>2:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>2:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>3:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>3:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>4:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>4:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>5:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>5:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>6:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>6:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>7:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>7:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>8:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>8:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>9:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>9:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>10:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>10:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>11:00 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>11:30 pm </b>
                </div>
                <div class="timelineSmallBox">
                    <b>12:00 pm </b>
                </div>
            </div>
            <!-- first column first user -->
            <div class="timelineTask">
                <div style="width:100%;height:3.8%">
                    <img src="{{ url('/vector/ipad.svg') }}" alt="refresh" class="img-fluid rounded-circle  userTask">
                    <div class="taskRowName"><b>AT11</b></div>
                </div>
                <div class=" task1 bgColorPink">
                    <div class=" taskHeader">
                        <div class="taskCode">
                            <b> 0048 </b>
                        </div>
                        <div class="dots">
                            <i class="fa fa-ellipsis-h"></i>
                        </div>
                        <div class=" taskTitle">
                            <b> System Enhancement </b>
                        </div>
                        <div class="taskContent">
                            <div class="personInUse"> Person in use : </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>JOsh</b></p>
                            </div>
                        </div>
                        <div class=" taskOwner bgCOlorDarkRed">
                            <b>Dexter</b>
                        </div>
                    </div>
                </div>
                <div class=" task2  bgColorGreen">
                    <div class=" taskHeader">
                        <div class="taskCode">
                            <b> 0048 </b>
                        </div>
                        <div class="dots">
                            <i class="fa fa-ellipsis-h"></i>
                        </div>
                        <div class=" taskTitle">
                            <b> system fix </b>
                        </div>
                        <div class="  taskContent">
                            <div class="personInUse"> Person in use : </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                        </div>
                        <div class=" taskOwner bgColorLightGreen">
                            <b>Dexter</b>
                        </div>
                    </div>
                </div>
            </div>
            <!-- second column second user -->
            <div class="timelineTask">
                <div style="width:100%;height:3.8%">
                    <img src="{{ url('/vector/ipad.svg') }}" alt="refresh" class="img-fluid rounded-circle  userTask">
                    <div class="taskRowName"><b>AT11</b></div>
                </div>
                <div class=" task3  bgColorOrange">
                    <div class=" taskHeader">
                        <div class="taskCode">
                            <b> 0048 </b>
                        </div>
                        <div class="dots">
                            <i class="fa fa-ellipsis-h"></i>
                        </div>
                        <div class=" taskTitle">
                            <b> system fix </b>
                        </div>
                        <div class=" taskContent">
                            <div class="personInUse"> Person in use : </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                        </div>
                        <div class=" taskOwner bgCOlorYellow">
                            <b>Dexter</b>
                        </div>
                    </div>
                </div>
            </div>
            <!-- third column third user -->
            <div class="timelineTask">
                <div style="width:100%;height:3.8%">
                    <img src="{{ url('/vector/ipad.svg') }}" alt="refresh" class="img-fluid rounded-circle  userTask">
                    <div class="taskRowName"><b>AT11</b></div>
                </div>
                <div class=" task4 bgColorBlue">
                    <div class=" taskHeader">
                        <div class="taskCode">
                            <b> 0048 </b>
                        </div>
                        <div class="dots">
                            <i class="fa fa-ellipsis-h"></i>
                        </div>
                        <div class=" taskTitle">
                            <b> system fix </b>
                        </div>
                        <div class=" taskContent">
                            <div class="personInUse"> Person in use : </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                        </div>
                        <div class=" taskOwner bgColorLightBlue">
                            <b>Dexter</b>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fourth column fourth user -->
            <div class="timelineTask">
                <div style="width:100%;height:3.8%">
                    <img src="{{ url('/vector/ipad.svg') }}" alt="refresh" class="img-fluid rounded-circle  userTask">
                    <div class="taskRowName"><b>AT11</b></div>

                </div>
                <div class=" task4 bgColorGreen">
                    <div class=" taskHeader">
                        <div class="taskCode">
                            <b> 0048 </b>
                        </div>
                        <div class="dots">
                            <i class="fa fa-ellipsis-h"></i>
                        </div>
                        <div class=" taskTitle">
                            <b> system fix </b>
                        </div>
                        <div class=" taskContent">
                            <div class="personInUse"> Person in use : </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                            <div class="iconPersonBox">
                                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle  iconPerson">
                                <p class="iconPersonName"><b>Josh</b></p>
                            </div>
                        </div>
                        <div class=" taskOwner bgColorLightGreen">
                            <b>Dexter</b>
                        </div>
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
                    <img src="{{ url('/vector/ipad.svg') }}" alt="refresh" class=" img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>

                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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
                    <img src="{{ url('/vector/macbook.svg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                </div>
                <div class=" contentSubBox ">
                    <div class=" contentNameRecentBooking"><b>iPad Pro</b></div>
                    <div class=" recentBookingCodeBox">
                        <div class="recentBookingCode"><b>AT11</b></div>
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