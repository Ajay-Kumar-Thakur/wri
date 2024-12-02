<?php

namespace App\Http\Controllers;

use App\Models\Bikalp;
use Illuminate\Http\Request;

class BikalpController extends Controller
{
   
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'handled' => 'required|string',
            'source' => 'required|string',
            'b-to-b' => 'required|string',
            'b-to-c' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'location' => 'required|string',
            'english' => 'required|string',
            'score' => 'required|string',
            'test' => 'required|string',
            'lastqualification' => 'required|string',
            'universityandboard' => 'required|string',
            'passed' => 'required|string',
            'gpa' => 'required|numeric',
            'level' => 'required|string',
            'university13' => 'required|string',
            'course13' => 'required|string',
            'intake13' => 'required|string',
            'processing' => 'required|string',
            'university14' => 'required|string',
            'course14' => 'required|string',
            'intake14' => 'required|string',
            'university15' => 'required|string',
            'additional-info' => 'required|string',
            'course15' => 'required|string',
            'intake15' => 'required|string',
            'document' => 'required|string',
            'initiated' => 'required|string',
        ]);

        // Store the data in the database
        Bikalp::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bikalp data has been successfully stored!');
    }

    
}
