<span class="label label-info">{{$tms->status}}</span>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Client Name</p>
     
        {{$tms->client_name}}
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">VTSB Job Number</p>
     
        {{$tms->vtsb_num}}
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-6">
        <small style="font-weight:bold">Site Visit Date</small>
    </div>
    <div class="col-lg-6">
        <small style="font-weight:bold">Closing date</small>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <small>{{date('j F Y' , strtotime($tms->sitevisit_start_date))}}</small>
        <br>
        <small>{{date('g:i a' , strtotime($tms->sitevisit_start_date))}}</small>
    </div>
    <div class="col-lg-6">
        <small>{{date('j F Y' , strtotime($tms->sitevisit_end_date))}}</small>
        <br>
        <small>{{date('g:i a' , strtotime($tms->sitevisit_end_date))}}</small>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <p style="margin-bottom:0px;font-weight:bold">Type of Inquiry</p>
     
        {{$tms->inquiry->name}}
    </div>
</div>
<br>
