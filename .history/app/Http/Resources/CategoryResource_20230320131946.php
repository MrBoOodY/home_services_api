<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CategoryResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "image" => $this->image,
            "services" => $this->services,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "image" => $this->image,
            "services" => $this->services,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
