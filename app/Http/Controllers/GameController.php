<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Inventory;
use App\Models\Customer;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function getImage(Game $game) {
        $game = Game::findOrFail($game);

        if ($game->image) {
            $path = Storage::disk('public')->path($game->image);
            return response()->file($path);
        }

        return response()->json(['message' => 'Image not found'], 404);
    }

    public function index() {
        $games = Game::orderBy('id')->get();
        return response()->json($games);
    }

    public function show(Game $game) {
        $game->load('order');
        return response()->json($game);
    }

    public function store(Request $request, Game $game) {
        $fields = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|between:0,999999.99',
            'image' => 'required|string'
        ]);

        $game = Game::create($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Game with ID# ' . $game->id . ' has been created.'
        ]);
    }

    public function update(Request $request, Game $game) {
        $fields = $request->validate([
            'name' => 'string',
            'quantity' => 'integer',
            'price' => 'numeric|between:0,999999.99',
            'image' => 'string'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('game_images', 'public');
            $game->image = $imagePath;
        }

        $game->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Game with ID# ' . $game->id . ' has been updated.'
        ]);
    }

    public function destroy(Game $game) {
        $game->delete();
        return response()->json([
            'status' => 'OK',
            'message' => 'Game with ID# ' . $game->id . ' has been deleted.'
        ]);
    }
}
