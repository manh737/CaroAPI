<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GetRoomcl extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects = 'App\Http\Resources\GetRoom';
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
