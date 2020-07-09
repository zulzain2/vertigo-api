<?php

namespace App\Http\Resources\Calendar\TBS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\TBS\TBS as TBSResource;

class Transport extends JsonResource
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
            $bookings =  TBSResource::collection($this->tbsMonthly($month));
        } else {
            $date = date('Y-m-d', strtotime($request->start_date));
            $bookings = TBSResource::collection($this->tbsDaily($date));
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => url($this->img_path),
            'plate_number' => $this->plate_number,
            'description' => $this->description,
            'category' => $this->transportcategory->name,
            'bookings' => $bookings,
        ];
    }
}
