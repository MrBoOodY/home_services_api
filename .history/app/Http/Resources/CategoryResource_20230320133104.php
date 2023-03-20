<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class CategoryResource extends JsonResource
{
    public function __construct($request, bool $withRelation = false)
    {
        if ($withRelation) {
            return $this->toArrayWithRelation($request);
        } else {
            return $this->toArray($request);
        }
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
            "id" => $this->id ?? null,
            "name" => $this->name ?? null,
            "image" => $this->image ?? null,
            "created_at" => $this->created_at ?? null,
            "updated_at" => $this->updated_at ?? null,
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArrayWithRelation($request): array|Arrayable|JsonSerializable
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
