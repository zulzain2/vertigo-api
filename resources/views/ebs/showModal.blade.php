<span class="label label-info">{{$ebs->status}}</span>
<br><br>
<div class="row">
    @foreach ($ebs->ebsequipmentuse as $item)
        <div class="col-lg-2">
            <img src="{{URL::to(''.$item->equipment->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
            <br>
            <small>{{$item->equipment->name}}</small>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-12">
        
     
        <p style="font-weight:bold">Tag Number : <span class="label label-info">{{$ebs->tag_number}}</span></p> 
     
        <p style="font-weight:bold">Job Number :  <span class="label label-info">{{$ebs->job_number}}</span></p>

        <p style="font-weight:bold">Job Title :  {{$ebs->job_title}}</p>
        

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
                <small>{{date('j F Y' , strtotime($ebs->start_date))}}</small>
                <br>
                <small>{{date('g:i a' , strtotime($ebs->start_date))}}</small>
            </div>
            <div class="col-lg-6">
                <small>{{date('j F Y' , strtotime($ebs->end_date))}}</small>
                <br>
                <small>{{date('g:i a' , strtotime($ebs->end_date))}}</small>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <p style="font-weight:bold">Person In Use</p>
            </div>
        </div>
        <div class="row">
            @foreach ($ebs->ebsstaffuse as $item)
                <div class="col-lg-2">
                    <img src="{{URL::to(''.$item->user->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
                    <br>
                    <small>{{$item->user->first_name}}</small>
                </div>
            @endforeach
        </div>
  
    </div>
</div>
