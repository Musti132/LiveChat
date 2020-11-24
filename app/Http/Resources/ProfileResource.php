<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
            'userId' => $this->id,
            'username' => ucwords($this->name),
            'joinedAt' => $this->created_at->diffForHumans(),
            'isFriend' => $this->friendShipStatus,
            'friendRequest' => $this->requestStatus,
            'friendsCount' => $this->friends->count(),
        ];
    }
}
