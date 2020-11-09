<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use CollectionHelper;
use App\FriendRequest;
use App\Friends;
use App\Http\Resources\UserResource;
use App\Http\Resources\FriendRequestResource;
use App\Http\Resources\FriendsResource;
use App\Http\Resources\ProfileResource;
use \Illuminate\Pagination\Paginator;

class SearchController extends Controller
{
    public function index(Request $request){
        
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
