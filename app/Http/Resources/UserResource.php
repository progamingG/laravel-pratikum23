<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => (string) $this->id,
            "relationsheep" => [
                'user_name' => $this->users->name
            ]
        ];
    }
}
