<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('scholarship.index', compact('scholarships'));
    }

    // Store a new location
    public function store(Request $request)
    {
        $request->validate([
            'newScholarship' => 'required|string|max:255',  // Validation
        ]);

        // Create a new location record
        Scholarship::create([
            'newScholarship' => $request->newScholarship,
        ]);

        return redirect()->back()->with('success', 'Scholarship added successfully.');
    }

    // Delete an existing location
    public function destroy($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        $scholarship->delete();

        return redirect()->back()->with('success', 'Scholarship removed successfully.');
    }
}
