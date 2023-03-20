<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class PreviewVisitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'id' => $this->id,
            "images" => $this->images,
            "notes" => $this->notes,
            "lat" => $this->lat,
            "long" => $this->long,
            "start_time" => $this->start_time,
            "end_time" => $this->end_time,
            "duration" => $this->duration,
            "status" => $this->status,
            "contract" => $this->contract,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
