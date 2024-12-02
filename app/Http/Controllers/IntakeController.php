<?php

namespace App\Http\Controllers;

use App\Models\Intake;
use Illuminate\Http\Request;

class IntakeController extends Controller
{
 
    public function index()
    {
        $intakes = Intake::all();
        return view('intake.index', compact('intakes'));
    }

    // Store a new location
    public function store(Request $request)
    {
        $request->validate([
            'newIntake' => 'required|string|max:255',  // Validation
        ]);

        // Create a new location record
        Intake::create([
            'newIntake' => $request->newIntake,
        ]);

        return redirect()->back()->with('success', 'intake added successfully.');
    }

    // Delete an existing location
    public function destroy($id)
    {
        $intake = Intake::findOrFail($id);
        $intake->delete();

        return redirect()->back()->with('success', 'intake removed successfully.');
    }
}
