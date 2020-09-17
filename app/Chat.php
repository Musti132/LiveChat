<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $primaryKey = "chat_id";
    protected $table = "chat";
    protected $fillable = [
        'chat_id',
        'user_id',
        'subject',
        'message',
        'read',
        'status',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
