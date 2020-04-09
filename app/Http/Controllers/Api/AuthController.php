<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\DocumentLog;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed',
            'id_role' => 'required',
            'profile_img' => 'required',
            'staff_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $register = New User;
        $register->id = Uuid::uuid4()->getHex();
        $id_user = $register->id;
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->id_role = $request->id_role;
        $register->staff_id = $request->staff_id;
        $register->first_name = $request->first_name;
        $register->last_name = $request->last_name;

        // Handle File Upload
        if($request->hasFile('profile_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $id_user.'_'.time().'.'.$extension;
            // Upload Image
            $request->file('profile_img')->storeAs('public'.DIRECTORY_SEPARATOR.'users', $fileNameToStore);

            //path
            $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
            
            $register->img_name = $fileNameToStore;
            $register->img_path = $path;
            
        } else {
            $fileNameToStore = 'noimage_'.$id_user.'_'.time().'.png';
            $img_path = public_path().''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.'noimage_'.$id_user.'_'.time().'.png';
            copy(public_path().''.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'noimage.png' , $img_path);

            //path
            $path = ''.DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.''.$fileNameToStore;
            
            $register->img_name = $fileNameToStore;
            $register->img_path = $path;
        }

        $register->created_by = auth()->user() ? auth()->user()->id : 'public';
        $register->status = 1;
        $register->save();

        $user = User::find($id_user);

        $document = New DocumentLog;
        $document->id 				= Uuid::uuid4()->getHex();
        $document->user_type 		= $user->role->name;
        $document->id_user			= Auth()->user()->id;
        $document->start_at 		= date('Y-m-d H:i:s');
        $document->end_at 			= null;
        $document->document_type 	= "User";
        $document->id_document 		= $user->id;
        $document->remark 			= 'New staff has been registered into system' ;
        $document->status 			= "Registered In System";
        $document->id_notification 	= "";
        $document->created_by 		= auth()->user()->id;
        $document->updated_by 		= auth()->user()->id;
        $document->save();

        return response(['status' => 'OK' , 'user' => $user]);

    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        if($request->device_token)
        {
            $user = User::find(auth()->user()->id);
            $user->device_token = $request->device_token;
            $user->save();
        }

        $user = User::find(auth()->user()->id);

        return response(['user' => $user , 'access_token' => $accessToken]);
    }
}
