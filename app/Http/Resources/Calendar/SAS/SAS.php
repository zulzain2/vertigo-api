<?php

namespace App\Http\Resources\Calendar\SAS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\SAS\PersonInUse as UserResource;

class SAS extends JsonResource
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
            'id' => $this->sas->id,
            'start_date' => date('Y-m-d', strtotime($this->start_date)),
            'end_date' => date('Y-m-d', strtotime($this->end_date)),
            'start_time' => $time['start_time'],
            'end_time' => $time['end_time'],
            'job_number' => $this->sas->job_number,
            'job_title' => $this->sas->job_title,
            'status' => $this->status,
            'person_in_use' => UserResource::collection($this->sas->sasstaffassign),
        ];
    }
}
