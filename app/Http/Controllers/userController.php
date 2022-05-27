<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function userdata(Request $request){
        return $request->user();
    }

    public function logout(){
        Auth::user()->token()->delete();
    }
}
