<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return ['player_id' => $this->player_id,
        'name_pet' => $this->name_pet,
        'health' => $this->health,
        'mood' => $this->mood,
        'hunger' => $this->hunger,
        'energy' => $this->energy,
        'last_updated' => $this->last_updated];
    }
}