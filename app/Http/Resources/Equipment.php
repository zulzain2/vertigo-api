<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Equipment extends JsonResource
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
            'name' => $this->name,
            'image' => url($this->img),
            'tag_number' => $this->tag_number,
            'description' => $this->description,
            'category' => $this->equipmentcategory->name,
        ];
    }
}
