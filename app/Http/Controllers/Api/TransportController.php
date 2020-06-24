<?php

namespace App\Http\Controllers\Api;

use App\Transport;
use App\DocumentLog;
use Ramsey\Uuid\Uuid;
use App\TransportCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transports = Transport::with('transportcategory')->get();

        return response(['status' => 'OK', 'transports' => $transports]);
    }

    public function getAvailableTransport()
    {
        $transports = Transport::where('availability', '=', 'available')->with('transportcategory')->get();


        return response(['status' => 'OK', 'transports' => $transports]);
    }

    public function getTransportCategories()
    {
        $transportCategories = TransportCategory::where('status', '=', '1')->get();


        return response(['status' => 'OK', 'transportCategories' => $transportCategories]);
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
            'plate_number'            => 'required',
            'description'           => 'required',
            'id_trans_category'     => 'required',
        ]);

        $transport = new Transport;
        $transport->id = Uuid::uuid4()->getHex();
        $transport->name = $request->name;

        // Handle File Upload
        if ($request->hasFile('img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $transport->id . '_' . time() . '.' . $extension;
            // Upload Image
            $request->file('img')->storeAs('public' . DIRECTORY_SEPARATOR . 'transports', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage_' . $transport->id . '_' . time() . '.png';

            $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . 'noimage_' . $transport->id . '_' . time() . '.png';
            // $img_path = public_path().''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'transports'.DIRECTORY_SEPARATOR.'noimage_'.$transport->id.'_'.time().'.png';
            copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
        }

        //path
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
        // $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'transports'.DIRECTORY_SEPARATOR.''.$fileNameToStore;

        $fileNameToStore =  Str::random(40) . '.png';
        $transport->img = $fileNameToStore;
        $transport->img_path = $path;
        $transport->plate_number = $request->plate_number;
        $transport->description = $request->description;
        $transport->availability = "available";
        $transport->id_trans_category = $request->id_trans_category;
        $transport->status = 'enable';
        $transport->created_by = auth()->user()->id;
        $transport->save();

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "Transport";
        $document->id_document         =  $transport->id;
        $document->remark             = 'New Transport has been registered into system';
        $document->status             = "Transport Registered";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Successfully create transport']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transport = Transport::with('transportcategory');

        $transport = $transport->find($id);

        return response()->json(['status' => 'OK', 'transport' => $transport]);
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
            'plate_number'          => 'required',
            'description'           => 'required',
            'id_trans_category'     => 'required',
        ]);

        $transport = Transport::find($id);
        // Handle File Upload
        if ($request->hasFile('img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $transport->id . '_' . time() . '.' . $extension;
            // Upload Image
            $request->file('img')->storeAs('public' . DIRECTORY_SEPARATOR . 'transports', $fileNameToStore);
            //path

            $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
            // $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'transports'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
            // Delete file if exists
            Storage::delete('public' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . '' . $transport->img);
        } else {
            // Delete file if exists
            Storage::delete('public' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . '' . $transport->img);

            $fileNameToStore = 'noimage_' . $transport->id . '_' . time() . '.png';
            $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . 'noimage_' . $transport->id . '_' . time() . '.png';
            // $img_path = public_path().''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'transports'.DIRECTORY_SEPARATOR.'noimage_'.$transport->id.'_'.time().'.png';
            copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
        }


        // Update Post
        $transport->name = $request->name;
        if ($request->hasFile('img')) {
            $transport->img = $fileNameToStore;
            $transport->img_path = $path;
        }
        $transport->plate_number = $request->plate_number;
        $transport->description = $request->description;
        $transport->id_trans_category = $request->id_trans_category;
        $transport->status = 'enable';
        $transport->created_by = auth()->user()->id;
        $transport->save();

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "Transport";
        $document->id_document         =  $transport->id;
        $document->remark             = 'Information on Transport : ' . $transport->name . ' has been updated';
        $document->status             = "Transport Updated";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Successfully update transport']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transport::find($id);
        $id_t = $transport->id;
        $name_t = $transport->name;

        //Check if transport exists before deleting
        if (!isset($transport)) {
            return response(['status' => 'OK', 'message' => 'No transport found']);
        }

        if ($transport->img != 'noimage.png') {
            // Delete Image
            Storage::delete('public' . DIRECTORY_SEPARATOR . 'transports' . DIRECTORY_SEPARATOR . '' . $transport->img);
        }

        $transport->delete();

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "Transport";
        $document->id_document         =  $id_t;
        $document->remark             = 'Transport : ' . $name_t . ' has been delete from system';
        $document->status             = "Transport Deleted";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Success delete transport']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTransport(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'img'                   => 'required',
            'plate_number'            => 'required',
            'description'           => 'required',
            'id_trans_category'     => 'required',
        ]);

        $transport = new Transport;
        $transport->id = Uuid::uuid4()->getHex();
        $transport->name = $request->name;

        $filename = Str::random(40) . '.png';
        $path = "storage/transports/" . $filename;
        $img = Image::make($request->img);
        $img->save($path, 80, 'png');

        $transport->img = $filename;
        $transport->img_path = $path;
        $transport->plate_number = $request->plate_number;
        $transport->description = $request->description;
        $transport->availability = "available";
        $transport->id_trans_category = $request->id_trans_category;
        $transport->status = 'enable';
        $transport->created_by = auth()->user()->id;
        $transport->save();

        $document = new DocumentLog;
        $document->id                 = Uuid::uuid4()->getHex();
        $document->user_type         = auth()->user()->role->name;
        $document->id_user            = auth()->user()->id;
        $document->start_at         = date('Y-m-d H:i:s');
        $document->end_at             = null;
        $document->document_type     = "Transport";
        $document->id_document         =  $transport->id;
        $document->remark             = 'New Transport has been registered into system';
        $document->status             = "Transport Registered";
        $document->id_notification     = "";
        $document->created_by         = auth()->user()->id;
        $document->updated_by         = auth()->user()->id;
        $document->save();

        return response(['status' => 'OK', 'message' => 'Successfully create transport']);
    }
}
