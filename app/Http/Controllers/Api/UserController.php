<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

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

        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'email|required|unique:users,email,'.$update->id,
        //     'password'=>'required|confirmed',
        //     'id_role' => 'required',
        // ]);

        $update = User::find($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->password = bcrypt($request->password);
        $update->id_role = $request->id_role;

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
            // Delete file if exists
            Storage::delete('public'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$update->img_name);
        } 
       

         if($request->hasFile('profile_img')){
             $update->img_name = $fileNameToStore;
             $update->img_path = $path;
         }

        $update->created_by = auth()->user()->id;
        $update->status = 1;
        $update->save();

        return response(['status' => 'OK' , 'message' => 'Successfully update user']);
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
