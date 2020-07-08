<?php

namespace App\Http\Resources\Calendar\SAS;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonInUse extends JsonResource
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
            'id' => $this->user->id,
            'name' => $this->user->name,
            'image' => url($this->user->img_path),
        ];
    }
}
