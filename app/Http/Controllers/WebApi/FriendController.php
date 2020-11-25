<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FriendRequestResource;
use App\Http\Resources\FriendsResource;
use CollectionHelper;
use App\Friends;
use App\FriendRequest;

class FriendController extends Controller
{
    function index(){
        $friends = \Auth::user()->friends;
        return json_response(FriendsResource::collection(CollectionHelper::paginate($friends, 10)));
    }

    function getFriendRequest(){
        $data = FriendRequestResource::collection(FriendRequest::where('to_user_id', \Auth::user()->id)->with('sendBy')->where('status', 0)->paginate(15));
        return json_response($data);
    }

    function accept(Request $request){
        $requestId = $request->requestId;
        
        $getRequest = FriendRequest::find($requestId);
        $getRequest->status = 1;
        $getRequest->save();
        
        Friends::create([
            'user_id' => $getRequest->user_id,
            'friend_id' => $getRequest->to_user_id,
            'request_id' => $getRequest->id,
        ]);

        return json_response([
            'status' => 'success',
        ]);
    }
    

    function decline($id){
        $requestId = $id;

        FriendRequest::find($requestId)->delete();

        return json_response([
            'status' => 'success',
        ]);
    }

    function add(Request $request){
        $userId = $request->userId;
        $existFriendRequest = FriendRequest::where('to_user_id', $userId)->where('user_id', \Auth::user()->id)->first();
        
        if($existFriendRequest){
            return json_response([
                'status' => 'failed',
                'message' => 'Already sent friend request',
            ]);
        }

        FriendRequest::create([
            'user_id' => \Auth::user()->id,
            'to_user_id' => $userId,
        ]);

        return json_response([
            'status' => 'success',
        ]);
    }
}
