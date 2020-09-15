<?php

namespace App\Listener;

use App\Events\NewChat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewChat
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewChat  $event
     * @return void
     */
    public function handle(NewChat $event)
    {
        //
    }
}
