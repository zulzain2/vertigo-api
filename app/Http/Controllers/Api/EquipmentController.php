<?php

namespace App\Http\Controllers\Api;

use App\Equipment;
use App\DocumentLog;
use Ramsey\Uuid\Uuid;
use App\EquipmentCategory;
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

        $equipments = Equipment::with('equipmentcategory')->get();

        return response(['status' => 'OK' , 'equipments' => $equipments]);
    }

    public function getAvailableEquipment()
    {
        $equipments = Equipment::where('availability', '=' , 'available')->with('equipmentcategory')->get();


        return response(['status' => 'OK' , 'equipments' => $equipments]);
    }

    public function getEquimentCategories()
    {
        $equipmentCategories = EquipmentCategory::where('status', '=' , '1')->get();


        return response(['status' => 'OK' , 'equipmentCategories' => $equipmentCategories]);
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
            $request->file('img')->storeAs('public'.DIRECTORY_SEPARATOR.'equipments', $fileNameToStore);
            
        } else {
            $fileNameToStore = 'noimage_'.$equipment->id.'_'.time().'.png';
            
            $img_path = public_path().''.DIRECTORY_SEPARATOR.'/storage/equipments/noimage_'.$equipment->id.'_'.time().'.png';
            // $img_path = public_path().''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.'noimage_'.$equipment->id.'_'.time().'.png';

            copy(public_path().''.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'noimage.png' , $img_path);
        }

        //path
        
        // $path = '/storage/equipments/'.$fileNameToStore;
        $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
        
        $equipment->img = $fileNameToStore;
        $equipment->img_path = $path;
        $equipment->tag_number = $request->tag_number;
        $equipment->description = $request->description;
        $equipment->availability = "available";
        $equipment->id_equip_category = $request->id_equip_category;
        $equipment->status = 'enable';
        $equipment->created_by = auth()->user()->id;
        $equipment->save();

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "Equipment";
        $document->id_document 		=  $equipment->id;
        $document->remark 			= 'New Equipment has been registered into system';
        $document->status 			= "Equipment Registered";
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

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
        $equipment = Equipment::with('equipmentcategory');

        $equipment = $equipment->find($id);

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
            $request->file('img')->storeAs('public'.DIRECTORY_SEPARATOR.'equipments', $fileNameToStore);
            //path
            $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
            // Delete file if exists
            Storage::delete('public'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.''.$equipment->img);
        } 
        else {
            // Delete file if exists
            Storage::delete('public'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.''.$equipment->img);

            $fileNameToStore = 'noimage_'.$equipment->id.'_'.time().'.png';
            $img_path = public_path().''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.'noimage_'.$equipment->id.'_'.time().'.png';
            copy(public_path().''.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'noimage.png' , $img_path);
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

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "Equipment";
        $document->id_document 		=  $equipment->id;
        $document->remark 			= 'Information on Equipment : '.$equipment->name.' has been updated';
        $document->status 			= "Equipment Updated";
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

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
        $id_eq = $equipment->id;
        $name_eq = $equipment->name;
        //Check if equipment exists before deleting
        if (!isset($equipment)){
            return response(['status' => 'OK' , 'message' => 'No equipment found']);
        }
    
        if($equipment->img != 'noimage.png'){
            // Delete Image
            Storage::delete('public'.DIRECTORY_SEPARATOR.'equipments'.DIRECTORY_SEPARATOR.''.$equipment->img);
        }
        
        $equipment->delete();
     
        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= auth()->user()->role->name;
        $document->id_user			= auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "Equipment";
        $document->id_document 		=  $id_eq;
        $document->remark 			= 'Equipment : '.$name_eq.' has been delete from system';
        $document->status 			= "Equipment Deleted";
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

        return response(['status' => 'OK' , 'message' => 'Success delete equipment']);
    }
}
