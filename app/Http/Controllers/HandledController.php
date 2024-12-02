<?php

namespace App\Http\Controllers;

use App\Models\Handled;
use Illuminate\Http\Request;

class HandledController extends Controller
{
    public function index()
    {
        $handleds = Handled::all();
        return view('handled.index', compact('handleds'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newHandled' => 'required|string|max:255',
        ]);

        // Create a new university
        Handled::create([
            'newHandled' => $request->newHandled,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'student handle added successfully!');
    }

    

    public function destroy($id)
    {
        $handleds = Handled::findOrFail($id);
        $handleds->delete();

        return redirect()->back()->with('success', 'student handled removed successfully.');
    }
}
