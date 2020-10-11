<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\FriendRequest;
use App\Friends;
use App\Http\Resources\UserResource;
use App\Http\Resources\FriendRequestResource;

class SearchController extends Controller
{
    public function index(Request $request){

        $friends = Friends::where('user_id', 1)->orWhere('friend_id', 1)->with(['user', 'friend', 'request'])->first();
        dd($friends->request);

        /*
        $data = FriendRequestResource::collection(FriendRequest::where('to_user_id', 1)->with('sendBy')->paginate(15));
        return $data;
        foreach($data as $user){
            $user->push($user->sendBy);
        };

        return json_response($data);

        return FriendRequest::where('to_user_id', 1)->get();*/
        //return UserResource::collection(User::search($request->term)->get());
    }
    
}
