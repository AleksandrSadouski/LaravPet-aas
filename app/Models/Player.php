<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Player extends Model
{
    protected $fillable = ['name'];
    use HasApiTokens;
    
    public function pet()
    {
        return $this->hasOne(Pet::class, 'player_id');
    }
}
