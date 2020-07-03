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
        
          {!! Form::open(['action' => 'DashboardController@searchTBS', 'method' => 'POST','class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
          @csrf

          <div class="row">
            <div class="col-lg-6">
              <table style="width:100%">
                <tr>
                  <td>
                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" id="transport" name="transport">
                      @if (isset($curr_transport))
                          <option value="{{$curr_transport->id}}">{{$curr_transport->name}}</option>
                      @else
                          <option value="">Select Transport</option>
                      @endif
                      
                      @foreach ($transports as $transport)
                        <option value="{{$transport->id}}">{{$transport->name}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <button type="submit" class="btn waves-effect waves-light btn-danger" style="border-radius: 10px;"><i class="fas fa-search"></i> GO</button>
                  </td>
                </tr>
              </table>
            </div>
          </div>

          {!! Form::close() !!}

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
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12 ps ps--theme_default ps--active-y" id="slimtest1" style="height: 580px;" data-ps-id="8db3e847-849b-2759-763b-e8592111f38d">
              <div class="profiletimeline">
                  @foreach ($documentLogs as $log)

                          <div class="sl-item">
                              <div class="sl-left"> <img src="{{$log->user ? $log->user->img_path : ""}}" alt="user" class="img-circle"> </div>
                              <div class="sl-right">
                                  <div><b style="font-weight: bold;">{{$log->user ? $log->user->name : ""}}</b>
                                      <span class="sl-date" style="float:right;font-weight: bold;">{{ Carbon\Carbon::parse($log->created_at)->diffForHumans()}} </span>
                                      <p class="m-t-10 text-muted" style="font-weight:500">{{$log->remark}}</p>
                                  </div>
                              </div>
                          </div>
                          <hr>
                  

                  @endforeach
              </div>
              <div class="ps__scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps__scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__scrollbar-y-rail" style="top: 0px; height: 250px; right: 0px;">
                <div class="ps__scrollbar-y" tabindex="0" style="top: 0px; height: 83px;"></div>
            </div>
          </div>
        </div>
      </div>
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

<!-- Event Modal -->
<div id="eventModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel" style="font-weight:bold">Transport Booking System (TBS) - Booking Detail</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
             
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@endsection

@push('scripts')
<script>

  document.addEventListener('DOMContentLoaded', function() {

    const events = @json($event);

    var calendarEl = document.getElementById('calendar');

    const tbsEvent = events.map(({
            start_date: start, 
            end_date: end, 
            job_title: title,
            id
    }, index)=>({
        start,
        end,
        title,
        id
    }))

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      eventColor: '#ef5350',
      events: tbsEvent,
      eventTimeFormat: { // like '14:30:00'
        hour: 'numeric',
        minute: '2-digit',
        meridiem: 'short'
      },
      eventClick: function({event: {start, end, title, id}, el}) {
            const eventModal = $('#eventModal')
            eventModal.modal('show')
            const modalbody = eventModal.find('.modal-body')
            modalbody.html("<div><div class='row'><div class='col-lg-12 text-center'><div class='lds-facebook'><div></div><div></div><div></div></div></div></div><div class='row'><div class='col-lg-12 text-center'><strong>Loading...</strong></div></div></div>");

            modalbody.load(`/tbs/${id}`, function( response, status, xhr ) {
              if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                modalbody.html( msg + xhr.status + " " + xhr.statusText );
              }

            });
         
        },

    });

    calendar.render();
  });

</script>

@endpush