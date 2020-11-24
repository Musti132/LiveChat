<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChannelMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'from_id' => $this->user_id,
            'from_user' => $this->user->name,
            'message' => $this->message,
            'sent_at' => $this->created_at->diffForHumans(),
        ];
    }
}
