<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'quantity',
        'price',
        'image'
    ];

    public function inventory() {
        return $this->hasMany(Inventory::class);
    }

    public function customer() {
        return $this->hasMany(Customer::class);
    }
}
