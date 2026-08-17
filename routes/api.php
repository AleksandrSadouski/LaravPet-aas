<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GameController;

Route::post('/auth/signin', [AuthController::class, 'login'])->middleware('throttle:3,1');
Route::post('/auth/register', [AuthController::class, 'register'])->middleware('throttle:6,1');

Route::middleware('auth:sanctum')->group(function () {
Route::put('/menu/editor', [MenuController::class, 'createPet']);
Route::patch('/menu/editor', [MenuController::class, 'renamePet']);
Route::delete('/menu/editor', [MenuController::class, 'deletePet']);
Route::delete('/menu/logout', [MenuController::class, 'exitMenu']);
Route::get('/menu/pet', [MenuController::class, 'getPet']);

Route::post('/game/play', [GameController::class, 'playPet']);
Route::post('/game/feed', [GameController::class, 'feedPet']);
Route::post('/game/sleep', [GameController::class, 'sleepPet']);
Route::post('/game/heal', [GameController::class, 'healPet']);
});