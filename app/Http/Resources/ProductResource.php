<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //判断image里是否存在http:或https:如果不存在，加上相应APP_URL
        if(!preg_match("/^(http:\/\/|https:\/\/).*$/",$this->image)){
            $this->image=env('APP_URL').'/'.$this->image;
        }

        return [
            "id"=>$this->id,
            "status"=>$this->status,
            "stock"=>$this->stock,
            "sales"=>$this->sales,
            "rank"=>$this->rank,
            "title"=>$this->title,
            "note"=>$this->note,
            "image"=>$this->image,
            "brand"=>$this->brand,
            "summary"=>$this->summary,
            "description"=>$this->description,
            "specification"=>$this->specification,
            "dimension"=>$this->dimension,
            "shipment"=>$this->shipment,
            "category_id"=>$this->category_id,
            "subject"=>$this->subject,
            "interest"=>$this->interest,
            "region"=>$this->region,
            "code"=>$this->code,
            "label"=>$this->label,
            "ageRange"=>$this->ageRange,
            "original_price"=>$this->original_price,
            "special_price"=>$this->special_price,
            "link"=>$this->link,
            "created_at"=>$this->create_at,
            "updated_at"=>$this->update_at,
            'category'=>new ProductCategoryResource($this->whenLoaded('category'))

        ];
    }
}
