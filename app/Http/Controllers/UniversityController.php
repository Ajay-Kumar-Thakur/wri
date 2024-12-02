<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;


class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('university.index', compact('universities'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newUniversity' => 'required|string|max:255',
        ]);

        // Create a new university
        University::create([
            'newUniversity' => $request->newUniversity,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'University added successfully!');
    }

    

    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        return redirect()->back()->with('success', 'university removed successfully.');
    }
    
    
}


