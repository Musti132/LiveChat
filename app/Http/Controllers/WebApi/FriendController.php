<?php

namespace App\Http\Controllers\WebApi;

use App\FriendRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FriendRequestResource;
use App\User;

class FriendController extends Controller
{
    function get(){
        $data = FriendRequestResource::collection(FriendRequest::where('to_user_id', 1)->with('sendBy')->paginate(15));
        return json_response($data);
    }

    function getFriendRequest($id){
        return FriendRequest::where('to_user_id', \Auth::user()->id)->get();
    }
}
