<span class="label label-info">{{$mss->status}}</span>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Equipment</p>
    </div>
</div>
<div class="row">
    @foreach ($mss->mssequipment as $item)
        <div class="col-lg-4">
            <img src="{{URL::to(''.$item->equipment->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
            <br>
            <small>{{$item->equipment->name}}</small>
        </div>
    @endforeach
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Transport</p>
    </div>
</div>
<div class="row">
    @foreach ($mss->msstransport as $item)
        <div class="col-lg-4">
            <img src="{{URL::to(''.$item->transport->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
            <br>
            <small>{{$item->transport->name}}</small>
        </div>
    @endforeach
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Task</p>
            @foreach ($mss->msstask as $item)
                <p>{{$item->maintenanceTask->name}}</p>
            @endforeach            
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Job Title</p>
        <p>{{$mss->description}}</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Person In Charge</p>
    </div>
</div>
<div class="row">
    @foreach ($mss->msspic as $item)
        <div class="col-lg-4">
            <img src="{{URL::to(''.$item->user->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
            <br>
            <small>{{$item->user->name}}</small>
        </div>
    @endforeach
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Requestor</p>
    </div>
</div>
<div class="row">
   
        <div class="col-lg-4">
            <img src="{{URL::to(''.$mss->createdby->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
            <br>
            <small>{{$mss->createdby->name}}</small>
        </div>
</div>

<br>

<div class="row">
    <div class="col-lg-12">
        <p style="font-weight:bold;margin-bottom:0px">Maintenance Period</p>
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
        <small>{{date('j F Y' , strtotime($mss->start_date))}}</small>
        <br>
        <small>{{date('g:i a' , strtotime($mss->start_date))}}</small>
    </div>
    <div class="col-lg-6">
        <small>{{date('j F Y' , strtotime($mss->end_date))}}</small>
        <br>
        <small>{{date('g:i a' , strtotime($mss->end_date))}}</small>
    </div>
</div>
