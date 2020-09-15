<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\SendMessage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //event(new SendMessage("Hello", "testing", 3));
        return view('home');
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
}
