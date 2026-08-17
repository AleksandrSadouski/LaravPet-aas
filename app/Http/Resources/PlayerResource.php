<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PetResource;

class PlayerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return ['id' => $this->id,
        'name' => $this->name,
        'pet_amt' => $this->pet_amt,
        'points' => $this->points,
        'pet' => new PetResource($this->whenLoaded('pet'))];
    }
}
