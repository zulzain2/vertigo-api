<?php

namespace App\Http\Resources\Item;

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
            'image' => $this->img_path,
            'tag_number' => $this->tag_number,
            'description' => $this->description,
            'category' => $this->equipmentcategory->name,
        ];
    }
}
