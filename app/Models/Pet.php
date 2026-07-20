<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = ['name_pet'];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
