<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChannelListResource extends JsonResource
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
            'channel_id' => $this->id,
            'channel_topic' => $this->topic,
            'channel_name' => $this->name,
            'channel_owner' => $this->owner->name,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
