<?php

namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Channel;
use App\ChannelMessage;

class ChannelController extends Controller
{
    public function details($id){
        return Channel::find($id);
    }

    public function sendMessage(Request $request, $id){
        //Check if channel exists
        $channel = Channel::findOrFail($id);

        $message = new ChannelMessage([
            'user_id' => $request->user()->id,
            'message' => $request->message,
        ]);

        $channel->messages()->save($message);

        return json_response([
            'status' => 'success',
            'message' => 'Message succesfully sent!',
        ]);
    }
}
