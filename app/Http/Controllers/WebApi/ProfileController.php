<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProfileResource;
use App\User;

class ProfileController extends Controller
{

    public function get(){
        return new ProfileResource(\Auth::user());
    }

    public function show($id){
        $user = \Auth::user();
        $friends = $user->friends;
        $friendShipStatus = (bool)$friends->where('id', $id)->count();
        $requestStatus =  (bool)$user->FriendRequests->where('status', 0)->where('id', $id)->count();
        $friends->friendShipStatus = $friendShipStatus;

        $user = User::find($id);
        $user->friendShipStatus = $friendShipStatus;
        $user->requestStatus = $requestStatus;
        return new ProfileResource($user);
    }
}
