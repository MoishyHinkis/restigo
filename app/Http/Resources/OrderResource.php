<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'supllier_id' => $this->supllier_id,
            'sent_at' =>$this->sent_at,
            'supllier' =>  new SupllierResource($this->whenLoaded('supllier')),
            'amounts' => AmountResource::collection($this->whenLoaded('amounts')),
            'worth' => $this->worth,
            'due' => $this->due
        ];
    }
}
