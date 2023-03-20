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
            "image" => $this->image,
        ];/*  
        "id": 1,
        "name": "Vanessa Connelly",
        "images": 1,
        "description": "Repellat odio similique vitae atque nulla. Quia soluta repellendus aliquam. Autem facere et voluptatem at minus. Perspiciatis voluptatem fuga sapiente.",
        "created_at": "2023-03-20T10:02:39.000000Z",
        "updated_at": "2023-03-20T10:02:39.000000Z",
        "category": {
            "id": 1,
            "name": "January"
        } */
    }
}
