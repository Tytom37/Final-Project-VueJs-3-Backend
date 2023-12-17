<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InventoryController extends Controller
{
    public function index() {
        $inventories = Inventory::with('game')->orderBy('id')->get();
        return response()->json($inventories);
    }

    public function update(Request $request, Inventory $inventory) {
        $fields = $request->validate([
            'game_id' => 'exists:games,id',
            'quantity' => 'integer',
            'total_price' => 'numeric|between:0,999999.99'
        ]);

        $inventory->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Inventory with ID# ' . $inventory->id . ' has been updated.',
        ]);
    }

    public function destroy(Inventory $inventory) {
        $inventory->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Inventory with ID# ' . $inventory->id . ' has been deleted.',
        ]);
    }
    

    public function store(Request $request) {
        $fields = $request->validate([
            'game_id' => 'required|exists:games,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);
    
        $game = Game::find($fields['game_id']);
    
        $inventory = Inventory::create($fields);
        $inventory->game()->associate($game);
        $inventory->save();
    
        return response()->json([
            'status' => 'OK',
            'message' => 'Inventory with ID# ' . $inventory->id . ' has been created.'
        ]);
    }
}
