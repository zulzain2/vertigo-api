<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        if($users)
        {
            return response(['status' => 'OK' , 'users' => $users]);
        }
        else
        {
            return response(['status' => 'BAD' , 'users' => $users]);
        } 
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

        if($user)
        {
            return response(['status' => 'OK' , 'user' => $user]);
        }
        else
        {
            return response(['status' => 'BAD' , 'user' => $user]);
        }
        
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
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed',
            'id_role' => 'required',
        ]);

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
        //
    }
}
