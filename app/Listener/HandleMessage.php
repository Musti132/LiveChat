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
        $chat = Chat::find(2);

        if(!$chat){
            dd("Helloi");
        }else{
            dd("trash");
        }
        
        Chat::create([
            'chat_id' => 8,
            'user_id' => $message->user_id,
            'subject' => $message->message,
            'message' => "test",
            'read' => 0,
            'status' => 0,
        ]);
    }
}
