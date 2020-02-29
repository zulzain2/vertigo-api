<?php

namespace App\Http\Controllers\Api;

use App\EBS;
use App\EBSStaffUse;
use Ramsey\Uuid\Uuid;
use App\EBSEquipmentUse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EBSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date'            => 'required',
            'start_time'            => 'required',
            'end_date'              => 'required', 
            'end_time'              => 'required', 
            'tag_number'            => 'required',
            'job_number'            => 'required',
            'job_title'             => 'required', 
            'staff_uses.*'          => 'required',
            'equipment_uses.*'      => 'required',
        ]);

        $add = New EBS;
        $add->id = Uuid::uuid4()->getHex();
        $add->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
        $add->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
        $add->tag_number = $request->tag_number;
        $add->job_number = $request->job_number;
        $add->job_title = $request->job_title;
        $add->status = 'In Progress';
        $add->created_by = auth()->user()->id;
        $add->save();
        
        foreach ($request->equipment_uses as $key => $equipment_use) {
            $add3 = New EBSEquipmentUse;
            $add3->id = Uuid::uuid4()->getHex();
            $add3->id_equipment = $equipment_use;
            $add3->id_ebs = $add->id;
            $add3->created_by = auth()->user()->id;
            $add3->save(); 

            $equipment = Equipment::find($equipment_use);
            $equipment->availability = "unavailable";
            $equipment->save();
        }

        foreach ($request->staff_uses as $key => $staff_use) {
            $add2 = New EBSStaffUse;
            $add2->id = Uuid::uuid4()->getHex();
            $add2->id_user = $staff_use;
            $add2->id_ebs = $add->id;
            $add2->created_by = auth()->user()->id;
            $add2->save(); 

            $noti = New Notification;
            $noti->id = Uuid::uuid4()->getHex();
            $noti->to_user = $staff_use;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Equipment Booking System]';
            $noti->desc = 'Have you utilize the equipment?';
            $noti->type = 'I';
            $noti->click_url = '';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->created_by = auth()->user()->id;
            $noti->save();

            $user = User::find($staff_use);

            //NOTIFICATION FCM SCHEDULE
            $noti->toSingleDevice($user->device_token, $noti->title , $noti->desc , null , null);
        }

        return response(['status' => 'OK' , 'message' => 'Successfully book equipment']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ebs = EBS::with('EBSStaffUse.EBSEquipmentUse');

        $ebs = $ebs->find($id);

        return response(['status' => 'OK' , 'message' =>  $ebs]); 
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
