<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatReply extends Model
{
    protected $table = "chat_reply";
    protected $fillable = [
        'chat_id',
        'user_id',
        'message',
    ];

    public function chat(){
        return $this->belongsTo(Chat::class);
    }
}
