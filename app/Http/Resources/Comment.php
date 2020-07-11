<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
            'name' => $this->usercomment->name,
            'comment' => $this->comment,
            'date' => date('Y-m-d H:i:s',  strtotime($this->created_at)),
        ];
    }
}
