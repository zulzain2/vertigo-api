@extends('layouts.app')

@push('styles')
    
@endpush

@section('content')

<div class="row" style="padding-bottom:20px;padding-top:20px">
    <div class="col-lg-12">
        <h3><strong>Dashboard</strong></h3>
    </div>
</div>

{!! Form::open(['action' => 'DashboardController@searchDashboard', 'method' => 'POST','class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
@csrf

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <h4><strong>1) Select Staff</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <select id="id_staff" name="id_staff" class="form-control custom-select" style="font-weight: bold;background-color: #ffffff;border-color: #f4f5f7;box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);">
                            @if(isset($user))
                                <option value="{{$user->id}}">{{$user->name}}</option>  
                            @else
                                <option value="">-- Select Staff --</option>
                            @endif
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <h4><strong>2) Select Module</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <select id="module" name="module" class="form-control custom-select" style="font-weight: bold;background-color: #ffffff;border-color: #f4f5f7;box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);">
                            @if(isset($module) && isset($moduleName))
                                <option value="{{$module}}">{{$moduleName}}</option>  
                            @else
                                <option value="">-- Select Module --</option>
                            @endif
                            
                            <option value="sas">Staff Assignment System</option>
                            <option value="ebs">Equipment Booking System</option>
                            <option value="tbs">Transport Booking System</option>
                            <option value="mss">Maintenance Schedule System</option>
                            <option value="tms">Tender Management System</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <h4><strong>3) Select Month</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <select id="month" name="month" class="form-control custom-select" style="font-weight: bold;background-color: #ffffff;border-color: #f4f5f7;box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);">
                            @if (isset($month) && isset($monthName))
                                <option value="{{$month}}">{{$monthName}}</option>
                            @else
                                <option value="">-- Select Month --</option>
                            @endif
                            
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn waves-effect waves-light btn-danger" style="border-radius: 10px;"><i class="fas fa-search"></i> GO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="row" >
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>

        <div class="row" style="padding-bottom:20px;">
            <div class="col-lg-4">
            
                
            </div>
            
            <div class="col-lg-4">
                
            </div>
        
            <div class="col-lg-3">
               
            </div>
            <div class="col-lg-1" style="padding:0px">
               
            </div>
        </div>

{!! Form::close() !!}

{{-- <div class="row" style="padding-bottom:20px">
    <div class="col-lg-12 text-right">

        <button type="button" class="btn waves-effect waves-light btn-danger" style="border-radius: 10px;"><i class="fas fa-redo-alt"></i> Refresh</button>
        <button type="button" class="btn waves-effect waves-light btn-inverse" style="border-radius: 10px;"><i class="fas fa-cloud-download-alt"></i> Export To Excel</button>

    </div>
</div> --}}

<br>

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-6" >

                <div class="card"  >
                    <div class="card-body" >
              
                        <div class="row">
                          <div class="col-lg-6">
                            <h4 class="card-title" style="font-weight:bold">Created Task</h4>
                          </div>
                          <div class="col-lg-6 text-right">
                            <img src="{{URL::to('img/plusimage.svg')}}">
                          </div>
                        </div>
                      
                        <div class="row" style="padding-top:30px;padding-bottom:30px">
                            <div class="col-lg-12 text-center">
                                <h1 class="text-danger"><strong>{{isset($createdTasks) ? count($createdTasks) : 'N/A'}}</strong></h1>
                                <small class="text-danger"><strong>Tasks</strong></small>
                            </div>
                        </div>
                        
              
                    </div>
                  </div>

              </div>
         
            <div class="col-lg-6"  >

                <div class="card"  >
                    <div class="card-body" >
              
                        <div class="row">
                          <div class="col-lg-6">
                            <h4 class="card-title" style="font-weight:bold">Completed Task</h4>
                          </div>
                          <div class="col-lg-6 text-right">
                            <img src="{{URL::to('img/checkSquare.svg')}}">
                          </div>
                        </div>
                      
                        <div class="row" style="padding-top:30px;padding-bottom:10px">
                            <div class="col-lg-12">
                                <h5 class="text-danger"><strong>{{isset($completedTasks) ? count($completedTasks) : 'N/A'}} Completed Tasks</strong></h5>
                                <div class="progress m-t-0">
                                    <div class="progress-bar bg-danger active progress-bar-striped" style="width: 80%; height:14px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <h5 class=""><strong>{{isset($totalAssignedTask) ? count($totalAssignedTask) : 'N/A'}}</strong></h5>
                                <h5 class="text-muted"><strong>Total Assigned Tasks</strong></h5>
                            </div>
                        </div>
                        
                       
              
                    </div>
                  </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
              
                        <div class="row">
                          <div class="col-lg-6">
                            <h4 class="card-title" style="font-weight:bold">Assigned Task</h4>
                          </div>
                          <div class="col-lg-6 text-right">
                            <img src="{{URL::to('img/send.svg')}}">
                          </div>
                        </div>
                      
                        <div class="row" style="padding-top:30px;padding-bottom:10px">
                            <div class="col-lg-12">
                                <h5 class="text-danger"><strong>{{isset($totalAssignedTask) ? count($totalAssignedTask) : 'N/A'}} Assigned Tasks</strong></h5>
                                <div class="progress m-t-0">
                                    <div class="progress-bar bg-danger active progress-bar-striped" style="width: 80%; height:14px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <h5 class=""><strong>{{isset($totalRegisteredTasks) ? count($totalRegisteredTasks) : 'N/A'}}</strong></h5>
                                <h5 class="text-muted"><strong>Total Registered Tasks</strong></h5>
                            </div>
                        </div>
                        
              
                    </div>
                  </div>

            </div>
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
              
                        <div class="row">
                          <div class="col-lg-6">
                            <h4 class="card-title" style="font-weight:bold">On-going Tasks</h4>
                          </div>
                          <div class="col-lg-6 text-right">
                            <img src="{{URL::to('img/edit.svg')}}">
                          </div>
                        </div>
                      
                        <div class="row" style="padding-top:30px;padding-bottom:10px">
                            <div class="col-lg-12">
                                <h5 class="text-danger"><strong>{{isset($ongoingTasks) ? count($ongoingTasks) : 'N/A'}} On-Going Tasks</strong></h5>
                                <div class="progress m-t-0">
                                    <div class="progress-bar bg-danger active progress-bar-striped" style="width: 80%; height:14px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right">
                                <h5 class=""><strong>{{isset($totalIncompletes) ? count($totalIncompletes) : 'N/A'}}</strong></h5>
                                <h5 class="text-muted"><strong>Total Incomplete Tasks</strong></h5>
                            </div>
                        </div>
                        
              
                    </div>
                  </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
              
                        <div class="row">
                          <div class="col-lg-6">
                            <h4 class="card-title" style="font-weight:bold">In-waiting Tasks</h4>
                          </div>
                          <div class="col-lg-6 text-right">
                            <img src="{{URL::to('img/clock.svg')}}">
                          </div>
                        </div>
                      
                        <div class="row" style="padding-top:30px;padding-bottom:30px">
                            <div class="col-lg-12 text-center">
                                <h1 class="text-danger"><strong>{{isset($inwaitingTasks) ? count($inwaitingTasks) : 'N/A'}}</strong></h1>
                                <small class="text-danger"><strong>Tasks</strong></small>
                            </div>
                        </div>
                        
              
                    </div>
                  </div>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
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
                                        <div class="sl-left"> <img src="{{$log->user ? $log->user->img_path : ''}}" alt="user" class="img-circle"> </div>
                                        <div class="sl-right">
                                            <div><b style="font-weight: bold;">{{$log->user ? $log->user->name : ''}}</b>
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
@endsection

@push('scripts')
    
@endpush