<?php

namespace App\Http\Controllers;

use App\Models\Ietls;
use Illuminate\Http\Request;

class IetlsController extends Controller
{
    public function index()
    {
        $ietls = Ietls::all();
        return view('ietl.index', compact('ietls'));
    }

    // Store a new university
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'newIelts' => 'required|string|max:255',
        ]);

        // Create a new university
        Ietls::create([
            'newIelts' => $request->newIelts,
        ]);

        // Redirect back with a success message
        return back()->with('success', 'itelts added successfully!');
    }

    

    public function destroy($id)
    {
        $ietls = Ietls::findOrFail($id);
        $ietls->delete();

        return redirect()->back()->with('success', 'ietls removed successfully.');
    }
}
