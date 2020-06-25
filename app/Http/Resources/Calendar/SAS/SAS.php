<?php

namespace App\Http\Resources\Calendar\SAS;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'id' => $this->sas->id,
            'start_time' => [
                'hour' => intval(date('H', strtotime($this->start_date))),
                'minute' => intval(date('i', strtotime($this->start_date))),
            ],
            'end_time' => [
                'hour' => intval(date('H', strtotime($this->end_date))),
                'minute' => intval(date('i', strtotime($this->end_date))),
            ],
            'job_number' => $this->sas->job_number,
            'job_title' => $this->sas->job_title,
            'status' => $this->status,
        ];
    }
}
