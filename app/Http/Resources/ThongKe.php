<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class thongkers extends JsonResource
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
            'name' => $this->name,
            'gamecount'=> $this->gameCount,
            'win'=> $this->win,
            'lose'=> $this->lose,
            'draw'=> $this->draw,
        ];
    }
}
