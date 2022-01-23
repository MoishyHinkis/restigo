<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AmountResource extends JsonResource
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
            'id' =>$this->id,
            'item_id' => $this->item_id,
            'order_id' => $this->order_id,
            'amount' =>$this->amount,
            'item' => new ItemResource($this->whenLoaded('item')),
            'order' => new OrderResource($this->whenLoaded('order'))
        ];
    }
}
