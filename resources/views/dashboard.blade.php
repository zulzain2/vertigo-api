@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
{{dd(url(''))}}
<!-- dashboard body -->
<div style="background:#E5E5E5;height: 94%;overflow:hidden">
    <!-- dashboard header -->
    <div style="margin-left: 4%;margin-top:2%;color: black">
        <div class="row">
            <div class="col-md-3">
                <span><b>1) Select Staff</b></span>
            </div>
            <div class="col-md-3" style="margin-left: 1%;">
                <span><b>2) Select Module</b></span>

            </div>
            <div class="col-md-3" style="margin-left: 1%;">
                <span><b>3) Select Month</b></span>

            </div>
        </div>
    </div>
    <!-- dashboard header dropdown -->
    <div style="margin-left: 4.5%;margin-top:1%">
        <div class="row">
            <!-- select staff -->
            <div class="col-md-3" >
                <div class="dropdown" style="margin-left: -3%;">
                    <button class="btn btn-secondary dropDownCustom" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ url('/img/team2.jpg') }}" alt="Circle image" class="img-fluid rounded-circle shadow" style="width: 20px;float:left">
                        <b style="overflow: hidden;width:40%;margin-left:8%;float:left">John</b>
                        <img src="{{ url('/img/playArrow.svg') }}" alt="" class="" style="width: 30px;float:left;margin-left:30%">

                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">
                            <img src="{{ url('/img/team2.jpg') }}" alt="Circle image" class="img-fluid rounded-circle shadow" style="width: 30px;float:left">
                            <b style="overflow: hidden;width:40%;margin-left:8%;float:left">josh</b>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img src="{{ url('/img/team2.jpg') }}" alt="Circle image" class="img-fluid rounded-circle shadow" style="width: 30px;float:left">
                            <b style="overflow: hidden;width:40%;margin-left:8%;float:left">Lucy</b>
                        </a>
                        <a class="dropdown-item" href="#">
                            <img src="{{ url('/img/team2.jpg') }}" alt="Circle image" class="img-fluid rounded-circle shadow" style="width: 30px;float:left">
                            <b style="overflow: hidden;width:40%;margin-left:8%;float:left">Adam</b>
                        </a>
                    </div>
                </div>
            </div>
            <!-- select module -->
            <div class="col-md-3" style="margin-left: 1.2%;">
                <div class="dropdown" style="margin-left: -3%;">
                    <button class="btn btn-secondary dropDownCustom" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b style="overflow: hidden;width:40%;margin-left:8%;float:left">Staff assignment</b>
                        <img src="{{ url('/img/playArrow.svg') }}" alt="" class="" style="width: 30px;float:left;margin-left:40%">

                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- select month -->
            <div class="col-md-3" style="margin-left: 1.2%;">
                <div class="dropdown" style="margin-left: -3%;">
                    <button class="btn btn-secondary dropDownCustom" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b style="overflow: hidden;width:40%;margin-left:8%;float:left">July 2019</b>
                        <img src="{{ url('/img/playArrow.svg') }}" alt="" class="" style="width: 30px;float:left;margin-left:40%">

                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">August 2019</a>
                        <a class="dropdown-item" href="#">Nov 2019</a>
                        <a class="dropdown-item" href="#">Dec 2019</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- button refresh and download -->
    <div style="margin-left: 4.5%;margin-top:5%;color: black">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-4" style="margin-left:1.7%;">
                <button class="btn btn-round mainColor" style="text-transform: none;width:30%">
                    <b class="mainFontColor" style="margin-right: 10%">Refresh</b>
                    <img src="{{ url('/img/refresh.svg') }}" alt="" class="" >
                </button>
                <button class="btn btn-round buttonDownloadBox" style="text-transform: none;width:42%">
                    <b class="mainFontColor" style="margin-right:5%">Export to Excel</b>
                    <img src="{{ url('/img/download.svg') }}" alt="" class="" style="margin-left:5%">
                </button>
            </div>
        </div>
    </div>
    <!-- created task box -->
    <div class="customCard cardHeight customGap">
        <div class="cardTitle">
            <b>Created Tasks</b>
            <img src="{{ url('/img/plusimage.svg') }}" alt="addtask" class="customIconImageSize1">
        </div>
        <div class=" taskNumberContent taskNumber contentColor"><b>15</b></div>
        <div class="taskWord contentColor"><b>tasks</b></div>
    </div>
    <!-- assigned task box -->
    <div class="customCard cardHeight gapTopSecondRow">
        <div class="cardTitle">
            <b>Assigned Tasks</b>
            <img src="{{ url('/img/send.svg') }}" alt="addtask" class="customIconImageSize4">
            <div class="taskNumberWord contentColor">34 assigned tasks</div>
            <div class="progress progressBarPosition">
                <div class="progress-bar progressColor" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
            </div>
            <div class="numberDesc">21</div>
            <div class="wordDesc">Total Registered Tasks</div>
        </div>
    </div>
    <!-- in waiting task box -->
    <div class="customCard cardHeight gapTopThirdRow">
        <div class="cardTitle">
            <b>In-waiting Tasks</b>
            <img src="{{ url('/img/clock.svg') }}" alt="addtask" class="customIconImageSize6">
            <div class=" taskNumberContent taskNumber contentColor"><b>15</b></div>
            <div class="taskWord contentColor"><b>tasks</b></div>
        </div>
    </div>
    <!-- completed task box -->
    <div class="customCard cardHeight customGap customGapLeft1">
        <div class="cardTitle">
            <b>Completed Tasks</b>
            <img src="{{ url('/img/checkSquare.svg') }}" alt="addtask" class="customIconImageSize2">
            <div class="taskNumberWord contentColor">15 completed tasks</div>
            <div class="progress progressBarPosition">
                <div class="progress-bar progressColor" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
            </div>
            <div class="numberDesc">21</div>
            <div class="wordDesc">Total Assigned Tasks</div>
        </div>
    </div>
    <!-- on going tasks box -->
    <div class="customCard cardHeight customGapLeft1 gapTopSecondRow">
        <div class="cardTitle">
            <b>On-going Tasks</b>
            <img src="{{ url('/img/edit.svg') }}" alt="addtask" class="customIconImageSize5">
            <div class="taskNumberWord contentColor">4 on-going tasks</div>
            <div class="progress progressBarPosition">
                <div class="progress-bar progressColor" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
            </div>
            <div class="numberDesc">21</div>
            <div class="wordDesc">Total Incomplete Tasks</div>
        </div>
    </div>
    <!-- recent activities box -->
    <div class="customCard customGap cardRecentActivity customGapLeft2">
        <div class="cardTitle cardTitleHeight">
            <b>Recent Activities</b>
            <img src="{{ url('/img/activity.svg') }}" alt="addtask" class="customIconImageSize3">
        </div>
        <div class="contentMainBox">
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
            <div class="contentBox">
                <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle shadow" style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                <div class="contentName"><b>Dexter</b></div>
                <div class="contentTime">26 minutes ago</div>
                <div class="contentDesc">Create new task in staff assignments</div>
            </div>
        </div>

        <div>
            <img src="{{ url('/img/scrollbutonActivity.svg') }}" alt="addtask" class="customIconImageSize3">
        </div>
    </div>
</div>
@endsection