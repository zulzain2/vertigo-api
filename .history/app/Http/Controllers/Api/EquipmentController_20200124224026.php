<?php

namespace App\Http\Controllers\Api;

use App\Equipment;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
            'name'                  => 'required',
            'img'                   => 'image|max:1999',   
            'tag_number'            => 'required', 
            'description'           => 'required', 
            'id_equip_category'     => 'required',
        ]);

        $equipment = New Equipment;
        $equipment->id = Uuid::uuid4()->getHex();
        $equipment->name = $request->name;

        // Handle File Upload
        if($request->hasFile('img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $equipment->id.'_'.time().'.'.$extension;
            // Upload Image
            $request->file('img')->storeAs('public/equipments', $fileNameToStore);
            
        } else {
            $fileNameToStore = 'noimage_'.$equipment->id.'_'.time().'.png';
            $img_path = public_path().'/storage/equipments/noimage_'.$equipment->id.'_'.time().'.png';
            copy(public_path().'img/noimage.png' , $img_path);
        }

        //path
        $path = '/storage/equipments/'.$fileNameToStore;
        
        $equipment->img = $fileNameToStore;
        $equipment->img_path = $path;
        $equipment->tag_number = $request->tag_number;
        $equipment->description = $request->description;
        $equipment->id_equip_category = $request->id_equip_category;
        $equipment->status = 'enable';
        $equipment->created_by = auth()->user()->id;
        $equipment->save();

        return response(['status' => 'OK' , 'message' => 'Successfully create equipment']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::find($id);

        return response()->json(['status' => 'OK' , 'equipment' => $equipment]);
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
            'name'                  => 'required',
            'img'                   => 'image|max:1999',   
            'tag_number'            => 'required', 
            'description'           => 'required', 
            'id_equip_category'     => 'required',
        ]);

        $equipment = Equipment::find($id);
        // Handle File Upload
        if($request->hasFile('img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $equipment->id.'_'.time().'.'.$extension;
            // Upload Image
            $request->file('img')->storeAs('public/equipments', $fileNameToStore);
            //path
            $path = '/storage/equipments/'.$fileNameToStore;
            // Delete file if exists
            Storage::delete('public/equipments/'.$equipment->img);
        } 
        else {
            // Delete file if exists
            Storage::delete('public/equipments/'.$equipment->img);

            $fileNameToStore = 'noimage_'.$equipment->id.'_'.time().'.png';
            $img_path = public_path().'/storage/equipments/noimage_'.$equipment->id.'_'.time().'.png';
            copy(public_path().'/img/noimage.png' , $img_path);
        }

        

        // Update Post
        $equipment->name = $request->name;
        if($request->hasFile('img')){
            $equipment->img = $fileNameToStore;
            $equipment->img_path = $path;
        }
        $equipment->tag_number = $request->tag_number;
        $equipment->description = $request->description;
        $equipment->id_equip_category = $request->id_equip_category;
        $equipment->status = 'enable';
        $equipment->created_by = auth()->user()->id;
        $equipment->save();

        return response(['status' => 'OK' , 'message' => 'Successfully update equipment']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::find($id);
        
        //Check if equipment exists before deleting
        if (!isset($equipment)){
            return response(['status' => 'OK' , 'message' => 'No equipment found']);
        }
    
        if($equipment->img != 'noimage.png'){
            // Delete Image
            Storage::delete('public/equipments/'.$equipment->img);
        }
        
        $equipment->delete();
     
        return response(['status' => 'OK' , 'message' => 'Success delete equipment']);
    }
}
