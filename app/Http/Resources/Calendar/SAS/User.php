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
        if ($request->has('start_date')) {
            $start_date = date('Y-m-d', strtotime($request->start_date));
        } else {
            $start_date = date('Y-m-d', strtotime(now()));
        }
        $end_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->img_path,
            'bookings' => SASResource::collection($this->assigns($start_date, $end_date)),
        ];
    }
}
