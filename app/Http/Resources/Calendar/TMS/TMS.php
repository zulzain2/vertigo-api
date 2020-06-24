<?php

namespace App\Http\Resources\Calendar\TMS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\TMS\Client as ClientResource;

class TMS extends JsonResource
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
            'vtsb_no' => $this->vtsb_num,
            'clients' => ClientResource::collection($this->getClients($this->vtsb_num)),
        ];
    }
}
