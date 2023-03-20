<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "images" => $this->images,
            "description" => $this->description,
            "category" => $this->category,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
