<?php

namespace App\Http\Controllers;

use App\Models\Initiated;
use Illuminate\Http\Request;

class InitiatedController extends Controller
{
    public function index()
    {
        $initiateds = Initiated::all();
        return view('initiated.index', compact('initiateds'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newInitiated' => 'required|string|max:255',
        ]);

        // Create a new university
        Initiated::create([
            'newInitiated' => $request->newInitiated,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Initiated added successfully!');
    }

    

    public function destroy($id)
    {
        $initiateds = Initiated::findOrFail($id);
        $initiateds->delete();

        return redirect()->back()->with('success', 'Initiated removed successfully.');
    }
}
