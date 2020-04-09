@extends('layouts.app')
@section('title', 'Staff Assignment System')
@section('content')
<div style="background:#E5E5E5;overflow:hidden;">

    <div class="row" style="height:100%">
        <div class="col-lg-8">
                <!-- calendar box -->
                <div class="fixBorder calendarBox sasBgColor" style="width:100%">
                    <!-- calendar box header -->
                    <div class="headerBox">
                        <!-- calendar title -->
                        <div class="calendarTitle">
                            <b>Calendar</b>
                        </div>
                        <br>
                        <div id='calendar' style="padding:20px"></div>

                    </div>
                </div>
        </div>
        <div class="col-lg-4" style="padding-right: 30px;">
                <!-- comment box -->
                <div class="fixBorder commentBox sasBgColor" style="width:100%;margin-left:0px">
                    <div style="padding-top:2%">
                        <div class="commentTitle">
                            <b>Comment</b>
                            <img src="{{ url('/vector/bell.svg') }}" alt="addtask" class="customIconImageSize8">
                        </div>
                    </div>
                    <div style="margin-top:10%;margin-left:8%;">
                        <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 50px;margin-left:3%;float:left;margin-top:3%">
                        <div class="commentName"><b>Britney</b></div>
                        <div class="commentTime">
                            1 hour ago
                        </div>
                        <div class="commentDesc">
                            Login system got problem
                        </div>
                    </div>

                </div>
                <!-- activity box -->
                <div class="fixBorder recentActivitySASBox sasBgColor" style="width:100%;margin-left:0px">
                    <div style="padding-top:2%">
                        <div class="boxtitle">
                            <b>Recent Activities</b>
                            <img src="{{ url('/img/activity.svg') }}" alt="addtask" class="customIconImageSize7">
                        </div>

                    </div>
                    <div class="contentMainBox">
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                        <div class="contentBox">
                            <img src="{{ url('/img/team2.jpg') }}" alt="refresh" class="img-fluid rounded-circle " style="width: 35px;margin-left:3%;float:left;margin-top:1%">
                            <div class="contentName"><b>Dexter</b></div>
                            <div class="contentTime">26 minutes ago</div>
                            <div class="contentDesc">Create new task </div>
                        </div>
                    </div>
                    <div>
                        <img src="{{ url('/img/scrollbutonActivity.svg') }}" alt="addtask" class="customIconImageSize3">
                    </div>
                </div>
        </div>
    </div>
   
   <br><br>
    
</div>
@endsection

@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
  
      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid' ],
        header: {
          left: 'prevYear,prev,next,nextYear today',
          center: 'title',
          right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },
        defaultDate: '2020-02-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
          {
            title: 'All Day Event',
            start: '2020-02-01'
          },
          {
            title: 'Long Event',
            start: '2020-02-07',
            end: '2020-02-10'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-02-09T16:00:00'
          },
          {
            groupId: 999,
            title: 'Repeating Event',
            start: '2020-02-16T16:00:00'
          },
          {
            title: 'Conference',
            start: '2020-02-11',
            end: '2020-02-13'
          },
          {
            title: 'Meeting',
            start: '2020-02-12T10:30:00',
            end: '2020-02-12T12:30:00'
          },
          {
            title: 'Lunch',
            start: '2020-02-12T12:00:00'
          },
          {
            title: 'Meeting',
            start: '2020-02-12T14:30:00'
          },
          {
            title: 'Happy Hour',
            start: '2020-02-12T17:30:00'
          },
          {
            title: 'Dinner',
            start: '2020-02-12T20:00:00'
          },
          {
            title: 'Birthday Party',
            start: '2020-02-13T07:00:00'
          },
          {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2020-02-28'
          }
        ]
      });
  
      calendar.render();
    });
  
  </script>
@endpush
