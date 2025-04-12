<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::orderByDesc('id')->get();
        return view('department.index', ['data' => $data]);
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $department = new Department();
        $department->title = $request->title;
        $department->save();

        return redirect()->back()->with('msg', 'Department has been created successfully.');
    }

    public function show($id)
    {
        $data = Department::findOrFail($id);
        return view('department.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Department::findOrFail($id);
        return view('department.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = Department::findOrFail($id);
        $data->title = $request->title;
        $data->save();

        return redirect('depart')->with('msg', 'Department updated successfully.');
    }

    public function destroy($id)
    {
        $data = Department::findOrFail($id);
        $data->delete();

        return redirect('depart')->with('msg', 'Department deleted successfully.');
    }
}
