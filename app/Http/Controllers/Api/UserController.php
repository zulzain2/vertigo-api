<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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
                // $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
                $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
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
