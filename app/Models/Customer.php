<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'connum',
        'address',
        'email'
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }
}
