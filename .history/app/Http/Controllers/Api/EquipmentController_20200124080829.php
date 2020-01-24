<?php

namespace App\Http\Controllers\Api;

use App\Equipment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::all();

        return response(['status' => 'OK' , 'equipments' => $equipments]);
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
        //
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
