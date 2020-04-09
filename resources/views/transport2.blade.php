@extends('layouts.app')

@push('styles')
    
@endpush

@section('content')



<div class="row" style="padding-bottom:20px;padding-top:20px">
  <div class="col-lg-12">
    <h3><strong>Transport Booking System</strong></h3>
  </div>
</div>

<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">

          <div class="row">
            <div class="col-lg-6">
              <h4 class="card-title" style="font-weight:bold">Calendar</h4>
            </div>
            <div class="col-lg-6 text-right">
              <img src="{{URL::to('vector/calendar.svg')}}">
            </div>
          </div>
        
          <div id='calendar' style="padding:20px"></div>

      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

              <div class="row">
                <div class="col-lg-6">
                  <h4 class="card-title" style="font-weight:bold">Comment</h4>
                </div>
                <div class="col-lg-6 text-right">
                  <img src="{{URL::to('vector/bell.svg')}}">
                </div>
              </div>
        
              <div class="row">
                <div class="col-lg-12">
                  <h6 class="card-title  text-muted" style="font-weight:bold">No Comment Yet</h6>
                </div>
              </div>
              
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

            <div class="row">
              <div class="col-lg-6">
                <h4 class="card-title" style="font-weight:bold">Recent Activities</h4>
              </div>
              <div class="col-lg-6 text-right">
                <img src="{{URL::to('img/activity.svg')}}">
              </div>
            </div>
           
            @if (count($documentLogs) > 0)
              @foreach ($documentLogs as $log)
                  
              @endforeach
            @else
            <br><br><br>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 text-center">
                    <img src="{{asset('img/no_log.png')}}" style="height:100%;width:100%;">
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 style='width:100%;font-weight:bold'>No Activity Yet</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p style='width:100%;' class="text-muted">Once activities has been create. It will appear here.</p>
                </div>
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection

@push('scripts')
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      defaultDate: '2020-02-12',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      eventColor: '#ef5350',
      events: [
        {
          title: 'All Day Event',
          start: '2020-02-01',
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