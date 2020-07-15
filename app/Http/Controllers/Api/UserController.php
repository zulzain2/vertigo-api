<?php

namespace App\Http\Controllers\Api;

use App\EBS;
use App\MSS;
use App\TBS;
use App\TMS;
use App\User;
use App\Notification;
use App\SASStaffAssign;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();

        return response(['status' => 'OK' , 'users' => $users]);
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

    public function getAvailableStaff($datefrom, $dateto)
    {
        $unavailableStaffs = MSS::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        // $unavailableStaffsEBS = EBS::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        // ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        // ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        // ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        // ->get();

        // $unavailableStaffsTBS = TBS::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        // ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        // ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        // ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        // ->get();

        $unavailableStaffsSAS = SASStaffAssign::where('start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        $unavailableStaffsTMS = TMS::where('sitevisit_start_date', '<=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->where('sitevisit_end_date', '>=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->orWhere('sitevisit_start_date', '<=', date('Y-m-d H:i:s', strtotime($dateto)))
        ->where('sitevisit_end_date', '>=', date('Y-m-d H:i:s', strtotime($datefrom)))
        ->get();

        $availableStaffs = array();
        $staffs = User::all();

        if (count($unavailableStaffs) == 0 && count($unavailableStaffsEBS) == 0 && count($unavailableStaffsTBS) == 0 && count($unavailableStaffsSAS) == 0 && count($unavailableStaffsTMS) == 0) {
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

            // $i = 1;
        
            // foreach ($availableStaffs as $x => $availableStaff) {
            //     foreach ($unavailableStaffsEBS as $y => $unavailableSEBS) {
            //         foreach ($unavailableSEBS->ebsstaffuse as $key => $unavailableStaffEBS) {
            //             if ($unavailableStaffEBS->id_user == $availableStaffs[$x]['id']) {
            //                 $availableStaffs[$x]['id'] = '';
            //             } else {

            //             }
            //         }
                        
                     
            //     }

            //     $i++;
            // }


            // $i = 1;
        
            // foreach ($availableStaffs as $x => $availableStaff) {
            //     foreach ($unavailableStaffsTBS as $y => $unavailableSTBS) {
            //         foreach ($unavailableSTBS->tbsdriver as $key => $unavailableStaffTBS) {
            //             if ($unavailableStaffTBS->id_user == $availableStaffs[$x]['id']) {
            //                 $availableStaffs[$x]['id'] = '';
            //             } else {

            //             }
            //         }
                        
                     
            //     }

            //     $i++;
            // }


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

            $i = 1;
            
            foreach ($availableStaffs as $x => $availableStaff) {
                foreach ($unavailableStaffsTMS as $y => $unavailableSTMS) {
                    foreach ($unavailableSTMS->pic as $y => $unavailableStaffTMS) {
                        if ($unavailableStaffTMS->id_user == $availableStaffs[$x]['id']) {
                            $availableStaffs[$x]['id'] = '';
                        } else {

                        }
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('role');

        $user = $user->find($id);

        return response(['status' => 'OK' , 'user' => $user]);  
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
        $update = User::find($id);

        $request->validate([
			'img' 	            => 'mimes:jpg,png',
            'img' 	            => 'max:8192',
            'id_role'           => 'required',
            'name'              =>'required',
            'email'             =>'email|required|unique:users,email,'.$update->id,
            'staff_id'          => 'required',
            'first_name'        => 'required',
            'last_name'         => 'required',
		]); 

        $update = User::find($id);

            $update->name = $request->name;
            $update->email = $request->email;
            $update->id_role = $request->id_role;
            $update->staff_id = $request->staff_id;
            $update->first_name = $request->first_name;
            $update->last_name = $request->last_name;
           
            // Handle File Upload
            if($request->hasFile('profile_img')){
                // Get filename with the extension
                $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('profile_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $update->id.'_'.time().'.'.$extension;
                // Upload Image
                $request->file('profile_img')->storeAs('public'.DIRECTORY_SEPARATOR.'users', $fileNameToStore);
                //path
                $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
                // $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
                // Delete file if exists
                Storage::delete('public'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$update->img_name);
            } 
        

            if($request->hasFile('profile_img')){
                $update->img_name = $fileNameToStore;
                $update->img_path = $path;
            }

            $update->updated_by = auth()->user()->id;
            $update->status = 1;
            $update->save();

            return response(['status' => 'OK' , 'message' => 'Successfully update user']);

    }


    public function updatePassword(Request $request, $id)
    {
     

        $request->validate([
			
            'password_curr' 	=> 'required|string',
            'password_new' 		=> 'required|confirmed|min:6',
           
        ]); 
        
        $update = User::find($id);

        if(!Hash::check($request->input('password_curr'), $update->password)) {

            return response(['status' => 'FAIL' , 'message' => 'Current Password Not Match']);

        }
        else {
            
            $update->password = Hash::make($request->input('password_new'));
            $update->updated_by = auth()->user()->id;
            $update->status = 1;
            $update->save();

            return response(['status' => 'OK' , 'message' => 'Successfully update password']);
            
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
        $user = User::find($id);

        if($user)
        {
            $user->delete();
            return response(['status' => 'OK' , 'message' => 'Successfully delete user']);
        }
        else
        {
            return response(['status' => 'OK' , 'message' => 'No user delete']);
        }
    }


}
