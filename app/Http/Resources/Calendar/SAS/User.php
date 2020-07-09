<?php

namespace App\Http\Resources\Calendar\SAS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\SAS\SAS as SASResource;

class User extends JsonResource
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
            $bookings =  SASResource::collection($this->assignMonthly($month));
        } else {
            $date = date('Y-m-d', strtotime($request->start_date));
            $bookings = SASResource::collection($this->assignDaily($date));
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->img_path,
            'bookings' => $bookings,
        ];
    }
}
