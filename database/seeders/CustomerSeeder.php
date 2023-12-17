<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gameIds = Game::pluck('id')->toArray();

        Customer::factory(20)->create([
            'game_id' => function () use ($gameIds) {
                return array_rand(array_flip($gameIds));
            },
        ]);
    }
}
