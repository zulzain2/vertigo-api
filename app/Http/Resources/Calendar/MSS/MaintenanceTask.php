<?php

namespace App\Http\Resources\Calendar\MSS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\MSS\MSS as MSSResource;

class MaintenanceTask extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->type == 'monthly') {
            $month = date('m', strtotime($request->start_date));
            $bookings =  MSSResource::collection($this->mssMonthly($month));
        } else {
            $date = date('Y-m-d', strtotime($request->start_date));
            $bookings = MSSResource::collection($this->mssDaily($date));
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'bookings' => $bookings,
        ];
    }
}
