<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Department;
use Carbon\Carbon;

class AdminController extends Controller
{
    // Dashboard
    public function index()
    {
        // Fetch employees and group them by month of creation date
        $employeeData = Employee::select('id', 'created_at')->get()->groupBy(function($item) {
            return Carbon::parse($item->created_at)->format('M'); // Format as month name (e.g., "Jan", "Feb")
        });

        // Initialize months and count of employees per month
        $employeeMonths = [];
        $employeeMonthCount = [];

        // Iterate through grouped employee data
        foreach ($employeeData as $month => $values) {
            $employeeMonths[] = $month;
            $employeeMonthCount[] = count($values);
        }

        // Fetch departments for the Bar chart
        $departmentData = Department::all();
        $departmentNames = $departmentData->pluck('title')->toArray();
        $departmentCounts = $departmentData->map(function($department) {
            return Employee::where('department_id', $department->id)->count();
        })->toArray();

        // Pass the data to the view
        return view('index', compact('employeeMonths', 'employeeMonthCount', 'departmentNames', 'departmentCounts'));
    }

    // Login
    public function login()
    {
        return view('login');
    }

    // Submit Login
    public function submit_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $checkAdmin = Admin::where([
            'username' => $request->username,
            'password' => $request->password
        ])->count();

        if ($checkAdmin > 0) {
            session(['adminLogin' => true]);
            return redirect('admin');
        } else {
            return redirect('admin/login')->with('error', 'Invalid username or password!');
        }
    }

    // Logout
    public function logout()
    {
        session()->forget('adminLogin');
        return redirect('admin/login');
    }
}
