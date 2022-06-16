<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'image' => Storage::url($this['image']),
            'title' => $this['title'],
            'description' => $this['description'],
            'price' => $this['price'],
            'quantity' => $this['quantity'],
            'pharmacies' => PharmaciesResource::collection($this['pharmacies'])
        ];
    }
}
