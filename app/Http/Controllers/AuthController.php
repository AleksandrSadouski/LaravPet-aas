<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Http\Resources\PlayerResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $player = Player::where('name', $name)->first();
        if (!$player || !Hash::check($password, $player->password))
            {
                return response()->json(['error' => 'Incorrect data'], 401);
            }
        $player->tokens()->delete();
        $token = $player->createToken('auth-token')->plainTextToken;
        return response()->json(['status' => 'success',
        'message' => 'Successful login to player',
        'player' => new PlayerResource($player), 
        'token' => $token], 200);        
    }
    
    public function register(RegisterRequest $request)
    {
        $name = $request->input('name');
        $password = Hash::make($request->input('password'));
        $player = new Player();
        $player->name = $name;
        $player->password = $password;
        $player->save();
        $token = $player->createToken('auth-token')->plainTextToken;
        return response()->json(['status' => 'success',
        'message' => 'Successful player creation'
        'player' => new PlayerResource($player), 
        'token' => $token], 200);
    }
}
