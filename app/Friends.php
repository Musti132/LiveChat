<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $table = 'user_friends';

    protected $fillable = [
        'user_id',
        'friend_id',
        'request_id',
    ];

    public function request(){
        return $this->belongsTo(FriendRequest::class);
    }
}
