<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;
    
    protected $table = 'friend_requests';

    protected $fillable = [
        'user_id',
        'to_user_id',
        'status',
    ];

    public function sendTo(){
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function sendBy(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
