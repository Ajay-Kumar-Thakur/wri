<?php

namespace App\Http\Controllers;

use App\Models\PgPte;
use Illuminate\Http\Request;

class PgPteController extends Controller
{
    public function index()
    {
        $pg_ptes = PgPte::all();
        return view('pte.index', compact('ptes'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newPgPte' => 'required|string|max:255',
        ]);

        // Create a new university
        PgPte::create([
            'newPgPte' => $request->newPgPte,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'pgielts added successfully!');
    }

    

    public function destroy($id)
    {
        $pg_ptes = PgPte::findOrFail($id);
        $pg_ptes->delete();

        return redirect()->back()->with('success', 'pg ptes removed successfully.');
    }
}
