<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use CollectionHelper;
use App\Models\FriendRequest;
use App\Models\Friends;
use App\Http\Resources\UserResource;
use App\Http\Resources\FriendRequestResource;
use App\Http\Resources\ChannelResource;
use App\Http\Resources\ProfileResource;
use \Illuminate\Pagination\Paginator;
use App\Models\Channel;
use App\Models\ChannelMessage;

class SearchController extends Controller
{
    public function index(Request $request){
        return new ChannelResource(Channel::find(1));

        $user = User::find(1);
        $friends = $user->friends;
        $friendShipStatus = (bool)$friends->where('id', 1)->count();
        $requestStatus =  (bool)$user->FriendRequests->where('status', 0)->where('id', 47)->count();
        $friends->friendShipStatus = $friendShipStatus;

        $user = User::find(1);
        $user->friendShipStatus = $friendShipStatus;
        $user->requestStatus = $requestStatus;
        return new ProfileResource($user);

        return $requestStatus;
        //return $requestStatus = FriendRequest::where('to_user_id', $id)->where('user_id', \Auth::user()->id)->orWhere()->count();
        //$user = User::find(1)->whereHas('friendsOf', function($query){
        //    $query->where('user_id', 8);
        //})->count();
        $friends = User::find(38)->isFriend(1);
        dd($friends);
        return json_response(FriendsResource::collection(CollectionHelper::paginate($friends, 10)));
    }

    public function search(Request $request){
        
        $friends = User::search($request->term)->query(function($query) { 
            $query->select([
                'name',
                'id',
            ]);  
        })->get();
        
        $data = [
            'data' => $friends,
        ];

        return json_response($data);
    }
    
}
