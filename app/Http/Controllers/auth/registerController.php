<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class registerController extends Controller
{
    public function register(Request $request){
        try {
           $validator = Validator::make($request->all(), [
               'name'=>'required|string|max:255',
               'email'=>'required|string|max:255',
               'password'=>'required|string|min:6',
               //'Cpassword'=>'required|same:password',
           ]);
           if($validator->fails()){
               return response([
                 'error:'=>$validator->errors()->all()
               ],422);
           }

           $request['password'] =Hash::make($request['password']);
           $request['remember_token'] =Str::random(10);

           $user = User::create($request->toArray());

            return response()->json([
                'status_code'=>200,
                'message'=>"registration Successfully"
            ]);

        }catch (Exception $error){
            return response()->json([
                'status_code'=>500,
                'message'=>"error in registration",
                'error'=>$error
            ]);
        }
    }
}
