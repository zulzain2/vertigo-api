<div class="row">
    <div class="col-lg-4 text-center">
        <img src="{{URL::to(''.$sasas->user->img_path.'')}}" class="img-circle" width="100">
        <br>
        <strong style="font-weight:bold">{{$sasas->user->name}}</strong>
        <br>
        <small>{{$sasas->user->staff_id}}</small>
        <br>
        <small>{{$sasas->user->role->name}}</small>
    </div>
    <div class="col-lg-8">
        <span class="label label-info">{{$sasas->sas->job_number}}</span>
        <span class="label label-info">{{$sasas->status}}</span>
        <br>
        <p style="font-weight:bold">{{$sasas->sas->job_title}}</p>
       
        <p>{{$sasas->sas->job_description}}</p>

        
        <div class="row">
            <div class="col-lg-12">
                <p style="font-weight:bold;margin-bottom:0px">Project Period</p>
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
                <small>{{date('j F Y' , strtotime($sasas->start_date))}}</small>
                <br>
                <small>{{date('g:i a' , strtotime($sasas->start_date))}}</small>
            </div>
            <div class="col-lg-6">
                <small>{{date('j F Y' , strtotime($sasas->end_date))}}</small>
                <br>
                <small>{{date('g:i a' , strtotime($sasas->end_date))}}</small>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-lg-12">
                <p style="font-weight:bold">Others Person In Charge / Engineers under Same Task</p>
            </div>
        </div>
        <div class="row">
            
                @php
                    $count = 0;
                @endphp
                @foreach ($sasas->sas->sasstaffassign as $staff)
                    @if ($sasas->user->id == $staff->user->id)
                      
                    @else
                        @php
                            $count++;
                        @endphp
                       <div class="col-lg-3">
                        <img src="{{URL::to(''.$staff->user->img_path.'')}}" class="img-circle" style="width:48px;height:48px">
                        <br>

                        <small>{{$staff->user->first_name}}</small>
                        </div>
                    @endif
                    
                @endforeach
                @if ($count == 0)
                    <small>No PIC / Engineers</small>
                @endif
            
        </div>

    </div>
</div>