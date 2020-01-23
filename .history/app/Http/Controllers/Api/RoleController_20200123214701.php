<?php

namespace App\Http\Controllers\Api;

use App\Role;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        if()
        {

        }
        else
        {
            
        }
        return response(['roles' => $roles]);
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
            'role_name'             => 'required',
            'role_level'            => 'required',    
        ]);

        $role = New Role;
        $role->id = Uuid::uuid4()->getHex();
        $role->name = $request->role_name;
        $role->level = $request->role_level;
        $role->status = 'enable';
        $role->created_by = auth()->user()->id;
        $role->save();

        return response(['status' => 'OK' , 'message' => 'Successfully create role']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roles = Role::find($id);

        return response(['status' => 'OK' , 'roles' => $roles]);
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
            'role_name'             => 'required',
            'role_level'            => 'required',    
        ]);

        $role = Role::find($id);
        $role->name = $request->role_name;
        $role->level = $request->role_level;
        $role->updated_by = auth()->user()->id;
        $role->save();

        return response(['status' => 'OK' , 'message' => 'Successfully update role']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        if($role)
        {
            $role->delete();
            return response(['status' => 'OK' , 'message' => 'Successfully delete role']);
        }
        else
        {
            return response(['status' => 'OK' , 'message' => 'No role delete']);
        }

        
    }
}
