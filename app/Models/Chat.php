<?php

namespace App\Models;

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

    public function receiver(){
        $this->belongsTo(User::class);
    }

    public function sender(){
        $this->belongsTo(User::class);
    }

    public function message(){
        return $this->hasMany(ChatReply::class);
    }

}
