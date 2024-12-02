<?php

namespace App\Http\Controllers;

use App\Models\Processing;
use Illuminate\Http\Request;

class ProcessingController extends Controller
{
    public function index()
    {
        $processings = Processing::all();
        return view('processing.index', compact('processings'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newProcessing' => 'required|string|max:255',
        ]);

        // Create a new university
        Processing::create([
            'newProcessing' => $request->newProcessing,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'processing added successfully!');
    }

    

    public function destroy($id)
    {
        $processings = Processing::findOrFail($id);
        $processings->delete();

        return redirect()->back()->with('success', 'processing removed successfully.');
    }
    
}
