<?php

namespace App\Http\Controllers\Api;

use App\SAS;
use App\Role;
use App\User;
use Ramsey\Uuid\Uuid;
use App\SASStaffAssign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SASController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sas = SAS::with('SASStaffAssign.SASComment')->get();

        return response(['status' => 'OK' , 'message' =>  $sas]); 
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

    public function addNewTask(Request $request)
    {
        $managers = Role::where('level' , 1)->first();
        
        if($managers)
        {
        
            return response(['status' => 'OK' , 'message' => 'No managers found in system, please register at least a manager to get their approval.']);
        
        }
        else
        {
            $managers = $managers->user;

            if(count($managers) != 0)
            {
                $managers = $managers->user;

                $managers_array = [];
            
                foreach ($managers as $key => $manager) {
                    array_push($managers_array, $manager->id);
                }
        
                $request->validate([
                    'start_date'        => 'required',
                    'start_time'        => 'required',
                    'end_date'          => 'required', 
                    'end_time'          => 'required', 
                    'job_number'        => 'required',
                    'job_title'         => 'required',
                    'job_description'   => 'required', 
                    'assign_staff.*'    => 'required',
                ]);
        
                    $add = New SAS;
                    $add->id = Uuid::uuid4()->getHex();
                    $add->job_number = $request->job_number;
                    $add->job_title = $request->job_title;
                    $add->job_description = $request->job_description;
                    $add->status = 'In Progress';
                    $add->id_approver = json_encode($managers_array);
                    $add->approval_status = 'Submitted for Approval';
                    $add->created_by = auth()->user()->id;
                    $add->save();
        
                foreach ($request->assign_staff as $key => $assign_staff) {
                        $add2 = New SASStaffAssign;
                        $add2->id = Uuid::uuid4()->getHex();
                        $add2->id_user = $assign_staff;
                        $add2->id_sas = $add->id;
                        $add2->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
                        $add2->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
                        $add2->status = "Created";
                        $add2->created_by = auth()->user()->id;
                        $add2->save();  
                }

                foreach ($managers as $key => $manager) {
                    $noti = New Notification;
                    $noti->id = Uuid::uuid4()->getHex();
                    $noti->to_user = $manager->id;
                    $noti->tiny_img_url = '';
                    $noti->title = 'Vertigo [Staff Assignment Management]';
                    $noti->desc = 'A new created task needs your approval';
                    $noti->type = 'A';
                    $noti->click_url = '';
                    $noti->send_status = 'P';
                    $noti->status = '';
                    $noti->created_by = auth()->user()->id;
                    $noti->save();

                    //NOTIFICATION FCM OTS
                    $noti->toSingleDevice($manager->device_token, $noti->title , $noti->desc , null , null);
                }


                return response(['status' => 'OK' , 'message' => 'Successfully add new task']);
            }
            else
            {
                return response(['status' => 'OK' , 'message' => 'No managers found in system, please register at least a manager to get their approval.']);
            }
        }
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sas = SAS::with('SASStaffAssign.SASComment');

        $sas = $sas->find($id);

        return response(['status' => 'OK' , 'message' =>  $sas]); 
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
        $sas = SAS::find($id);

        $request->validate([
            'start_date'        => 'required',
            'start_time'        => 'required',
            'end_date'          => 'required', 
            'end_time'          => 'required', 
            'job_number'        => 'required',
            'job_title'         => 'required',
            'job_description'   => 'required', 
            'assign_staff.*'    => 'required',
        ]);


        $sas->job_number = $request->job_number;
        $sas->job_title = $request->job_title;
        $sas->job_description = $request->job_description;
        $sas->updated_by = auth()->user()->id;
        $sas->save();

        $sasstaffassigns = $sas->sasstaffassign;

        foreach ($sasstaffassigns as $key => $sasstaffassign) {
            $sasstaffassign->delete();
        }

        foreach ($request->assign_staff as $key => $assign_staff) {
                $add2 = New SASStaffAssign;
                $add2->id = Uuid::uuid4()->getHex();
                $add2->id_user = $assign_staff;
                $add2->id_sas = $sas->id;
                $add2->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
                $add2->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
                $add2->created_by = auth()->user()->id;
                $add2->updated_by = auth()->user()->id;
                $add2->save();  
        }

        return response(['status' => 'OK' , 'message' => 'Successfully edit task']);
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

    
    public function getAvailableStaff($datefrom, $dateto)
    {

        $unavailableStaffs = SASStaffAssign::where('start_date' , '>=' , date('Y-m-d H:i:s' , strtotime($datefrom)))
        ->where('end_date' , '<=' , date('Y-m-d H:i:s' , strtotime($dateto)))
        ->get();

        $availableUsers = array();
        $users = User::all();
        
        if (count($unavailableStaffs) == 0) {
            $i = 1;
            foreach ($users as $key => $user) {
                $availableUsers[$i][0] = $user->id;
                $availableUsers[$i][1] = $user->name;
                $i++;
            }
        } else {
 
            
                $i = 1;
                foreach ($users as $key => $user) {
                    $availableUsers[$i][0] = $user->id;
                    $availableUsers[$i][1] = $user->name;
                    $i++;
                } 

                $i = 1;
                foreach ($availableUsers as $x => $availableUser) { 
                    foreach ($unavailableStaffs as $y => $unavailableStaff) {
                     
                            if ($unavailableStaff->id_user == $availableUsers[$x][0]) {
                                $availableUsers[$x][0] = '';
                                $availableUsers[$x][1] = '';
                            } else {
                                
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

    public function approve($id_sas)
    {
        $sas = SAS::find($id_sas);

        $sas->approval_status = 'Approved';
        $sas->approved_by = auth()->user()->id;
        $sas->updated_by = auth()->user()->id;
        $sas->save();

        foreach ($sas->sasstaffassign as $key => $sasstaffassign) {

            $sasstaffassign->status = "Approved";
            $sasstaffassign->save();

            $noti = New Notification;
            $noti->id = Uuid::uuid4()->getHex();
            $noti->to_user = $sasstaffassign->id_user;
            $noti->tiny_img_url = '';
            $noti->title = 'Vertigo [Staff Assignment Management]';
            $noti->desc = 'You have been assigned to a new task';
            $noti->type = 'I';
            $noti->click_url = '';
            $noti->send_status = 'P';
            $noti->status = '';
            $noti->created_by = auth()->user()->id;
            $noti->save();
        }

        //NOTIFICATION FCM OTS

        //NOTIFICATION FCM SCHEDULE

        return response(['status' => 'OK' , 'message' => 'Successfully approve task']);
    }

    public function reject($id_sas)
    {
        $sas = SAS::find($id_sas);

        $sas->approval_status = 'Rejected';
        $sas->rejected_by = auth()->user()->id;
        $sas->updated_by = auth()->user()->id;
        $sas->save();

        return response(['status' => 'OK' , 'message' => 'Successfully reject task']);
    }

    public function acknowledge($id_sas_assign_staff)
    {
        $sasassignstaff = SASStaffAssign::find($id_sas_assign_staff);

        $sasassignstaff->status = "Acknowledge";
        $sasassignstaff->acknowledge_status = '1';
        $sasassignstaff->updated_by = auth()->user()->id;
        $sasassignstaff->save();

        return response(['status' => 'OK' , 'message' => 'Successfully acknowledge task']);
    }

    public function startTask(Request $request , $id_sas_assign_staff)
    {
        $sasassignstaff = SASStaffAssign::find($id_sas_assign_staff);

        $request->validate([
            'start_task'        => 'required',
        ]);

        if ($request->start_task == 'Yes') 
        {
            $sasassignstaff->status = "Task Start";
            $sasassignstaff->start_task = $request->start_task;
            $sasassignstaff->updated_by = auth()->user()->id;
            $sasassignstaff->save();

            return response(['status' => 'OK' , 'message' => 'Successfully start task']);
        } 
        elseif ($request->start_task == 'No') 
        {
            $request->validate([
                'justification_start'        => 'required',
                'start_date'                 => 'required',
                'start_time'                 => 'required',
            ]);

            $sasassignstaff->start_task = $request->start_task;
            $sasassignstaff->start_date = ''.date("Y-m-d", strtotime($request->start_date)).' '.date("H:i:s", strtotime($request->start_time)).'';
            $sasassignstaff->justification_start = $request->justification_start;
            $sasassignstaff->updated_by = auth()->user()->id;
            $sasassignstaff->save();

            //NOTIFICATION FCM SCHEDULE

            return response(['status' => 'OK' , 'message' => 'Successfully extend start task']);
        }

    }

    public function updateProgress(Request $request , $id_sas_assign_staff)
    {
        $request->validate([
            'task_progress'             => 'required',
            'justification_update'      => 'required',
            'img_update'                => 'image|max:1999', 
        ]);

        $sasassignstaff = SASStaffAssign::find($id_sas_assign_staff);
        $sasassignstaff->task_progress = $request->task_progress;
        $sasassignstaff->justification_update = $request->justification_update;
        $sasassignstaff->status = $request->task_progress;

        // Handle File Upload
        if($request->hasFile('img_update')){
            // Get filename with the extension
            $filenameWithExt = $request->file('img_update')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img_update')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $sasassignstaff->id.'_'.time().'.'.$extension;
            // Upload Image
            $request->file('img_update')->storeAs('public'.DIRECTORY_SEPARATOR.'sas', $fileNameToStore);
            
        } else {
            $fileNameToStore = 'noimage_'.$sasassignstaff->id.'_'.time().'.png';
            $img_path = public_path().''.DIRECTORY_SEPARATOR.'/storage/sas/noimage_'.$sasassignstaff->id.'_'.time().'.png';
            copy(public_path().''.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'noimage.png' , $img_path);
        }

        //path
        $path = '/storage/sas/'.$fileNameToStore;
        
        $sasassignstaff->img_update = $fileNameToStore;
        $sasassignstaff->img_path_update = $path;
        $sasassignstaff->save();

        return response(['status' => 'OK' , 'message' => 'Successfully update task progress']);

    }

    public function endTask(Request $request , $id_sas_assign_staff)
    {
        $sasassignstaff = SASStaffAssign::find($id_sas_assign_staff);

        $request->validate([
            'finish_task'        => 'required',
        ]);

        if ($request->finish_task == 'Yes') 
        {
            $sasassignstaff->status = "Task Finish";
            $sasassignstaff->finish_task = $request->finish_task;
            $sasassignstaff->updated_by = auth()->user()->id;
            $sasassignstaff->save();

            return response(['status' => 'OK' , 'message' => 'Successfully end task']);
        } 
        elseif ($request->finish_task == 'No') 
        {
            $request->validate([
                'justification_finish'        => 'required',
                'end_date'                    => 'required',
                'end_time'                    => 'required',
            ]);

            $sasassignstaff->finish_task = $request->finish_task;
            $sasassignstaff->end_date = ''.date("Y-m-d", strtotime($request->end_date)).' '.date("H:i:s", strtotime($request->end_time)).'';
            $sasassignstaff->updated_by = auth()->user()->id;
            $sasassignstaff->save();

            //NOTIFICATION FCM SCHEDULE

            return response(['status' => 'OK' , 'message' => 'Successfully extend end task']);
        }

    }

    
}
