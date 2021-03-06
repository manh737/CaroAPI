<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User1 extends JsonResource
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
            'username' => $this->userName,
            'name' => $this->name,
            //'friendlist' => $this->friendlist,
            'lichsudau' => $this->lichSuDau,
            'thongke' => $this->thongKe,
            'avatar' => $this->avatar,
        ];
    }
}
