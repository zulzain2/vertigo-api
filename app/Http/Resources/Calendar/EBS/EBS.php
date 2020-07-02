<?php

namespace App\Http\Resources\Calendar\EBS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\User as UserResource;
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
            'start_date' => date('Y-m-d', strtotime($this->start_date)),
            'end_date' => date('Y-m-d', strtotime($this->end_date)),
            'start_time' => [
                'hour' => intval(date('H', strtotime($this->start_date))),
                'minute' => intval(date('i', strtotime($this->start_date))),
            ],
            'end_time' => [
                'hour' => intval(date('H', strtotime($this->end_date))),
                'minute' => intval(date('i', strtotime($this->end_date))),
            ],
            'tag_number' => $this->tag_number,
            'job_number' => $this->job_number,
            'job_title' => $this->job_title,
            'status' => $this->status,
            'person_in_charge' => new UserResource(User::find($this->created_by)),
            'person_in_use' => UserResource::collection($this->staffs),
        ];
    }
}
