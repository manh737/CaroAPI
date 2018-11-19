<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GetRoom extends JsonResource
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
            'id' => $this->id,
            'host_id' => $this->host_id,
            'roomname' => $this->roomname,
            'room_no' => $this->room_no,
            'join_id' => $this->join_id,
        ];
    }
}
