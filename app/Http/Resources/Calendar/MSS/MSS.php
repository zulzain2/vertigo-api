<?php

namespace App\Http\Resources\Calendar\MSS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\MSS\Equipment as EquipResource;
use App\Http\Resources\Calendar\MSS\Transport as TransportResource;
use App\Http\Resources\Calendar\MSS\User as UserResource;

class MSS extends JsonResource
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
            'start_time' => [
                'hour' => intval(date('H', strtotime($this->start_date))),
                'minute' => intval(date('i', strtotime($this->start_date))),
            ],
            'end_time' => [
                'hour' => intval(date('H', strtotime($this->end_date))),
                'minute' => intval(date('i', strtotime($this->end_date))),
            ],
            'description' => $this->description,
            'status' => $this->status,
            'person_in_charge' => $this->msspic->count() > 0 ? UserResource::collection($this->msspic) : [],
            'vehicles' => $this->msstransport->count() > 0 ? TransportResource::collection($this->msstransport) : [],
            'equipments' => EquipResource::collection($this->mssequipment),
        ];
    }
}
