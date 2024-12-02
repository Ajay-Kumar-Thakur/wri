<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('location.index', compact('locations'));
    }

    // Store a new location
    public function store(Request $request)
    {
        $request->validate([
            'newLocation' => 'required|string|max:255',  // Validation
        ]);

        // Create a new location record
        Location::create([
            'newLocation' => $request->newLocation,
        ]);

        return redirect()->back()->with('success', 'Location added successfully.');
    }

    // Delete an existing location
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->back()->with('success', 'Location removed successfully.');
    }
}
