<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\SendMessage;
use App\Events\MessageChannel;
use Event;
use App\ChannelMessage;
use Pusher;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //event(new SendMessage("Hello", "testing", 3));
        return view('welcome');
    }

    public function users(){
        $users = User::all();

        return response()->json([
            'users' => $users,
        ]);
    }

    public function post(Request $request){
        return response()->json([
            'request' => $request->all(),
        ]);
    }
    
    public function notify(){
        return "test";
    }
}
