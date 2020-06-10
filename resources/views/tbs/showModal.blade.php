<span class="label label-info">{{$tbs->status}}</span>
<br><br>
<div class="row">
    @foreach ($tbs->tbstransportuse as $item)
        <div class="col-lg-2">
            <img src="{{URL::to(''.$item->transport->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
            <br>
            <small>{{$item->transport->name}}</small>
        </div>
    @endforeach
</div>
<br>
<div class="row">
    <div class="col-lg-12">
     
        <p style="font-weight:bold">Job Number :  <span class="label label-info">{{$tbs->job_number}}</span></p>

        <p style="font-weight:bold">Job Title :  {{$tbs->job_title}}</p>
        
        <div class="row">
            <div class="col-lg-12">
                <p style="font-weight:bold;margin-bottom:0px">Booking Period</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <small style="font-weight:bold">Start Date</small>
            </div>
            <div class="col-lg-6">
                <small style="font-weight:bold">End Date</small>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <small>{{date('j F Y' , strtotime($tbs->start_date))}}</small>
                <br>
                <small>{{date('g:i a' , strtotime($tbs->start_date))}}</small>
            </div>
            <div class="col-lg-6">
                <small>{{date('j F Y' , strtotime($tbs->end_date))}}</small>
                <br>
                <small>{{date('g:i a' , strtotime($tbs->end_date))}}</small>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <p style="font-weight:bold">Drivers</p>
            </div>
        </div>
        <div class="row">
            @foreach ($tbs->tbsdriver as $item)
                <div class="col-lg-2">
                    <img src="{{URL::to(''.$item->driver->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
                    <br>
                    <small>{{$item->driver->first_name}}</small>
                </div>
            @endforeach
        </div>
    </div>
</div>