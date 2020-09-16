<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => ['min:6', 'required'],
            'password' => ['min:6', 'required'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'data' => 'Invalid format',
            ]);
        }

        

        dd($request);
    }
}
