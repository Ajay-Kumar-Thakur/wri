<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming data
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'initiated' => 'required|string|max:255',
            'processing' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'intake' => 'required|string|max:255',
            'offer' => 'required|string|max:255',
        ]);

        // Store the validated data in the database
        Student::create($validated);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student data has been successfully stored!');

    }

    
}
