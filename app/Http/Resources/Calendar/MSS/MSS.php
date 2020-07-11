<?php

namespace App\Http\Resources\Calendar\MSS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\MSS\Equipment as EquipResource;
use App\Http\Resources\Calendar\MSS\Transport as TransportResource;
use App\Http\Resources\Calendar\MSS\User as UserResource;
use App\Http\Resources\Calendar\User as CreatedResource;
use App\User;

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
        $time = getStartEndTime($request->start_date, $this->start_date, $this->end_date);

        return [
            'id' => $this->id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'start_time' => $time['start_time'],
            'end_time' => $time['end_time'],
            'description' => $this->description,
            'status' => $this->status,
            'created_by' => new CreatedResource(User::find($this->created_by)),
            'person_in_charge' => $this->msspic->count() > 0 ? UserResource::collection($this->msspic) : [],
            'vehicles' => $this->msstransport->count() > 0 ? TransportResource::collection($this->msstransport) : [],
            'equipments' => EquipResource::collection($this->mssequipment),
        ];
    }
}
