<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'handled' => 'required|string',
            'source' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'location' => 'required|string',
            'english' => 'required|string',
            'passed' => 'required|string',
            'gpa' => 'required|numeric',
            'level' => 'required|string',
            'university' => 'required|string',
            'course' => 'required|string',
            'intake' => 'required|string',
            'processing' => 'required|string',
            'document' => 'required|string',
            'initiated' => 'required|string',
        ]);

        // Store the data in the database
        Employee::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Employee data has been successfully stored!');
    }
}
