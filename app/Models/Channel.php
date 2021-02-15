<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $table = 'channel';

    protected $fillable = [
        'name',
        'topic',
        'owner_id',
    ];

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function messages(){
        return $this->hasMany(ChannelMessage::class, 'channel_id');
    }
}
