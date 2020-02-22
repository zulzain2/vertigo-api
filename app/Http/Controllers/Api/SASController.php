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
                        $add2->status = "0";
                        $add2->created_by = auth()->user()->id;
                        $add2->save();  
                }

                foreach ($managers as $key => $manager) {
                    $noti = New Notification;
                    $noti->id = Uuid::uuid4()->getHex();
                    $noti->to_user = $manager->id;
                    $noti->tiny_img_url = '';
                    $noti->title = '[APPROVAL] SAS : '.$add->job_number.' need approval from you.';
                    $noti->desc = 'SAS : '.$add->job_number.' need approval from you.';
                    $noti->type = 'A';
                    $noti->click_url = '';
                    $noti->send_status = 'P';
                    $noti->status = '';
                    $noti->created_by = auth()->user()->id;
                    $noti->save();
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
        $sas = SAS::with('SASStaffAssign.SASComment')->whereIn('id', $id)->get();

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

    
}
