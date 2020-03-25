<?php

namespace App\Http\Controllers\Api;

use App\TMS;
use App\TMSPic;
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
        $tms = TMS::with('pic')
        ->with('inquiry.user')
        ->get();

        return response(['status' => 'OK' , 'message' =>  $tms]); 
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
            $noti->created_by = auth()->user()->id;
            $noti->save();

            //NOTIFICATION FCM OTS
        }
       
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
            dd("lol");
            $pic = New TMSPic;
            $pic->id = Uuid::uuid4()->getHex();
            $pic->id_user = $pic;
            $pic->id_tms = $update->id;
            $pic->created_by = auth()->user()->id;
            $pic->save();

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
            $noti->created_by = auth()->user()->id;
            $noti->save();

            //NOTIFICATION FCM OTS

            //NOTIFICATION FCM SCHEDULE
        }

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
        $tms = TMS::with('pic')
        ->with('inquiry.user');

        $tms = $tms->find($id);

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

            //NOTIFICATION FCM SCHEDULE

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

            $clerks = Role::find('1b287390939d476f90adb7b2a99a37c9')->user;

            foreach ($clerks as $key => $clerk) {
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
                $noti->created_by = auth()->user()->id;
                $noti->save();

                //NOTIFICATION FCM OTS
            }

            $managers = $tms->inquiry->user;

            foreach ($managers as $key => $manager) {
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
                $noti->created_by = auth()->user()->id;
                $noti->save();

                //NOTIFICATION FCM OTS
            }
               
            return response(['status' => 'OK' , 'message' => 'Successfully complete task']);
        } 
        elseif ($request->finish_task == 'No') 
        {
            $request->validate([
                'review_end_date'                    => 'required',
                'review_end_time'                    => 'required',
            ]);

            $tms->finish_task = $request->finish_task;
            $tms->end_date = ''.date("Y-m-d", strtotime($request->review_end_date)).' '.date("H:i:s", strtotime($request->review_end_time)).'';
            $tms->updated_by = auth()->user()->id;
            $tms->save();

            //NOTIFICATION FCM SCHEDULE

            return response(['status' => 'OK' , 'message' => 'Successfully extend review session']);
        }


    }

    public function taskVerify($id_tms)
    {
        $tms = TMS::find($id_tms);

        if(auth()->user()->role->id == "c2ac78faf5774256b67fb2497447b266") //Manager
        {
            $tms->clerk_verify_status = "Verified";
            $tms->clerk_verify_by = auth()->user()->id;
            $tms->save();
        }
        elseif (auth()->user()->role->id == "1b287390939d476f90adb7b2a99a37c9") // Technicians / Clerk / Office Support
        {
            $tms->manager_verify_status = "Verified";
            $tms->manager_verify_by = auth()->user()->id;
            $tms->save();
        }

        $tms = TMS::find($id_tms);

        if($tms->clerk_verify_status == "Verified" &&  $tms->manager_verify_status = "Verified")
        {
            $tms->status = "Verified";
            $tms->save();
        }

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
