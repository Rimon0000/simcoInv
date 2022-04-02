<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    //
    //department show function
    public function departmentShow()
    {
        $data = Department::orderByDesc('id')->get();
        return view('admin.employee_department.employee_department_show', compact('data'));
    }

    // department add page
    public function departmentAddPage()
    {
        $data = Department::where('status', '=', '1')->orderBy('department')->get();
        return view('admin.employee_department.employee_department_add', compact('data'));
    }

    // department add function
    public function departmentAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'department' => 'required|unique:departments|max:50',
                'short_name' => 'unique:departments|max:50',
            ],

            // modified msg
            [
                'department.required' => 'Input field can not be empty',
                'department.unique'   => 'Employee Department name alreay taken',
                'department.max'      => 'Employee Department name should not be more than 40 characters',

                'short_name.unique'   => 'Department Short name alreay taken',
                'short_name.max'      => 'Department Short name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $department    = $request->department;
        $short_name   = $request->short_name;


        $result = DB::table('departments')->insert([
            'department' => $department,
            'short_name' => $short_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Employee Department Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('department.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('department.show')->with($notification);
        }
    }

    //department status function
    public function departmentStatus($id)
    {

        $data = Department::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('departments')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('department.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('department.show')->with($notification);
        }
    }

    //department Edit function
    public function  departmentEdit($id)
    {

        $data = Department::find($id);
        return view('admin.employee_department.employee_department_edit', compact('data'));
    }

    //department Update function
    public function departmentUpdate(Request $request, $id)
    {

        #code ...
         //validate the input items
         $validated = $request->validate(
            [
                'department' => 'required|unique:departments|max:50',
                'short_name' => 'unique:departments|max:50',
            ],

            // modified msg
            [
                'department.required' => 'Input field can not be empty',
                'department.unique'   => 'Employee Department name alreay taken',
                'department.max'      => 'Employee Department name should not be more than 40 characters',

                'short_name.unique'   => 'Department Short name alreay taken',
                'short_name.max'      => 'Department Short name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $department    = $request->department;
        $short_name   = $request->short_name;

        $dataUpdated = DB::table('departments')
            ->where('id', $id)
            ->update(
                [
                    'department' => $department,
                    'short_name' => $short_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Employee Department Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('department.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('department.show')->with($notification);
        }
    }

    //department delete function
    public function departmentDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('departments')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Employee Department Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('department.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('department.show')->with($notification);
        };
    }
}
