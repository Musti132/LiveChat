<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatReply;

class ChatController extends Controller
{
    public function __construct(){
        $this->middleware('api');
    }

    public function showUsers(){
        $users = User::all();

        return response()->json([
            'response' => $users,
        ]);
    }

    public function post(Request $request){
        return response()->json([
            'request' => $request->all(),
        ]);
    }

    public function sendMessage(Request $request){

        ChatReply::create([
            'chat_id' => 5,
            'user_id' => 3,
            'message' => $request->message,
        ]);

        return response()->json([
            'status' => true,
            'message' => "Message sent successfully",
        ]);
    }
}
