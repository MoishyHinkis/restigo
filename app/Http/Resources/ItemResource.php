<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'catalog_number' => $this->catalog_number,
            'scale' => $this->scale,
            'supllier_id' => $this->supllier_id,
            'price' => $this->price,
            'deposit' => $this->deposit,
            'supllier' =>new SupllierResource($this->whenLoaded('supllier')),
            'amounts' => AmountResource::collection($this->whenLoaded('amounts')),
            'draftAmount' =>new AmountResource($this->whenLoaded('draftAmount'))
        ]
;
    }
}
