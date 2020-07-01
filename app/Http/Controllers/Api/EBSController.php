<?php

namespace App\Http\Controllers\Api;

use App\EBS;
use App\User;
use App\Equipment;
use App\Scheduler;
use App\DocumentLog;
use App\EBSStaffUse;
use App\Notification;
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
        $ebs = EBS::all();

        return response(['status' => 'OK', 'message' =>  $ebs]);
    }

    public function dashDate(Request $request)
    {

        $dateFrom = date($request->date_from);
        $dateTo = date($request->date_to);
        $category = $request->category;

        $ebs = EBS::whereBetween('created_at', [$dateFrom, $dateTo])
            ->whereHas('ebsequipmentuse.equipment', function ($query) use ($category) {
                $query->where('id_equip_category', $category);
            })
            ->get();

        return response(['status' => 'OK', 'message' => $ebs]);
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

        $add = new EBS;
        $add->id = Uuid::uuid4()->getHex();
        $add->start_date = '' . date("Y-m-d", strtotime($request->start_date)) . ' ' . date("H:i:s", strtotime($request->start_time)) . '';
        $add->end_date = '' . date("Y-m-d", strtotime($request->end_date)) . ' ' . date("H:i:s", strtotime($request->end_time)) . '';
        $add->tag_number = $request->tag_number;
        $add->job_number = $request->job_number;
        $add->job_title = $request->job_title;
        $add->status = 'Booking Confirmed';
        $add->created_by = auth()->user()->id;
        $add->save();

        foreach ($request->equipment_uses as $key => $equipment_use) {
            $add3 = new EBSEquipmentUse;
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
            $add2 = new EBSStaffUse;
            $add2->id = Uuid::uuid4()->getHex();
            $add2->id_user = $staff_use;
            $add2->id_ebs = $add->id;
            $add2->created_by = auth()->user()->id;
            $add2->save();

            //NOTIFICATION FCM SCHEDULE
            $noti = new Notification;
            $noti->to_user = $staff_use;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Equipment Booking System]';
            $noti->desc = 'Have you utilize the equipment?';
            $noti->type = 'I';
            $noti->click_url = 'ebs-start';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->module = 'ebs';
            $noti->id_module = $add->id;
            $noti->created_by = auth()->user()->id;
            $json_noti = json_encode($noti);

            $scheduler = new Scheduler;
            $scheduler->id = Uuid::uuid4()->getHex();
            $scheduler->trigger_datetime = $add->start_date;
            $scheduler->url_to_call = 'triggeredNotification';
            $scheduler->secret_key = '';
            $scheduler->params = $json_noti;
            $scheduler->is_triggered = 0;
            $scheduler->created_by = auth()->user()->id;
            $scheduler->save();
        }

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "EBS";
        $document->id_document         =  $add->id;
        $document->remark             = "Create New Booking for Equipment Booking System";
        $document->status             = "Booking Confirm";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Successfully book equipment']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ebs = EBS::find($id);

        return response(['status' => 'OK', 'message' =>  $ebs]);
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

        $add = EBS::find($id);
        $add->start_date = '' . date("Y-m-d", strtotime($request->start_date)) . ' ' . date("H:i:s", strtotime($request->start_time)) . '';
        $add->end_date = '' . date("Y-m-d", strtotime($request->end_date)) . ' ' . date("H:i:s", strtotime($request->end_time)) . '';
        $add->tag_number = $request->tag_number;
        $add->job_number = $request->job_number;
        $add->job_title = $request->job_title;
        // $add->status = 'Booking Confirmed';
        $add->updated_by = auth()->user()->id;
        $add->save();

        foreach ($add->ebsequipmentuse as $key => $data) {
            $data->delete();
        }

        foreach ($add->ebsstaffuse as $key => $data2) {
            $data2->delete();
        }

        foreach ($request->equipment_uses as $key => $equipment_use) {
            $add3 = new EBSEquipmentUse;
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
            $add2 = new EBSStaffUse;
            $add2->id = Uuid::uuid4()->getHex();
            $add2->id_user = $staff_use;
            $add2->id_ebs = $add->id;
            $add2->created_by = auth()->user()->id;
            $add2->save();

            //NOTIFICATION FCM SCHEDULE
            $noti = new Notification;
            $noti->to_user = $staff_use;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Equipment Booking System]';
            $noti->desc = 'Have you utilize the equipment?';
            $noti->type = 'I';
            $noti->click_url = 'ebs-start';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->module = 'ebs';
            $noti->id_module = $add->id;
            $noti->created_by = auth()->user()->id;
            $json_noti = json_encode($noti);

            $scheduler = new Scheduler;
            $scheduler->id = Uuid::uuid4()->getHex();
            $scheduler->trigger_datetime = $add->start_date;
            $scheduler->url_to_call = 'triggeredNotification';
            $scheduler->secret_key = '';
            $scheduler->params = $json_noti;
            $scheduler->is_triggered = 0;
            $scheduler->created_by = auth()->user()->id;
            $scheduler->save();
        }

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "EBS";
        $document->id_document         =  $add->id;
        $document->remark             = "Edit Booking for Equipment Booking System";
        $document->status             = "Booking Confirm";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Successfully edit booked equipment']);
    }

    public function startBooking(Request $request, $id_ebs)
    {

        $request->validate([
            'start_status'        => 'required',
        ]);

        $ebs = EBS::find($id_ebs);

        if ($request->start_status == 'Yes') {
            $ebs->start_status = "Yes";
            $ebs->status = "Booking Start";
            $ebs->updated_by = auth()->user()->id;
            $ebs->save();

            foreach ($ebs->ebsstaffuse as $key => $ebsstaffuse) {

                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user = $ebsstaffuse->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Equipment Booking System]';
                $noti->desc = 'Have you completed the booking?';
                $noti->type = 'I';
                $noti->click_url = 'ebs-end';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'ebs';
                $noti->id_module = $ebs->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = new Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime = $ebs->end_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();

            }


            $document = new DocumentLog;
            $document->id                 = Uuid::uuid4()->getHex();
            $document->user_type         = auth()->user()->role->name;
            $document->id_user            = auth()->user()->id;
            $document->start_at         = date('Y-m-d H:i:s');
            $document->end_at             = null;
            $document->document_type     = "EBS";
            $document->id_document         =  $ebs->id;
            $document->remark             = 'Equipment Booking Start for Job Number : ' . $ebs->job_number . '';
            $document->status             = "Booking Start";
            $document->id_notification     = "";
            $document->created_by         = auth()->user()->id;
            $document->updated_by         = auth()->user()->id;
            $document->save();

            return response(['status' => 'OK', 'message' => 'Successfully acknowledge & start booking']);
        } elseif ($request->start_status == 'No') {

            $request->validate([
                'start_justification'        => 'required',
                'start_date'                 => 'required',
                'start_time'                 => 'required',
            ]);

            $ebs->start_status = "No";
            $ebs->start_date = '' . date("Y-m-d", strtotime($request->start_date)) . ' ' . date("H:i:s", strtotime($request->start_time)) . '';
            $ebs->start_justification = $request->start_justification;
            $ebs->updated_by = auth()->user()->id;
            $ebs->save();

            foreach ($ebs->ebsstaffuse as $key => $ebsstaffuse) {

                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user = $ebsstaffuse->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Equipment Booking System]';
                $noti->desc = 'Have you utilize the equipment?';
                $noti->type = 'I';
                $noti->click_url = 'ebs-start';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'ebs';
                $noti->id_module = $ebs->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = new Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime =  $ebs->start_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();
            }

            $document = new DocumentLog;
            $document->id                 = Uuid::uuid4()->getHex();
            $document->user_type         = auth()->user()->role->name;
            $document->id_user            = auth()->user()->id;
            $document->start_at         = date('Y-m-d H:i:s');
            $document->end_at             = null;
            $document->document_type     = "EBS";
            $document->id_document         =  $ebs->id;
            $document->remark             = 'Equipment Booking for Job Number : ' . $ebs->job_number . ' has place a new start date to ' . date('j F Y, g:i a', strtotime($ebs->start_date)) . ' ';
            $document->status             = "Booking set a New Start Date";
            $document->id_notification     = "";
            $document->created_by         = auth()->user()->id;
            $document->updated_by         = auth()->user()->id;
            $document->save();


            return response(['status' => 'OK', 'message' => 'Successfully extend start booking']);
        }
    }

    public function updateProgress(Request $request, $id_ebs)
    {

        $request->validate([
            'booking_progress'             => 'required',
            'booking_justification'        => 'required',
        ]);

        $ebs = EBS::find($id_ebs);
        $ebs->booking_progress = $request->booking_progress;
        $ebs->booking_justification = $request->booking_justification;
        $ebs->status = "Booking Ended";
        $ebs->end_date = date("Y-m-d H:i:s");
        $ebs->save();

        foreach ($ebs->ebsequipmentuse as $key => $ebsequipmentuse) {
            $equipment = Equipment::find($ebsequipmentuse->id_equipment);
            $equipment->availability = "available";
            $equipment->save();
        }

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "EBS";
        $document->id_document         =  $ebs->id;
        $document->remark             = 'Equipment Booking for Job Number : ' . $ebs->job_number . ' has updated the progress to ' . $ebs->booking_progress . '';
        $document->status             = "Booking Updated Progress";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Successfully update booking progress']);
    }

    public function endBooking(Request $request, $id_ebs)
    {

        $request->validate([
            'finish_status'        => 'required',
            'img_update'           => 'image|max:1999',
        ]);

        $ebs = EBS::find($id_ebs);

        if ($request->finish_status == 'Yes') {
            $ebs->finish_status = "Yes";
            $ebs->status = "Booking Ended";
            $ebs->updated_by = auth()->user()->id;

            // Handle File Upload
            if ($request->hasFile('img_update')) {
                // Get filename with the extension
                $filenameWithExt = $request->file('img_update')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('img_update')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $ebs->id . '_' . time() . '.' . $extension;
                // Upload Image
                $request->file('img_update')->storeAs('public' . DIRECTORY_SEPARATOR . 'ebs', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage_' . $ebs->id . '_' . time() . '.png';

                $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . 'noimage_' . $ebs->id . '_' . time() . '.png';
                // $img_path = public_path() .''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . 'noimage_' . $ebs->id . '_' . time() . '.png';
                copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
            }

            //path
            $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
            // $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

            $ebs->img_update = $fileNameToStore;
            $ebs->img_path_update = $path;
            $ebs->save();

            foreach ($ebs->ebsequipmentuse as $key => $ebsequipmentuse) {
                $equipment = Equipment::find($ebsequipmentuse->id_equipment);
                $equipment->availability = "available";
                $equipment->save();
            }

            $document = new DocumentLog;
            $document->id                 = Uuid::uuid4()->getHex();
            $document->user_type         = auth()->user()->role->name;
            $document->id_user            = auth()->user()->id;
            $document->start_at         = date('Y-m-d H:i:s');
            $document->end_at             = null;
            $document->document_type     = "EBS";
            $document->id_document         =  $ebs->id;
            $document->remark             = 'Equipment Booking for Job Number : ' . $ebs->job_number . ' has successfully ended.';
            $document->status             = "Booking Ended";
            $document->id_notification     = "";
            $document->created_by         = auth()->user()->id;
            $document->updated_by         = auth()->user()->id;
            $document->save();

            return response(['status' => 'OK', 'message' => 'Successfully end booking']);
        } elseif ($request->finish_status == 'No') {
            $request->validate([
                'finish_justification'     => 'required',
                'end_date'                 => 'required',
                'end_time'                 => 'required',
            ]);

            $ebs->finish_status = "No";
            $ebs->end_date = '' . date("Y-m-d", strtotime($request->end_date)) . ' ' . date("H:i:s", strtotime($request->end_time)) . '';
            $ebs->finish_justification = $request->finish_justification;
            $ebs->updated_by = auth()->user()->id;

            // Handle File Upload
            if ($request->hasFile('img_update')) {
                // Get filename with the extension
                $filenameWithExt = $request->file('img_update')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('img_update')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $ebs->id . '_' . time() . '.' . $extension;
                // Upload Image
                $request->file('img_update')->storeAs('public' . DIRECTORY_SEPARATOR . 'ebs', $fileNameToStore);
            } else {
                $fileNameToStore = 'noimage_' . $ebs->id . '_' . time() . '.png';

                $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . 'noimage_' . $ebs->id . '_' . time() . '.png';
                // $img_path = public_path() .''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . 'noimage_' . $ebs->id . '_' . time() . '.png';
                copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
            }

            //path

            $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
            // $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR . 'ebs' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

            $ebs->img_update = $fileNameToStore;
            $ebs->img_path_update = $path;
            $ebs->save();


            foreach ($ebs->ebsstaffuse as $key => $ebsstaffuse) {

                //NOTIFICATION FCM SCHEDULE
                $noti = new Notification;
                $noti->to_user = $ebsstaffuse->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Equipment Booking System]';
                $noti->desc =  'Have you completed the booking?';
                $noti->type = 'I';
                $noti->click_url = 'ebs-end';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->module = 'ebs';
                $noti->id_module = $ebs->id;
                $noti->created_by = auth()->user()->id;
                $json_noti = json_encode($noti);

                $scheduler = new Scheduler;
                $scheduler->id = Uuid::uuid4()->getHex();
                $scheduler->trigger_datetime =  $ebs->end_date;
                $scheduler->url_to_call = 'triggeredNotification';
                $scheduler->secret_key = '';
                $scheduler->params = $json_noti;
                $scheduler->is_triggered = 0;
                $scheduler->created_by = auth()->user()->id;
                $scheduler->save();
            }

            $document = new DocumentLog;
            $document->id                 = Uuid::uuid4()->getHex();
            $document->user_type         = auth()->user()->role->name;
            $document->id_user            = auth()->user()->id;
            $document->start_at         = date('Y-m-d H:i:s');
            $document->end_at             = null;
            $document->document_type     = "EBS";
            $document->id_document         =  $ebs->id;
            $document->remark             = 'Equipment Booking for Job Number : ' . $ebs->job_number . ' has place a new end date to ' . date('j F Y, g:i a', strtotime($ebs->end_date)) . ' ';
            $document->status             = "Booking set a New End Date";
            $document->id_notification     = "";
            $document->created_by         = auth()->user()->id;
            $document->updated_by         = auth()->user()->id;
            $document->save();

            return response(['status' => 'OK', 'message' => 'Successfully extend end booking']);
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
