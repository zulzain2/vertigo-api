<?php

namespace App\Http\Controllers\Api;

use App\TMS;
use App\Role;
use App\User;
use App\TMSPic;
use App\Scheduler;
use App\DocumentLog;
use App\InquiryType;
use App\Notification;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tms = TMS::all();

        return response(['status' => 'OK' , 'message' =>  $tms]); 
    }

    public function dashDate(Request $request)
    {

        $dateFrom = date($request->date_from);
        $dateTo = date($request->date_to);

        $tms = TMS::whereBetween('created_at', [$dateFrom, $dateTo])->get();

        return response(['status' => 'OK' , 'message' => $tms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function addNewInquiry(Request $request)
    {
        $request->validate([
            'client_name'               => 'required',
            'vtsb_num'                  => 'required',
            'sitevisit_start_date'      => 'required', 
            'sitevisit_end_date'        => 'required', 
            'sitevisit_start_time'      => 'required', 
            'sitevisit_end_time'        => 'required', 
            'id_inquiry'                => 'required',
        ]);

        $add = New TMS;
        $add->id = Uuid::uuid4()->getHex();
        $add->client_name = $request->client_name;
        $add->vtsb_num = $request->vtsb_num;
        $add->sitevisit_start_date = ''.date("Y-m-d", strtotime($request->sitevisit_start_date)).' '.date("H:i:s", strtotime($request->sitevisit_start_time)).'';
        $add->sitevisit_end_date = ''.date("Y-m-d", strtotime($request->sitevisit_end_date)).' '.date("H:i:s", strtotime($request->sitevisit_end_time)).'';
        $add->id_inquiry = $request->id_inquiry;
        $add->status = "Inquiry Created";
        $add->created_by = auth()->user()->id;
        $add->save();

        $inquiry = InquiryType::find($request->id_inquiry);

        foreach ($inquiry->user as $key => $user) {
            //NOTIFICATION FCM OTS
            $noti = New Notification;
            $noti->id = Uuid::uuid4()->getHex();
            $noti->to_user = $user->id;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Tender Management System]';
            $noti->desc = 'A new inquiry has been registered';
            $noti->type = 'I';
            $noti->click_url = '';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->module = 'tms';
            $noti->id_module = $add->id;
            $noti->created_by = auth()->user()->id;
            $noti->save();

            $to_staff = User::find($user->id);

            $noti->notificationFCM($to_staff->device_token , $noti->title , $noti->desc , null , null, $noti->id_module , $noti->module, $noti->id_module , $noti->module);

            
        }
       
            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "TMS";
            $document->id_document 		=  $add->id;
            $document->remark 			= "Submit New Submission in Tender Management System";
            $document->status 			= $add->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

        return response(['status' => 'OK' , 'message' => 'Successfully create inquiry']);
    }

    public function addNewSession(Request $request , $id_tms)
    {
        $request->validate([
            'pic.*'                  => 'required',
            'review_start_date'      => 'required', 
            'review_end_date'        => 'required', 
            'review_start_time'      => 'required', 
            'review_end_time'        => 'required', 
        ]);

        $update = TMS::find($id_tms);
        $update->review_start_date = ''.date("Y-m-d", strtotime($request->review_start_date)).' '.date("H:i:s", strtotime($request->review_start_time)).'';
        $update->review_end_date = ''.date("Y-m-d", strtotime($request->review_end_date)).' '.date("H:i:s", strtotime($request->review_end_time)).'';
        $update->status = "Session Set";
        $update->updated_by = auth()->user()->id;
        $update->save();

        foreach ($request->pic as $key => $pic) {
            
            $picharge = New TMSPic;
            $picharge->id = Uuid::uuid4()->getHex();
            $picharge->id_user = $pic;
            $picharge->id_tms = $update->id;
            $picharge->created_by = auth()->user()->id;
            $picharge->save();

            //NOTIFICATION FCM OTS
            $noti = New Notification;
            $noti->id = Uuid::uuid4()->getHex();
            $noti->to_user = $pic;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Tender Management System]';
            $noti->desc = 'You have been assigned to a new task';
            $noti->type = 'I';
            $noti->click_url = '';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->module = 'tms';
            $noti->id_module = $update->id;
            $noti->created_by = auth()->user()->id;
            $noti->save();

            $to_pic = User::find($pic);
            
            $noti->notificationFCM($to_pic->device_token , $noti->title , $noti->desc , null , null, $noti->id_module , $noti->module);

            //NOTIFICATION FCM SCHEDULE
            $noti = new Notification;
            $noti->to_user =  $pic;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Tender Management System]';
            $noti->desc = 'Have you visited the site?';
            $noti->type = 'I';
            $noti->click_url = '';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->module = 'tms';
            $noti->id_module = $update->id;
            $noti->created_by = auth()->user()->id;
            $json_noti = json_encode($noti);

            $scheduler = New Scheduler;
            $scheduler->id = Uuid::uuid4()->getHex();
            $scheduler->trigger_datetime = $update->review_start_date;
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
        $document->document_type 	= "TMS";
        $document->id_document 		= $update->id;
        $document->remark 			= "Add New Session in Tender Management System";
        $document->status 			= $update->status;
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();
     
        return response(['status' => 'OK' , 'message' => 'Successfully add new session']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tms = TMS::find($id);

        return response(['status' => 'OK' , 'message' =>  $tms]); 

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
        //
    }

    public function acknowledge($id_tms)
    {
        $tms = TMS::find($id_tms);

        $tms->status = "Acknowledge";
        $tms->acknowledge_status = '1';
        $tms->acknowledge_by = auth()->user()->id;
        $tms->updated_by = auth()->user()->id;
        $tms->save();

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "TMS";
        $document->id_document 		= $tms->id;
        $document->remark 			= "Acknowledge Task in Tender Management System";
        $document->status 			= $tms->status;
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

        return response(['status' => 'OK' , 'message' => 'Successfully acknowledge task']);
    }

    public function startVisit(Request $request , $id_tms)
    {
        $tms = TMS::find($id_tms);

        $request->validate([
            'start_task'        => 'required',
        ]);

        if ($request->start_task == 'Yes') 
        {
            $tms->status = "Task Start";
            $tms->start_task = $request->start_task;
            $tms->updated_by = auth()->user()->id;
            $tms->save();

            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "TMS";
            $document->id_document 		= $tms->id;
            $document->remark 			= "Start Site Visit in Tender Management System";
            $document->status 			= $tms->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully start site vist']);
        } 
        elseif ($request->start_task == 'No') 
        {
            $request->validate([
                'justification_start'        => 'required',
            ]);

            $tms->start_task = $request->start_task;
            $tms->justification_start = $request->justification_start;
            $tms->updated_by = auth()->user()->id;
            $tms->save();

            // foreach ($tms->pic as $key => $pic) {

            //         //NOTIFICATION FCM SCHEDULE
            //         $noti = new Notification;
            //         $noti->to_user =  $pic->id_user;
            //         $noti->tiny_img_url = '';
            //         $noti->title = 'Vertigo [Tender Management System]';
            //         $noti->desc = 'Have you visited the site?';
            //         $noti->type = 'I';
            //         $noti->click_url = '';
            //         $noti->send_status = 'P';
            //         $noti->status = '';
            //         $noti->created_by = auth()->user()->id;
            //         $json_noti = json_encode($noti);

            //         $scheduler = New Scheduler;
            //         $scheduler->id = Uuid::uuid4()->getHex();
            //         $scheduler->trigger_datetime = $update->review_start_date;
            //         $scheduler->url_to_call = 'triggeredNotification';
            //         $scheduler->secret_key = '';
            //         $scheduler->params = $json_noti;
            //         $scheduler->is_triggered = 0;
            //         $scheduler->created_by = auth()->user()->id;
            //         $scheduler->save();
            // }



            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "TMS";
            $document->id_document 		= $tms->id;
            $document->remark 			= "Site Visit not start in Tender Management System";
            $document->status 			= $tms->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully updated site visit']);
        }

    }

    public function taskCompletion(Request $request , $id_tms)
    {
        $tms = TMS::find($id_tms);

        $request->validate([
            'finish_task'        => 'required',
        ]);

        if ($request->finish_task == 'Yes') 
        {
            $tms->status = "Finish & Sent for Verification";
            $tms->finish_task = $request->finish_task;
            $tms->updated_by = auth()->user()->id;
            $tms->save();

            $clerks = Role::find('cba1bb20bbeb4965a56ae9500e23dc83');

            if($clerks)
            {
                $clerks = $clerks->user;

                foreach ($clerks as $key => $clerk) {
                    //NOTIFICATION FCM OTS
                    $noti = New Notification;
                    $noti->id = Uuid::uuid4()->getHex();
                    $noti->to_user = $clerk->id;
                    $noti->tiny_img_url = '';
                    $noti->title = 'Vertigo [Tender Management System]';
                    $noti->desc = 'A task has been completed';
                    $noti->type = 'R';
                    $noti->click_url = '';
                    $noti->send_status = 'P';
                    $noti->status = '';
                    $noti->module = 'tms';
                    $noti->id_module = $tms->id;
                    $noti->created_by = auth()->user()->id;
                    $noti->save();
    
                    $to_clerk = User::find($clerk->id);
                    $noti->notificationFCM($to_clerk->device_token , $noti->title , $noti->desc , null , null, $noti->id_module , $noti->module);
                    
                }
            }
            else
            {
                return response(['fail' => 'OK' , 'message' => 'No Clerk found in system, please register.']);
            }

            $managers = $tms->inquiry->user;

            foreach ($managers as $key => $manager) {
                
                //NOTIFICATION FCM OTS
                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $manager->id;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Tender Management System]';
                $noti->desc = 'A task has been completed';
                $noti->type = 'R';
                $noti->click_url = '';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'tms';
                $noti->id_module = $tms->id;
                $noti->created_by = auth()->user()->id;
                $noti->save();

                $to_manager = User::find($manager->id);
                $noti->notificationFCM($to_manager->device_token , $noti->title , $noti->desc , null , null, $noti->id_module , $noti->module);
                
            }
               
            $document = New DocumentLog;
            $document->id 				= Uuid::uuid4()->getHex();
            $document->user_type 		= auth()->user()->role->name;
            $document->id_user			= auth()->user()->id;
            $document->start_at 		= date('Y-m-d H:i:s');
            $document->end_at 			= null;
            $document->document_type 	= "TMS";
            $document->id_document 		= $tms->id;
            $document->remark 			= "Complete Review Session in Tender Management System";
            $document->status 			= $tms->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully complete task']);
        } 
        elseif ($request->finish_task == 'No') 
        {
            $request->validate([
                'review_end_date'                    => 'required',
                'review_end_time'                    => 'required',
            ]);

            $tms->finish_task = $request->finish_task;
            $tms->review_end_date = ''.date("Y-m-d", strtotime($request->review_end_date)).' '.date("H:i:s", strtotime($request->review_end_time)).'';
            $tms->updated_by = auth()->user()->id;
            $tms->save();

      
            foreach ($tms->pic as $key => $pic) {

                    //NOTIFICATION FCM SCHEDULE
                    $noti = new Notification;
                    $noti->to_user =  $pic->id_user;
                    $noti->tiny_img_url = '';
                    $noti->title = 'Vertigo [Tender Management System]';
                    $noti->desc = 'Have you completed the assigned task?';
                    $noti->type = 'I';
                    $noti->click_url = '';
                    $noti->send_status = 'P';
                    $noti->status = '';
                    $noti->module = 'tms';
                    $noti->id_module = $tms->id;
                    $noti->created_by = auth()->user()->id;
                    $json_noti = json_encode($noti);

                    $scheduler = New Scheduler;
                    $scheduler->id = Uuid::uuid4()->getHex();
                    $scheduler->trigger_datetime = $tms->review_end_date;
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
            $document->document_type 	= "TMS";
            $document->id_document 		= $tms->id;
            $document->remark 			= "Set a New due date for Review Session in Tender Management System";
            $document->status 			= $tms->status;
            $document->id_notification 	= "";
            $document->created_by 		= auth()->user()->id;
            $document->updated_by 		= auth()->user()->id;
            $document->save();

            return response(['status' => 'OK' , 'message' => 'Successfully extend review session']);
        }


    }

    public function taskVerifyClerk($id_tms)
    {
        $tms = TMS::find($id_tms);

       
            $tms->clerk_verify_status = "Verified";
            $tms->clerk_verify_by = auth()->user()->id;
            $tms->save();
     
       

        $tms = TMS::find($id_tms);

        if($tms->clerk_verify_status == "Verified" &&  $tms->manager_verify_status == "Verified")
        {
            $tms->status = "Verified";
            $tms->save();
        }

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "TMS";
        $document->id_document 		= $tms->id;
        $document->remark 			= "Verify Task in Tender Management System";
        $document->status 			= $tms->status;
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

        return response(['status' => 'OK' , 'message' => 'Successfully verified task']);

    }

    public function taskVerifyManager($id_tms)
    {
        $tms = TMS::find($id_tms);

      
            $tms->manager_verify_status = "Verified";
            $tms->manager_verify_by = auth()->user()->id;
            $tms->save();
        
        

        $tms = TMS::find($id_tms);

        if($tms->clerk_verify_status == "Verified" &&  $tms->manager_verify_status == "Verified")
        {
            $tms->status = "Verified";
            $tms->save();
        }

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "TMS";
        $document->id_document 		= $tms->id;
        $document->remark 			= "Verify Task in Tender Management System";
        $document->status 			= $tms->status;
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();
        
        return response(['status' => 'OK' , 'message' => 'Successfully verified task']);

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
