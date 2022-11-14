<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->product_name,
            'description'=>$this->product_description,
            'price'=>$this->product_price,
            'image'=>$this->product_image,
            'brand'=>$this->brand()->get('brand_name')
        ];
    }
}
