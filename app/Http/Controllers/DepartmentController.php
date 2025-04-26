<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    // Display all departments with latest first
    public function index()
    {
        $data = Department::orderByDesc('id')->get(); // Get all departments, ordered by ID in descending order
        return view('department.index', ['data' => $data]);
    }

    // Show the form for creating a new department
    public function create()
    {
        return view('department.create');
    }

    // Store a newly created department in the database
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255' // Make sure the title is required, a string, and no longer than 255 characters
        ]);

        // Create a new department instance and save
        $department = new Department();
        $department->title = $request->input('title');
        $department->save();

        // Redirect back with a success message
        return redirect()->route('depart.index')->with('msg', 'Data has been created successfully.');
    }

    // Show the specified department
    public function show($id)
    {
        $data = Department::findOrFail($id); // Find the department by ID, or fail if not found
        return view('department.show', compact('data'));
    }

    // Show the form for editing the specified department
    public function edit($id)
    {
        $data = Department::findOrFail($id); // Find the department by ID, or fail if not found
        return view('department.edit', compact('data'));
    }

    // Update the specified department in the database
    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'title' => 'required|string|max:255' // Same validation as store
        ]);

        $data = Department::findOrFail($id); // Find the department by ID
        $data->title = $request->input('title'); // Update the title
        $data->save(); // Save the changes

        // Redirect to the department list with a success message
        return redirect('depart/'.$id.'/edit')->with('msg', 'Data updated successfully.');
    }

    // Remove the specified department from the database
    public function destroy($id)
    {
        Department::where('id', $id)->delete(); // Delete the department by ID
        return redirect()->route('depart.index')->with('msg', 'Data deleted successfully.');
    }
}
