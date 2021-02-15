<?php

namespace App\Models;

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

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend(){
        return $this->belongsTo(User::class, 'friend_id');
    }
}
