<?php

namespace App\Http\Controllers\Api;

use App\MSS;
use App\User;
use App\MSSPic;
use App\MSSTask;
use App\MSSEquipment;
use App\MSSTransport;
use App\Notification;
use Ramsey\Uuid\Uuid;
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
        $mss = MSS::with('mssequipment.equipment')
                    ->with('msstransport.transport')
                    ->with('msspic.user')
                    ->with('msstask.maintenanceTask')
                    ->get();

        return response(['status' => 'OK' , 'message' =>  $mss]); 
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
            'equipment.*'                   => 'required', 
            'transport.*'                   => 'required', 
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

            foreach ($request->equipment as $key => $equipment) {
                $add2 = New MSSEquipment;
                $add2->id = Uuid::uuid4()->getHex();
                $add2->id_equipment = $equipment;
                $add2->id_mss = $add->id;
                $add2->status = '';
                $add2->created_by = auth()->user()->id;
                $add2->save();
            }

            foreach ($request->transport as $key => $transport) {
                $add3 = New MSSTransport;
                $add3->id = Uuid::uuid4()->getHex();
                $add3->id_transport = $transport;
                $add3->id_mss = $add->id;
                $add3->status = '';
                $add3->created_by = auth()->user()->id;
                $add3->save();
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

                $noti = New Notification;
                $noti->id = Uuid::uuid4()->getHex();
                $noti->to_user = $pic;
                $noti->tiny_img_url = '';
                $noti->title = 'Vertigo [Maintenance Schedule System]';
                $noti->desc = 'You have been assigned to a new task';
                $noti->type = 'I';
                $noti->click_url = '';
                $noti->send_status = 'P';
                $noti->status = '';
                $noti->created_by = auth()->user()->id;
                $noti->save();
    
                $user = User::find($pic);
                //NOTIFICATION FCM OTS
                $noti->notificationFCM($user->device_token , $noti->title , $noti->desc , null , null);
                //NOTIFICATION FCM SCHEDULE
    
            }

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
        $mss = MSS::with('mssequipment.equipment')
                    ->with('msstransport.transport')
                    ->with('msspic.user')
                    ->with('msstask.maintenanceTask');
    
        $mss = $mss->find($id);

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
        //
    }

    public function getAvailableStaff($datefrom, $dateto)
    {
        $mssUnavailableStaffs = MSS::where('start_date' , '>=' , date('Y-m-d H:i:s' , strtotime($datefrom)))
        ->where('end_date' , '<=' , date('Y-m-d H:i:s' , strtotime($dateto)))
        ->get();

        $availableUsers = array();
        $users = User::all();
        
        if (count($mssUnavailableStaffs) == 0) 
        {
            $i = 1;
            foreach ($users as $key => $user) 
            {
                $availableUsers[$i][0] = $user->id;
                $availableUsers[$i][1] = $user->name;
                $i++;
            }

        } 
        else 
        {
 
            
                $i = 1;
                foreach ($users as $key => $user) {
                    $availableUsers[$i][0] = $user->id;
                    $availableUsers[$i][1] = $user->name;
                    $i++;
                } 

                $i = 1;
                foreach ($availableUsers as $x => $availableUser) { 
                    foreach ($mssUnavailableStaffs as $y => $mssunavailableStaff) {
                        foreach ($mssunavailableStaff->msspic as $z => $unavailableStaff) {
                            if ($unavailableStaff->id_user == $availableUsers[$x][0]) {
                                $availableUsers[$x][0] = '';
                                $availableUsers[$x][1] = '';
                            } else {
                                
                            }
                        } 
                    } 
                    $i++;
                }

                foreach ($availableUsers as $key => $availableUser) {
                   if($availableUsers[$key][0] == '')
                   {
                    unset($availableUsers[$key]);
                   }
                }

                $availableUsers = array_values($availableUsers);
 
        }  

        return response(['status' => 'OK' , 'users' => $availableUsers]);
        
    }
    

    public function acknowledge($id_mss)
    {
        $mss = MSS::find($id_mss);

        $mss->status = "Acknowledge";
        $mss->acknowledge_status = '1';
        $mss->acknowledge_by = auth()->user()->id;
        $mss->updated_by = auth()->user()->id;
        $mss->save();

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

            //NOTIFICATION FCM SCHEDULE

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

            //NOTIFICATION FCM SCHEDULE

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
