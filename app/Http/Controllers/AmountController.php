<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    public function index()
    {
        $amounts = Amount::all();
        return view('amount.index', compact('amounts'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newAmount' => 'required|string|max:255',
        ]);

        // Create a new university
        Amount::create([
            'newAmount' => $request->newAmount,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'University added successfully!');
    }

    

    public function destroy($id)
    {
        $amount = Amount::findOrFail($id);
        $amount->delete();

        return redirect()->back()->with('success', 'amount removed successfully.');
    }
    
}
