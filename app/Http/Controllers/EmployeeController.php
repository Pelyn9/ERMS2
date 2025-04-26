<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::orderByDesc('id')->get(); 
        return view('employee.index', ['data' => $data]);
    }

    public function create()
    {
        $departments = Department::orderByDesc('id')->get();
        return view('employee.create', ['departments' => $departments]);
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpg,png,gif|max:2048', // Increased max file size
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'status' => 'required|boolean',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/employee'), $photoName);
        }

        // Create the employee
        $employee = new Employee();
        $employee->full_name = $request->full_name;
        $employee->photo = 'uploads/employee/' . $photoName;
        $employee->address = $request->address;
        $employee->mobile = $request->mobile;
        $employee->status = $request->status;
        $employee->department_id = $request->department_id;
        $employee->save();

        return redirect()->route('employee.index')->with('msg', 'Employee created successfully.');
    }

    public function show($id)
    {
        $data = Employee::findOrFail($id); // Find the employee by ID
        return view('employee.show', compact('data')); // Pass the data to the view
    }

    public function edit($id)
    {
        // Get departments and employee data
        $departments = Department::orderByDesc('id')->get();
        $data = Employee::findOrFail($id);
        return view('employee.edit', ['departments' => $departments, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'status' => 'required|boolean',
            'department_id' => 'required|exists:departments,id',
        ]);
    
        // Find the employee by ID
        $employee = Employee::findOrFail($id);
    
        // Handle the photo upload if new file is provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads/employee'), $photoName);
            $employee->photo = 'uploads/employee/' . $photoName;
        } else {
            // If no new photo, retain the previous one
            $employee->photo = $request->prev_photo;
        }
    
        // Update the employee details
        $employee->full_name = $request->full_name;
        $employee->address = $request->address;
        $employee->mobile = $request->mobile;
        $employee->status = $request->status;
        $employee->department_id = $request->department_id;
        $employee->save();
    
        return redirect()->route('employee.edit', $id)->with('msg', 'Employee updated successfully.');
    }

    public function destroy(string $id)
    {
        // Find employee by ID
        $employee = Employee::findOrFail($id);

        // Optionally delete the photo if needed
        if (file_exists(public_path($employee->photo))) {
            unlink(public_path($employee->photo));
        }

        // Delete the employee record
        $employee->delete();
        return redirect()->route('employee.index')->with('msg', 'Employee deleted successfully.');
    }
}
