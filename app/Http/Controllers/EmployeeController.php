<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    //employee show function
    public function employeeShow()
    {
        $data = Employee::orderByDesc('id')->get();

        return view('admin.employee.employee_show', compact('data'));
    }

    //employee Add Page function
    public function employeeAddPage()
    {

        $designations = Designation::all();
        $departments  = Department::all();
        return view('admin.employee.employee_add', compact('designations', 'departments'));
    }
}
