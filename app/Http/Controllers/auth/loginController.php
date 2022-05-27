<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Mockery\Exception;

class loginController extends Controller
{
    public function login(Request $request){
        try {
            $request->validate([
                'email'=>'email|required',
                'password'=>'required',
            ]);
            $credentials=request(['email','password']);

            if(!Auth::attempt($credentials)){
                return response()->json([
                    'status_code'=>422,
                    'message'=>"Unauthorized",

                ]);
            }
            $user =User::where('email',$request->email)->first();
            if(!Hash::check($request->password, $user->password,[])){
                return response()->json([
                    'status_code'=>422,
                    'message'=>"password match",
                ]);
            }
            $tokenResult=$user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code'=>200,
                'success_token'=>"$tokenResult",
                'token_type'=>'Bearer',
                'role'=>$user->role
            ]);

        }catch (Exception $error){
            return response()->json([
                'status_code'=>500,
                'message'=>"error in login",
                'error'=>$error
            ]);
        }
    }
}
