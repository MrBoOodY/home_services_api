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
/*    {
            "id": 1,
            "images": "1",
            "notes": "Non autem numquam suscipit facere animi. Id sit qui dignissimos alias et. Temporibus esse et eius. Quos incidunt quos omnis culpa.",
            "lat": 22.700286341,
            "long": 11.1466982,
            "start_time": "17:22:05",
            "end_time": "06:23:25",
            "status": "delay",
            "created_at": "2023-03-20T07:54:02.000000Z",
            "updated_at": "2023-03-20T07:54:02.000000Z",
            "visit_request": {
                "id": 1,
                "user": {
                    "id": 1,
                    "name": "Mr. Maximo Schiller",
                    "email": "novella66@example.org"
                },
                "sales": {
                    "id": 1,
                    "name": "Mr. Maximo Schiller",
                    "email": "novella66@example.org"
                }
            }
        } */