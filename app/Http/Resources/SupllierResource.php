<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupllierResource extends JsonResource
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
            'customer_number' => $this->customer_number,
            'min_order' => $this->min_order,
            'logo' => $this->logo,
            'items' =>  ItemResource::collection($this->whenLoaded('items')),
            'orders' => $this->whenLoaded('orders'),
            'draftOrder' => new OrderResource($this->draftOrder)
        ];
    }
}
