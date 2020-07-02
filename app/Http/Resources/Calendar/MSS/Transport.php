<?php

namespace App\Http\Resources\Calendar\MSS;

use Illuminate\Http\Resources\Json\JsonResource;

class Transport extends JsonResource
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
            'id' => $this->transport == null ? '' : $this->transport->id,
            'name' => $this->transport == null ? '' : $this->transport->name,
        ];
    }
}
