<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::all();
        return view('backend.form.index', compact('forms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = Form::first();
        return view('backend.form.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
        
            'source' => 'required|string|max:255',
            'handled' => 'required|string|max:20', 
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'university' => 'required|string|max:255',
            'intake' => 'required|string',
            'email' => 'required|email|max:255', 
            'country' => 'required|string',
            'level' => 'required|string', 
            'course' => 'required|string',
            'processing' => 'required|string',
            'english' => 'required|string',
            'gpa' => 'required|numeric', 
            'passed' => 'required|string',
            'document' => 'required|string',
            'remarks' => 'required|string',
            'initiated' => 'required|string',
            'interview' => 'required|string',
            'visa' => 'required|string',
            'noc' => 'required|string',
            'fees' => 'required|string',
            'amount' => 'required|numeric',
            'scholarship' => 'required|string',
            'offer' => 'required|string',
        ]);
    
        try {
            // Store the form data
            Form::create($request->only([
                 'source', 'handled', 'name', 'phone', 'university', 'intake', 'email', 'country', 'level', 'course', 'processing', 
                'english', 'gpa', 'passed', 'document', 'remarks', 'initiated', 'interview', 'visa', 'noc', 'fees', 'amount', 'scholarship', 'offer'
            ]));
    
            // Redirect with success message
            return redirect()->route('backend.form.index')->with('success', 'Form created successfully');
        } catch (\Exception $e) {
            // Handle errors
            return redirect()->back()->withErrors('Failed to create form: ' . $e->getMessage())->withInput();
        }
    }
    


    
    
 

    
    

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Find the form by its ID or fail with a 404 response if not found
    $form = Form::findOrFail($id);

    // Return the 'backend.form.update' view with the form data compacted
    return view('backend.form.update', compact('form'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'source' => 'required|string|max:255',
            'handled' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'country' => 'required|string',
            'level' => 'required|string',
            'course' => 'required|string',
            'processing' => 'required|string',
            'english' => 'required|string',
            'gpa' => 'required|numeric',
            'passed' => 'required|string',
            'document' => 'required|string',
            'remarks' => 'required|string',
            'initiated' => 'required|string',
            'amount' => 'required|numeric',
            'scholarship' => 'required|string',
            'offer' => 'required|string',
        ]);
    
        // Find the form by id, return 404 if not found
        $form = Form::find($id);
        
        // Check if the form exists
        if (!$form) {
            return redirect()->route('form.index')->with('error', 'Form not found.');
        }
    
        // Update the form with the validated data
        $form->update($validatedData);
    
        // Return a success message and redirect back to the form page
        return redirect()->route('backend.form.index') // You can specify the route name here
            ->with('success', 'Registration form updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    
    $form = Form::findOrFail($id);
    
    
    $form->delete();
    
    // Redirect with a success message
    return redirect()->route('backend.form.index')
                     ->with('success', 'Form deleted successfully');
}

}
