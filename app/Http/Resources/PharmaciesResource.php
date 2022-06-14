<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmaciesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arr = [
            'id' => $this['id'],
            'name' => $this['name'],
            'address' => $this['address'],
        ];

        if (isset($this['pivot'])) {
            $arr['priceInPharmacy'] = $this['pivot']->price ?? null;
        }

        return $arr;
    }
}
