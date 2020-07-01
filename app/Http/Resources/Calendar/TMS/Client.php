<?php

namespace App\Http\Resources\Calendar\TMS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\User as UserResource;
use App\User;

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
            'created_by' => new UserResource(User::find($this->created_by)),
        ];
    }
}
