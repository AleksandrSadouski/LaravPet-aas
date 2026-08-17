<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Pet;
use App\Http\Resources\PetResource;
use App\Http\Resources\PlayerResource;

class MenuController extends Controller
{
    public function createPet(Request $request)
    {
        $player = $request->user();
        $pet = new Pet();
        $pet->name_pet = input('name_pet');
        $pet->player_id = $player->id;
        $player->pet_amt++;
        $player->save();
        $pet->save();
        return new PlayerResource($player);
    }
    
    public function renamePet(Request $request)
    {
        $new_name = $request->input('new_name');
        $player = $request->user();
        $pet = $player->pet;
        $pet->name_pet = $new_name;
        $pet->save();
        return new PetResource($pet);
    }
    
    public function deletePet(Request $request)
    {
        $player = $request->user();
        $pet = $player->pet;
        $pet->delete();
        $player->pet_amt--;
        $player->save();
    }

    public function exitMenu(Request $request)
    {
        $player = $request->user();
        $player->tokens()->delete();
    }

    public function getPet(Request $request)
    {
        $player = $request->user();
        $pet = $player->pet;
        return new PetResource($pet);
    }
}
