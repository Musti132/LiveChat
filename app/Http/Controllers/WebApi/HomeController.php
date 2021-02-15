<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ChatReply;
use App\Models\FriendRequest;

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
