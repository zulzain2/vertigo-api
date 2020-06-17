<?php

namespace App\Http\Resources\Calendar\EBS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\EBS\User as UserResource;
use App\User;

class EBS extends JsonResource
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
            'date' => $this->start_date,            
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'tag_number' => $this->tag_number,
            'job_number' => $this->job_number,
            'status' => $this->status,
            'person_in_charge' => new UserResource(User::find($this->created_by)),
            'person_in_use' => UserResource::collection($this->staffs),
        ];
    }
}
