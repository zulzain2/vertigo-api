<?php

namespace App\Http\Resources\Calendar\TBS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\User as UserResource;
use App\User;

class TBS extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $time = getStartEndTime($request->start_date, $this->start_date, $this->end_date);

        return [
            'id' => $this->id,
            'start_date' => date('Y-m-d', strtotime($this->start_date)),
            'end_date' => date('Y-m-d', strtotime($this->end_date)),
            'start_time' => $time['start_time'],
            'end_time' => $time['end_time'],
            'tag_number' => $this->tag_number,
            'job_number' => $this->job_number,
            'job_title' => $this->job_title,
            'status' => $this->status,
            'person_in_charge' => new UserResource(User::find($this->created_by)),
            'person_in_use' => UserResource::collection($this->staffs),
        ];
    }
}
