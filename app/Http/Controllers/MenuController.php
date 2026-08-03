<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Pet;

class MenuController extends Controller
{
    public function createPet(Request $request)
    {
        $player = $request->user();

    }
    
    public function renamePet(Request $request)
    {

    }
    
    public function deletePet(Request $request)
    {

    }

    public function exitMenu(Request $request)
    {
        $player = $request->user();
    }

    public function getPet(Request $request)
    {
        $player = $request->user();
        $pet = $player->pet();
        return new PetResource($pet);
    }
}
