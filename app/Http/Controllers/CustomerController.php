<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Moodels\Game;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::with('game')->orderBy('id')->get();
        return response()->json($customers);
    }

    public function show(Customer $customer) {
        return response()->json($customer);
    }

    public function store(Request $request, Customer $customer) {
        $fields = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'required|string',
            'connum' => 'required|string',
            'address' => 'nullable|string',
            'email' => 'required|email'
        ]);

        $customer = Customer::create($fields);

        return response()->json([
            'status' => "OK",
            'message' => 'Customer with ID# ' . $customer->id . ' has been created'
        ]);
    }

    public function update(Request $request, Customer $customer) {
        $fields = $request->validate([
            'game_id' => 'exists:games,id',
            'name' => 'string',
            'connum' => 'string',
            'address' => 'string',
            'email' => 'string',
        ]);

        $customer->update($fields);

        return response()->json([
            'status' => 'OK',
            'message' => 'Customer with ID# ' . $customer->id . ' has been updated.'
        ]);
    }

    public function destroy(Customer $customer) {
        $customer->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'The customer '. $customer->name .  ' has been deleted.'
        ]);
    }
}
