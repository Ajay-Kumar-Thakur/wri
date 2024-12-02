<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    // Store a new location
    public function store(Request $request)
    {
        $request->validate([
            'newCourse' => 'required|string|max:255',  // Validation
        ]);

        // Create a new location record
        Course::create([
            'newCourse' => $request->newCourse,
        ]);

        return redirect()->back()->with('success', 'course added successfully.');
    }

    // Delete an existing location
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'course removed successfully.');
    }
}
