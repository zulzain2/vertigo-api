<?php

namespace App\Http\Resources\Calendar\TMS;

use Illuminate\Http\Resources\Json\JsonResource;

class Client extends JsonResource
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
            'name' => $this->client_name,
            'start' => date('Y-m-d', strtotime($this->sitevisit_start_date)),
            'end' => date('Y-m-d', strtotime($this->sitevisit_end_date)),
        ];
    }
}
