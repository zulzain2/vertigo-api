<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Equipment as EquipmentResource;

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'tag_number' => $this->tag_number,
            'job_number' => $this->job_number,
            'status' => $this->status,
            'equipments' => EquipmentResource::collection($this->equipments),
            'staffs' => UserResource::collection($this->staffs),
            'date' => date('d M Y', strtotime($this->created_at)),
        ];
    }

}
