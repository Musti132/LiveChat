<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Channel;
use App\ChannelMessage;
use App\Http\Resources\ChannelResource;
use App\Events\MessageChannel;
use App\Http\Resources\ChannelMessageResource;

class ChannelController extends Controller
{
    public function details($id){
        return new ChannelResource(Channel::find($id));
    }

    public function sendMessage(Request $request, $id){
        //Check if channel exists
        $channel = Channel::findOrFail($id);

        $message = new ChannelMessage([
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        $channel->messages()->save($message);
        
        event(new MessageChannel(new ChannelMessageResource([
            'user_id' => $message->user_id,
            'message' => $message->message,
            'created_at' => $message->created_at->diffForHumans(),
            'from_user' => $message->user,
        ])));

        return json_response([
            'status' => 'success',
            'message' => 'Message succesfully sent!',
        ]);
    }
}
