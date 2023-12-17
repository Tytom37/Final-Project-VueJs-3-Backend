<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'quantity',
        'total_price'
    ];

    public function game() {
        return $this->belongsTo(Game::class);
    }
}
