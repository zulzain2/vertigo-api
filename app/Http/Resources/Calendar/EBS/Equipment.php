<?php

namespace App\Http\Resources\Calendar\EBS;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Calendar\EBS\EBS as EBSResource;

class Equipment extends JsonResource
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
            'image' => url($this->img_path),
            'tag_number' => $this->tag_number,
            'description' => $this->description,
            'category' => $this->equipmentcategory->name,
            'bookings' => EBSResource::collection($this->ebs($start_date, $end_date)),
        ];
    }
}
