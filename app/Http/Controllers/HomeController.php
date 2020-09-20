<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\SendMessage;
use Event;

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
        event(new SendMessage("Hello", 1, 2));
        return Event::dispatch("Hello", 1, 2);
    }
}
