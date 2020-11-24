<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FriendRequestResource extends JsonResource
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
            'request_id' => $this->id,
            'user_id' => $this->sendBy->id,
            'received_by' => $this->sendBy->name,
            'received_at' => $this->created_at->diffForHumans(),
        ];
    }
}
