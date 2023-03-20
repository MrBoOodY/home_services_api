<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class VisitResource extends JsonResource
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
            "user_id"=>$this->user_id,
            "sales_id"=>$this->sales_id,
            "notes"=>$this->notes,
            "lat"=>$this->lat,
            "long"=>$this->long,
            "status"=>$this->status,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            "user"=>$this->user,
            "sales"=>$this->sales,
        ];
    }
}/*  
 
            "user_id": 11,
            "sales_id": 12,
            "notes": "Illum illum assumenda facere molestiae id rem quis. Adipisci dignissimos sed aut beatae eum ipsa et. Sit ut eum soluta ratione quisquam quo. Ipsam recusandae cupiditate aliquam nemo laboriosam voluptas sed dolor.",
            "lat": 14.58028,
            "long": 22.97649,
            "status": "contract",
            "created_at": "2023-03-20T07:54:02.000000Z",
            "updated_at": "2023-03-20T07:54:02.000000Z",
            "user": {
                "id": 1,
                "name": "Mr. Maximo Schiller",
                "email": "novella66@example.org"
            },
            "sales": {
                "id": 1,
                "name": "Mr. Maximo Schiller",
                "email": "novella66@example.org"
            } */
