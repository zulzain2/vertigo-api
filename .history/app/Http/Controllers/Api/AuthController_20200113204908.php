<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email'=>'email|required',
            'password'=>'required|confirmed',
        ]);



    }

    public function login(){
        
    }
}
