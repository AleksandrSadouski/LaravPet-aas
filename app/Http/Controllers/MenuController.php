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
        $pet->name_pet = $request->input('name_pet');
        $pet->player_id = $player->id;
        $player->pet_amt++;
        $player->save();
        $pet->save();
        return response()->json(['status' => 'success',
        'message' => 'Pet created',
        'pet' => new PetResource($pet)], 200);
    }
    
    public function renamePet(Request $request)
    {
        $new_name = $request->input('new_name');
        $player = $request->user();
        $pet = $player->pet;
        $pet->name_pet = $new_name;
        $pet->save();
        return response()->json(['status' => 'success',
        'message' => 'Pet renamed',
        'pet' => new PetResource($pet)], 200);
    }
    
    public function deletePet(Request $request)
    {
        $player = $request->user();
        $pet = $player->pet;
        $pet->delete();
        $player->pet_amt--;
        $player->save();
        return response()->json(['status' => 'success',
        'message' => 'Pet deleted'], 200);
    }

    public function exitMenu(Request $request)
    {
        $player = $request->user();
        $player->tokens()->delete();
        return response()->json(['status' => 'success',
        'message' => 'Exit the menu'], 200);
    }

    public function getPet(Request $request)
    {
        $player = $request->user();
        $pet = $player->pet;
        return response()->json(['status' => 'success',
        'message' => 'Pet has been gived',
        'pet' => new PetResource($pet)], 200);
    }
}
