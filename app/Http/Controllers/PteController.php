<?php

namespace App\Http\Controllers;

use App\Models\Pte;
use Illuminate\Http\Request;

class PteController extends Controller
{
    public function index()
    {
        $ptes = Pte::all();
        return view('pte.index', compact('ptes'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newpte' => 'required|string|max:255',
        ]);

        // Create a new university
        Pte::create([
            'newpte' => $request->newpte,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'pte added successfully!');
    }

    

    public function destroy($id)
    {
        $pte = Pte::findOrFail($id);
        $pte->delete();

        return redirect()->back()->with('success', 'pte removed successfully.');
    }
}
