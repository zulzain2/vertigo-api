<?php

namespace App\Http\Resources\Calendar\EBS;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EBSCollection extends ResourceCollection
{
    protected $start_date;
    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function start_date($value)
    {
        $this->start_date = $value;
        return $this;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->each->start_date($this->start_date);
        return parent::toArray($request);
    }
}
