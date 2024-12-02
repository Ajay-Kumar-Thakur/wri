<?php

namespace App\Http\Controllers;

use App\Models\Bcvalue;
use Illuminate\Http\Request;

class BcvalueController extends Controller
{
    public function index()
    {
        $bcvalues = Bcvalue::all();
        return view('bcvalue.index', compact('bcvalues'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newBtoC' => 'required|string|max:255',
        ]);

        // Create a new university
        Bcvalue::create([
            'newBtoC' => $request->newBtoC,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'University added successfully!');
    }

    

    public function destroy($id)
    {
        $bcvalues = Bcvalue::findOrFail($id);
        $bcvalues->delete();

        return redirect()->back()->with('success', 'university removed successfully.');
    }
    
}
