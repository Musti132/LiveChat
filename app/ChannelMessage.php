<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelMessage extends Model
{
    protected $table = 'channel_messages';

    protected $fillable = [
        'id',
        'channel_id',
        'message',
        'user_id',
    ];

    public function channel(){
        return $this->belongsTo(Channel::class, 'owner_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
