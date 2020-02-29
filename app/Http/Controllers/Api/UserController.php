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
        $users = User::all();

        $noti = New Notification;
        // $token = 'c4q0S2tr8C9bvBxdUl9-kB:APA91bH1lH6QA5Y43gTTy9En-nbEwyjCiO2o9gJFptnRnU19799bFUJYEhlm0Lu8DrOPEzfJc1A4_eqZk1aa2-sGEaMfwmDJiP3VSqvD7SF0_bEII50zr6UpD8raOqUR2JSNw1cqCZur';
        $noti->toMultiDevice($users,'title','body',null,null);

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
        $user = User::find($id);

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
