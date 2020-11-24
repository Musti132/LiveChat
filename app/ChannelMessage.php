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
        $this->belongsTo(Channel::class, 'owner_id');
    }
}
