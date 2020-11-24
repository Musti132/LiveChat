<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channel';

    protected $fillables = [
        'name',
        'topic',
        'owner_id',
    ];

    public function owner(){
        $this->belongsTo(User::class, 'owner_id');
    }

    public function messages(){
        return $this->hasMany(ChannelMessage::class, 'channel_id');
    }
}
