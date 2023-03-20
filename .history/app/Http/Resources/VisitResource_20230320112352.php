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
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'token' => $this->token,
            images
notes
lat
long
start_time
end_time
duration
status
created_at
updated_at
contract
        ];
    }
}
/* "id": 1,
            "images": "2",
            "notes": "In dignissimos sequi voluptas occaecati. Tenetur consequuntur et dolorem nesciunt ex deleniti. Non et sit magnam voluptas voluptas.",
            "lat": 4.94610859,
            "long": 28.928,
            "start_time": "16:48:29",
            "end_time": "19:04:10",
            "duration": 23,
            "status": "start",
            "created_at": "2023-03-20T07:54:02.000000Z",
            "updated_at": "2023-03-20T07:54:02.000000Z",
            "contract": {
                "id": 1,
                "user": {
                    "id": 1,
                    "name": "Mr. Maximo Schiller",
                    "email": "novella66@example.org",
                    "deleted_at": null,
                    "created_at": "2023-03-20T07:54:02.000000Z",
                    "updated_at": "2023-03-20T07:54:02.000000Z"
                }
            } */