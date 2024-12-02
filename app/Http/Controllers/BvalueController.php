<?php

namespace App\Http\Controllers;

use App\Models\Bvalue;
use Illuminate\Http\Request;

class BvalueController extends Controller
{
    public function index()
    {
        $bvalues = Bvalue::all();
        return view('bvalue.index', compact('bvalues'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newBToB' => 'required|string|max:255',
        ]);

        // Create a new university
        Bvalue::create([
            'newBToB' => $request->newBToB,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'b to b added successfully!');
    }

    

    public function destroy($id)
    {
        $bvalues = Bvalue::findOrFail($id);
        $bvalues->delete();

        return redirect()->back()->with('success', 'bvalue removed successfully.');
    }
}
