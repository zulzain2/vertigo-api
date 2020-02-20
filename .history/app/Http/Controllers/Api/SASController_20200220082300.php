<?php

namespace App\Http\Controllers\Api;

use App\SAS;
use Ramsey\Uuid\Uuid;
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
        //
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
            $equipment->status = 'enable';
        $equipment->created_by = auth()->user()->id;

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
