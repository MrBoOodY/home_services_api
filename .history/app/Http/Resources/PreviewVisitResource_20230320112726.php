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
            "id"
            "images"
            "notes"
            "lat"
            "long"
            "start_time"
            "end_time"
            "status"
            "created_at"
            "updated_at"
            "visit_request"
        ];
    }
}
 