<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // register
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$request->id,
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);

        $user->createToken('token')->accessToken;

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully'
        ]);
    }

    // login
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $user = User::where(['email' => $request->email, 'active_status' => 1])->first();

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ]);
        }

        if($user && Hash::check($request->password, $user->password) && $user->role_id == 3){
            $token = $user->createToken('my_token')->plainTextToken;
            $user->_token = $token;
            return response()->json([
                'user' => $user,
                'success' => true,
                'message' => 'Successfully logged in.'
            ]);
        }
    }
}
