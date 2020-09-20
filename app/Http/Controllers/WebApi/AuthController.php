<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Events\SendMessage;
use Validator;
use Auth;
use Hash;
use Event;

class AuthController extends Controller
{

    public function login(Request $request){
        /**
         * Validate request
         */
        $validator = Validator::make($request->all(), [
            'email' => ['min:3', 'required'],
            'password' => ['min:6', 'required'],
        ]);

        if($validator->fails()){
            $respMessage = [
                'status' => 'failed',
                'message' => 'Invalid format',
            ];
            return json_response($respMessage, 401);
        }

        $credentials = request(['email', 'password']);


        /**
         * Check if credentials are correct
         */
        if($token = $this->guard()->attempt($credentials)){
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged in',
            ], 200)->header('Authorization', $token);
        }

        return response()->json([
            'status' => 'failed',
            'error' => 'Wrong username/password',
        ], 401);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if($validator->fails()){
            return json_response([
                'status' => 'error',
                'errors' => $validator->messages(),
            ], 400);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return json_response([
            'status' => 'success',
            'message' => 'Successfully registered!',
        ], 200);


    }


    public function logout(Request $request){
        $this->guard()->logout();

        $respMessage = [
            'status' => 'success',
            'message' => 'Successfully logged out',
        ];

        return json_response($respMessage);
    }

    /**
     * Get user details
     */
    public function user(Request $request){
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user,
        ]);
    }

    /**
     * Refresh JWT Token
     */

    public function refresh(){
        if($token = $this->guard()->refresh()){
            return response()
                ->json([
                    'status' => 'success',
                ], 200)->header('Authorization', $token);
            }
    }
    
    /**
     * Return Auth Guard
     */
    private function guard(){
        return Auth::guard();
    }
}
