<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Chat;
use App\ChatReply;
use App\FriendRequest;

class HomeController extends Controller
{
    public function details(){

        $friendRequestsCount = \Auth::user()->friendRequests->count();
        $data = [
            'data' => $friendRequestsCount,
        ];
        
        return response($data);
    }
}
