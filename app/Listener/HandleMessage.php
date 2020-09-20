<?php

namespace App\Listener;

use App\Events\SendMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Chat;

class HandleMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMessage  $event
     * @return void
     */
    public function handle(SendMessage $message){
        return json_response([
            'user_id' => $message->user_id,
            'message' => $message->message,
            'chat_id' => $message->chat_id,
        ]);
    }
}
