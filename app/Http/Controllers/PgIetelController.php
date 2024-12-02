<?php

namespace App\Http\Controllers;

use App\Models\PgIetel;
use Illuminate\Http\Request;

class PgIetelController extends Controller
{
    public function index()
    {
        $pg_ietels = PgIetel::all();
        return view('ietl.index', compact('ietls'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newPgIelts' => 'required|string|max:255',
        ]);

        // Create a new university
        PgIetel::create([
            'newPgIelts' => $request->newPgIelts,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'pgielts added successfully!');
    }

    

    public function destroy($id)
    {
        $pg_ietels = PgIetel::findOrFail($id);
        $pg_ietels->delete();

        return redirect()->back()->with('success', 'pg ietls removed successfully.');
    }
}
