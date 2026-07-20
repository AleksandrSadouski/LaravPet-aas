<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class GameController extends Controller
{
    public function playPet(Request $request, Pet $pet)
    {}

    public function feedPet(Request $request, Pet $pet)
    {}

    public function sleepPet(Request $request, Pet $pet)
    {}

    public function healPet(Request $request, Pet $pet)
    {}
}
