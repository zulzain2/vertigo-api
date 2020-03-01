<?php

namespace App\Http\Controllers\Api;

use App\TBS;
use App\User;
use App\TBSDriver;
use App\Transport;
use App\Notification;
use Ramsey\Uuid\Uuid;
use App\TBSTransportUse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TBSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tbs = TBS::with('TBSDriver')->with('TBSTransportUse')->get();

        return response(['status' => 'OK' , 'message' =>  $tbs]);
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
            'job_number'            => 'required',
            'job_title'             => 'required', 
            'drivers.*'             => 'required',
            'transport_uses.*'      => 'required',
        ]);

        $add = New TBS;
        $add->id = Uuid::uuid4()->getHex();
        $add->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
        $add->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
        $add->job_number = $request->job_number;
        $add->job_title = $request->job_title;
        $add->status = 'Booking Confirmed';
        $add->created_by = auth()->user()->id;
        $add->save();

        foreach ($request->transport_uses as $key => $transport_use) {
            $add3 = New TBSTransportUse;
            $add3->id = Uuid::uuid4()->getHex();
            $add3->id_transport = $transport_use;
            $add3->id_tbs = $add->id;
            $add3->created_by = auth()->user()->id;
            $add3->save(); 

            $transport = Transport::find($transport_use);
            $transport->availability = "unavailable";
            $transport->save();
        }

        foreach ($request->drivers as $key => $driver) {
            $add2 = New TBSDriver;
            $add2->id = Uuid::uuid4()->getHex();
            $add2->id_user = $driver;
            $add2->id_tbs = $add->id;
            $add2->created_by = auth()->user()->id;
            $add2->save(); 

            $noti = New Notification;
            $noti->id = Uuid::uuid4()->getHex();
            $noti->to_user = $driver;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Transport Booking System]';
            $noti->desc = 'Have you utilize the transport?';
            $noti->type = 'I';
            $noti->click_url = '';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->created_by = auth()->user()->id;
            $noti->save();

            $user = User::find($driver);

            //NOTIFICATION FCM SCHEDULE
            $json_data = [
                "to" => $user->device_token ,
                "notification" => [
                    "body" => "SOMETHING",
                    "title" => "SOMETHING",
                    "icon" => "ic_launcher"
                ],
                "data" => [
                    "ANYTHING EXTRA HERE"
                ]
            ];

            $noti->notificationFCM($json_data);
            // $noti->toSingleDevice($user->device_token, $noti->title , $noti->desc , null , null);
        }

        return response(['status' => 'OK' , 'message' => 'Successfully book transport']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbs = TBS::with('TBSDriver')->with('TBSTransportUse');

        $tbs = $tbs->find($id);

        return response(['status' => 'OK' , 'message' =>  $tbs]); 
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
        
    }

    public function startBooking(Request $request , $id_tbs)
    {
        $request->validate([
            'start_status'        => 'required',
        ]);

        $tbs = TBS::find($id_tbs);

        if ($request->start_status == 'Yes') 
        {
            $tbs->start_status = "Yes"; 
            $tbs->status = "Booking Start";
            $tbs->updated_by = auth()->user()->id;
            $tbs->save();

            foreach ($tbs->tbsdriver as $key => $tbsdriver) {

                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $tbsdriver->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Transport Booking System]';
                $noti->desc = 'Have you completed the booking?';
                $noti->type = 'I';
                $noti->click_url = '';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->created_by = auth()->user()->id;
                $noti->save();
    
                //NOTIFICATION FCM SCHEDULE
            }

            return response(['status' => 'OK' , 'message' => 'Successfully acknowledge & start booking']);
        } 
        elseif ($request->start_status == 'No') 
        {
            $request->validate([
                'start_justification'        => 'required',
                'start_date'                 => 'required',
                'start_time'                 => 'required',
            ]);

            $tbs->start_status = "No"; 
            $tbs->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
            $tbs->start_justification = $request->start_justification;
            $tbs->updated_by = auth()->user()->id;
            $tbs->save();

            foreach ($tbs->tbsdriver as $key => $tbsdriver) {

                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $tbsdriver->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Transport Booking System]';
                $noti->desc = 'Have you utilize the transport?';
                $noti->type = 'I';
                $noti->click_url = '';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->created_by = auth()->user()->id;
                $noti->save();
    
                //NOTIFICATION FCM SCHEDULE
            }
            

            return response(['status' => 'OK' , 'message' => 'Successfully extend start booking']);
        }
    }

    public function updateProgress(Request $request , $id_tbs)
    {
        $request->validate([
            'booking_progress'             => 'required',
            'booking_justification'        => 'required',
        ]);

        $tbs = TBS::find($id_tbs);
        $tbs->booking_progress = $request->booking_progress;
        $tbs->booking_justification = $request->booking_justification;
        $tbs->status = "Booking Ended";
        $tbs->end_date = date("Y-m-d H:i:s");
        $tbs->save();

        foreach ($tbs->tbstransportuse as $key => $tbstransportuse) {
            $transport = Transport::find($tbstransportuse->id_transport);
            $transport->availability = "available";
            $transport->save();
        }
        
        return response(['status' => 'OK' , 'message' => 'Successfully update booking progress']);
    }

    public function endBooking(Request $request , $id_tbs)
    {

        $request->validate([
            'finish_status'        => 'required',
            'img_update'           => 'image|max:1999', 
        ]);

        $tbs = TBS::find($id_tbs);

        if ($request->finish_status == 'Yes') 
        {
            $tbs->finish_status = "Yes"; 
            $tbs->status = "Booking Ended";
            $tbs->updated_by = auth()->user()->id;

            // Handle File Upload
            if($request->hasFile('img_update')){
                // Get filename with the extension
                $filenameWithExt = $request->file('img_update')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('img_update')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $tbs->id.'_'.time().'.'.$extension;
                // Upload Image
                $request->file('img_update')->storeAs('public'.DIRECTORY_SEPARATOR.'tbs', $fileNameToStore);
                
            } else {
                $fileNameToStore = 'noimage_'.$tbs->id.'_'.time().'.png';
                $img_path = public_path().''.DIRECTORY_SEPARATOR.'/storage/tbs/noimage_'.$tbs->id.'_'.time().'.png';
                copy(public_path().''.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'noimage.png' , $img_path);
            }

            //path
            $path = '/storage/tbs/'.$fileNameToStore;
            
            $tbs->img_update = $fileNameToStore;
            $tbs->img_path_update = $path;
            $tbs->save();

            foreach ($tbs->tbstransportuse as $key => $tbstransportuse) {
                $transport = Transport::find($tbstransportuse->id_transport);
                $transport->availability = "available";
                $transport->save();
            }
            
            return response(['status' => 'OK' , 'message' => 'Successfully end booking']);
        } 
        elseif ($request->finish_status == 'No') 
        {
            $request->validate([
                'finish_justification'     => 'required',
                'end_date'                 => 'required',
                'end_time'                 => 'required',
            ]);

            $tbs->finish_status = "No"; 
            $tbs->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
            $tbs->finish_justification = $request->finish_justification;
            $tbs->updated_by = auth()->user()->id;
            
            // Handle File Upload
            if($request->hasFile('img_update')){
                // Get filename with the extension
                $filenameWithExt = $request->file('img_update')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('img_update')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $tbs->id.'_'.time().'.'.$extension;
                // Upload Image
                $request->file('img_update')->storeAs('public'.DIRECTORY_SEPARATOR.'tbs', $fileNameToStore);
                
            } else {
                $fileNameToStore = 'noimage_'.$tbs->id.'_'.time().'.png';
                $img_path = public_path().''.DIRECTORY_SEPARATOR.'/storage/tbs/noimage_'.$tbs->id.'_'.time().'.png';
                copy(public_path().''.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'noimage.png' , $img_path);
            }

            //path
            $path = '/storage/tbs/'.$fileNameToStore;
            
            $tbs->img_update = $fileNameToStore;
            $tbs->img_path_update = $path;
            $tbs->save();


            foreach ($tbs->tbsdriver as $key => $tbsdriver) {

                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $tbsdriver->id_user;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Transport Booking System]';
                $noti->desc = 'Have you completed the booking?';
                $noti->type = 'I';
                $noti->click_url = '';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->created_by = auth()->user()->id;
                $noti->save();
    
                //NOTIFICATION FCM SCHEDULE
            }

            return response(['status' => 'OK' , 'message' => 'Successfully extend end booking']);
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
