<?php

namespace App\Http\Controllers\Api;

use App\EBS;
use App\MSS;
use App\TBS;
use App\User;
use App\MSSPic;
use App\MSSTask;
use App\Scheduler;
use App\DocumentLog;
use App\MSSEquipment;
use App\MSSTransport;
use App\Notification;
use Ramsey\Uuid\Uuid;
use App\SASStaffAssign;
use App\MaintenanceTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mss = MSS::all();

        return response(['status' => 'OK' , 'message' =>  $mss]); 
    }

    public function getMaintenanceTask()
    {
        $mt = MaintenanceTask::where('status' , '1')->get();

        return response(['status' => 'OK' , 'message' =>  $mt]); 
    }

    public function dashDate(Request $request)
    {

        $dateFrom = date($request->date_from);
        $dateTo = date($request->date_to);

        $mss = MSS::whereBetween('created_at', [$dateFrom, $dateTo])->get();

        return response(['status' => 'OK' , 'message' => $mss]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function addNewMaintenance(Request $request)
    {
        $request->validate([
            'start_date'                    => 'required',
            'start_time'                    => 'required',
            'end_date'                      => 'required', 
            'end_time'                      => 'required', 
            // 'equipment.*'                   => 'required', 
            // 'transport.*'                   => 'required', 
            'pic.*'                         => 'required',
            'task.*'                        => 'required',
        ]);
   
            $add = New MSS;
            $add->id = Uuid::uuid4()->getHex();
            $add->status = 'Created';
            $add->description = $request->description;
            $add->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
            $add->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
            $add->created_by = auth()->user()->id;
            $add->save();

            if($request->equipment)
            {
                foreach ($request->equipment as $key => $equipment) {
                    $add2 = New MSSEquipment;
                    $add2->id = Uuid::uuid4()->getHex();
                    $add2->id_equipment = $equipment;
                    $add2->id_mss = $add->id;
                    $add2->status = '';
                    $add2->created_by = auth()->user()->id;
                    $add2->save();
                }
            }
            if($request->transport)
            {
                foreach ($request->transport as $key => $transport) {
                    $add3 = New MSSTransport;
                    $add3->id = Uuid::uuid4()->getHex();
                    $add3->id_transport = $transport;
                    $add3->id_mss = $add->id;
                    $add3->status = '';
                    $add3->created_by = auth()->user()->id;
                    $add3->save();
                }
            }

            
            foreach ($request->task as $key => $task) {
                $add3 = New MSSTask;
                $add3->id = Uuid::uuid4()->getHex();
                $add3->id_task = $task;
                $add3->id_mss = $add->id;
                $add3->status = '';
                $add3->created_by = auth()->user()->id;
                $add3->save();
            }

            foreach ($request->pic as $key => $pic) {
                
                $add4 = New MSSPic;
                $add4->id = Uuid::uuid4()->getHex();
                $add4->id_user = $pic;
                $add4->id_mss = $add->id;
                $add4->status = '';
                $add4->created_by = auth()->user()->id;
                $add4->save();
               
                //NOTIFICATION FCM OTS
                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $pic;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc = 'You have been assigned to a new task';
                $noti->type = 'I';
                $noti->click_url = 'mss-acknowledge';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $add->id;
                $noti->created_by = auth()->user()->id;
                $noti->save();
    
                $user = User::find($pic);
                $noti->notificationFCM($user->device_token , $noti->title , $noti->desc , null , null , $noti->id_module , $noti->module);


                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user =  $user->id;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc =  'Have you started the maintenance?';
                $noti->type = 'I';
                $noti->click_url = 'mss-start';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $add->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = New Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime =   $add->start_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();

            }

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "MSS";
            $document->id_document 		=  $add->id;
            $document->remark 			= "Set New Maintenance Schedule";
            $document->status 			= "Created";
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully add new maintenance']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mss = MSS::find($id);

        return response(['status' => 'OK' , 'message' =>  $mss]); 
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date'                    => 'required',
            'start_time'                    => 'required',
            'end_date'                      => 'required', 
            'end_time'                      => 'required', 
            // 'equipment.*'                   => 'required', 
            // 'transport.*'                   => 'required', 
            'pic.*'                         => 'required',
            'task.*'                        => 'required',
        ]);

            $add = MSS::find($id);
            // $add->status = 'Created';
            $add->description = $request->description;
            $add->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
            $add->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
            $add->updated_by = auth()->user()->id;
            $add->save();

            foreach ($add->mssequipment as $key => $data) {
                $data->delete();
            }

            foreach ($add->msstransport as $key => $data2) {
                $data2->delete();
            }

            foreach ($add->msspic as $key => $data3) {
                $data3->delete();
            }

            foreach ($add->msstask as $key => $data4) {
                $data4->delete();
            }


            if($request->equipment)
            {
                foreach ($request->equipment as $key => $equipment) {
                    $add2 = New MSSEquipment;
                    $add2->id = Uuid::uuid4()->getHex();
                    $add2->id_equipment = $equipment;
                    $add2->id_mss = $add->id;
                    $add2->status = '';
                    $add2->created_by = auth()->user()->id;
                    $add2->save();
                }
            }

            if($request->transport)
            {
                foreach ($request->transport as $key => $transport) {
                    $add3 = New MSSTransport;
                    $add3->id = Uuid::uuid4()->getHex();
                    $add3->id_transport = $transport;
                    $add3->id_mss = $add->id;
                    $add3->status = '';
                    $add3->created_by = auth()->user()->id;
                    $add3->save();
                } 
            }
            

            foreach ($request->task as $key => $task) {
                $add3 = New MSSTask;
                $add3->id = Uuid::uuid4()->getHex();
                $add3->id_task = $task;
                $add3->id_mss = $add->id;
                $add3->status = '';
                $add3->created_by = auth()->user()->id;
                $add3->save();
            }

            foreach ($request->pic as $key => $pic) {
                
                $add4 = New MSSPic;
                $add4->id = Uuid::uuid4()->getHex();
                $add4->id_user = $pic;
                $add4->id_mss = $add->id;
                $add4->status = '';
                $add4->created_by = auth()->user()->id;
                $add4->save();

                //NOTIFICATION FCM OTS
                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $pic;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc = 'You have been assigned to a new task';
                $noti->type = 'I';
                $noti->click_url = 'mss-acknowledge';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $add->id;
                $noti->created_by = auth()->user()->id;
                $noti->save();
    
                $user = User::find($pic);
                $noti->notificationFCM($user->device_token , $noti->title , $noti->desc , null , null , $noti->id_module , $noti->module);


                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user =  $user->id;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc =  'Have you started the maintenance?';
                $noti->type = 'I';
                $noti->click_url = 'mss-start';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $add->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = New Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime =   $add->start_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();

            }

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "MSS";
            $document->id_document 		=  $add->id;
            $document->remark 			= "Edit Maintenance Schedule";
            $document->status 			= "Created";
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully edit maintenance']);
    }

    public function getAvailableStaff($datefrom, $dateto)
    {
        $unavailableStaffs = MSS::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        $unavailableStaffsEBS = EBS::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        $unavailableStaffsTBS = TBS::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        $unavailableStaffsSAS = SASStaffAssign::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        $availableStaffs = array();
        $staffs = User::all();

        if (count($unavailableStaffs) == 0) {
            $i = 1;
            foreach ($staffs as $key => $staff) {

                $availableStaffs[] = [

                    "id"                    => $staff->id,
                    "name"                  => $staff->name,
                    "email"                 => $staff->email,
                    "email_verified_at"     => $staff->email_verified_at,
                    "created_at"            => $staff->created_at,
                    "updated_at"            => $staff->updated_at,
                    "status"                => $staff->status,
                    "availability"          => $staff->availability,
                    "id_role"               => $staff->id_role,
                    "id_position"           => $staff->id_position,
                    "id_department"         => $staff->id_department,
                    "id_access_role"        => $staff->id_access_role,
                    "id_access_position"    => $staff->id_access_position,
                    "last_log_web"          => $staff->last_log_web,
                    "last_log_mobile"       => $staff->last_log_mobile,
                    "created_by"            => $staff->created_by,
                    "updated_by"            => $staff->updated_by,
                    "device_token"          => $staff->device_token,
                    "img_name"              => $staff->img_name,
                    "img_path"              => $staff->img_path,
                    "staff_id"              => $staff->staff_id,
                    "first_name"            => $staff->first_name,
                    "last_name"             => $staff->last_name,
                    "id_inquiry"            => $staff->id_inquiry,


                ];

            
                $i++;
            }
        } else {
            $i = 1;
            foreach ($staffs as $key => $staff) {

                $availableStaffs[] = [
                    "id"                    => $staff->id,
                    "name"                  => $staff->name,
                    "email"                 => $staff->email,
                    "email_verified_at"     => $staff->email_verified_at,
                    "created_at"            => $staff->created_at,
                    "updated_at"            => $staff->updated_at,
                    "status"                => $staff->status,
                    "availability"          => $staff->availability,
                    "id_role"               => $staff->id_role,
                    "id_position"           => $staff->id_position,
                    "id_department"         => $staff->id_department,
                    "id_access_role"        => $staff->id_access_role,
                    "id_access_position"    => $staff->id_access_position,
                    "last_log_web"          => $staff->last_log_web,
                    "last_log_mobile"       => $staff->last_log_mobile,
                    "created_by"            => $staff->created_by,
                    "updated_by"            => $staff->updated_by,
                    "device_token"          => $staff->device_token,
                    "img_name"              => $staff->img_name,
                    "img_path"              => $staff->img_path,
                    "staff_id"              => $staff->staff_id,
                    "first_name"            => $staff->first_name,
                    "last_name"             => $staff->last_name,
                    "id_inquiry"            => $staff->id_inquiry,
                ];

                $i++;
            }

           

            $i = 1;
        
            foreach ($availableStaffs as $x => $availableStaff) {
                foreach ($unavailableStaffs as $y => $unavailableS) {
                    foreach ($unavailableS->msspic as $key => $unavailableStaff) {
                        if ($unavailableStaff->id_user == $availableStaffs[$x]['id']) {
                            $availableStaffs[$x]['id'] = '';
                        } else {

                        }
                    }
                        
                     
                }

                $i++;
            }

            $i = 1;
        
            foreach ($availableStaffs as $x => $availableStaff) {
                foreach ($unavailableStaffsEBS as $y => $unavailableSEBS) {
                    foreach ($unavailableSEBS->ebsstaffuse as $key => $unavailableStaffEBS) {
                        if ($unavailableStaffEBS->id_user == $availableStaffs[$x]['id']) {
                            $availableStaffs[$x]['id'] = '';
                        } else {

                        }
                    }
                        
                     
                }

                $i++;
            }


            $i = 1;
        
            foreach ($availableStaffs as $x => $availableStaff) {
                foreach ($unavailableStaffsTBS as $y => $unavailableSTBS) {
                    foreach ($unavailableSTBS->tbsdriver as $key => $unavailableStaffTBS) {
                        if ($unavailableStaffTBS->id_user == $availableStaffs[$x]['id']) {
                            $availableStaffs[$x]['id'] = '';
                        } else {

                        }
                    }
                        
                     
                }

                $i++;
            }


            $i = 1;
        
            foreach ($availableStaffs as $x => $availableStaff) {
                foreach ($unavailableStaffsSAS as $y => $unavailableStaffSAS) {
                  
                        if ($unavailableStaffSAS->id_user == $availableStaffs[$x]['id']) {
                            $availableStaffs[$x]['id'] = '';
                        } else {

                        }
                    
                }

                $i++;
            }

          
            foreach ($availableStaffs as $key => $availableStaff) {
                if ($availableStaffs[$key]['id'] == '') {
                    unset($availableStaffs[$key]);
                }
            }

            
        }

        $availableStaffs = array_values($availableStaffs);
        
        

        return response(['status' => 'OK', 'staffs' => $availableStaffs]);
        
    }
    

    public function acknowledge($id_mss)
    {
        $mss = MSS::find($id_mss);

        $mss->status = "Acknowledge";
        $mss->acknowledge_status = '1';
        $mss->acknowledge_by = auth()->user()->id;
        $mss->updated_by = auth()->user()->id;
        $mss->save();

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "MSS";
        $document->id_document 		=  $mss->id;
        $document->remark 			= "Acknowledge Maintenance Schedule";
        $document->status 			= "Acknowledge";
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

        return response(['status' => 'OK' , 'message' => 'Successfully acknowledge task']);
    }


    public function startMaintenance(Request $request , $id_mss)
    {
        $mss = MSS::find($id_mss);

        $request->validate([
            'start_task'        => 'required',
        ]);

        if ($request->start_task == 'Yes') 
        {
            $mss->status = "Task Start";
            $mss->start_task = $request->start_task;
            $mss->updated_by = auth()->user()->id;
            $mss->save();

            foreach ($mss->msspic as $key => $pic) {

               //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user =  $pic->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc =  'Have you finish the maintenance?';
                $noti->type = 'I';
                $noti->click_url = 'mss-end';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $mss->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = New Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime =   $mss->start_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();
            }
            

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "MSS";
            $document->id_document 		=  $mss->id;
            $document->remark 			= "Start Maintenance Schedule";
            $document->status 			= "Task Start";
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully start maintenance task']);
        } 
        elseif ($request->start_task == 'No') 
        {
            $request->validate([
                'justification_start'        => 'required',
                'start_date'                 => 'required',
                'start_time'                 => 'required',
            ]);

            $mss->start_task = $request->start_task;
            $mss->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
            $mss->justification_start = $request->justification_start;
            $mss->updated_by = auth()->user()->id;
            $mss->save();

            foreach ($mss->msspic as $key => $pic) {
                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user = $pic->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc =  'Have you started the maintenance?';
                $noti->type = 'I';
                $noti->click_url = 'mss-start';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $mss->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = New Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime = $mss->start_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();
            }
           

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "MSS";
            $document->id_document 		=  $mss->id;
            $document->remark 			= "Set a new start date for Maintenance Schedule";
            $document->status 			= $mss->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully extend start maintenance task']);
        }

    }

    public function updateProgress(Request $request , $id_mss)
    {
        $request->validate([
            'task_progress'             => 'required',
            'justification_update'      => 'required',
        ]);

        $mss = MSS::find($id_mss);
        $mss->task_progress = $request->task_progress;
        $mss->justification_update = $request->justification_update;
        $mss->status = $request->task_progress;
        $mss->save();

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "MSS";
        $document->id_document 		= $mss->id;
        $document->remark 			= "Maintenance Schedule Progress Updated";
        $document->status 			= $mss->status;
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

        return response(['status' => 'OK' , 'message' => 'Successfully update maintenance task progress']);

    }

    public function endMaintenance(Request $request , $id_mss)
    {
        $mss = MSS::find($id_mss);

        $request->validate([
            'finish_task'        => 'required',
        ]);

        if ($request->finish_task == 'Yes') 
        {
            $mss->status = "Finish";
            $mss->finish_task = $request->finish_task;
            $mss->updated_by = auth()->user()->id;
            $mss->save();

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "MSS";
            $document->id_document 		= $mss->id;
            $document->remark 			= "Maintenance Schedule Ended";
            $document->status 			= $mss->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully end maintenance']);
        } 
        elseif ($request->finish_task == 'No') 
        {
            $request->validate([
                'justification_finish'        => 'required',
                'end_date'                    => 'required',
                'end_time'                    => 'required',
            ]);

            $mss->finish_task = $request->finish_task;
            $mss->justification_finish = $request->justification_finish;
            $mss->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
            $mss->updated_by = auth()->user()->id;
            $mss->save();

            foreach ($mss->msspic as $key => $pic) {
                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user = $pic->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc =  'Have you finish the maintenance?';
                $noti->type = 'I';
                $noti->click_url = 'mss-end';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'mss';
                $noti->id_module = $mss->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = New Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime = $mss->end_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();
            }

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "MSS";
            $document->id_document 		= $mss->id;
            $document->remark 			= "Set a New End Date for Maintenance Schedule";
            $document->status 			= $mss->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully extend end maintenance task']);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
