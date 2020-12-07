<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            "id"=>$this->id,
            "imgurl"=>$this->imgurl,
            "label"=>$this->label,
            "title"=>$this->title,
            "note"=>$this->note,
            "opentype"=>$this->opentype,
            "openurl"=>$this->openurl,
            "status"=>$this->status,
            "rank"=>$this->rank,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at
        ];

    }
}
