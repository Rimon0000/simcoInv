<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesignationController extends Controller
{
    //
    //designation show function
    public function designationShow()
    {
        $data = Designation::orderByDesc('id')->get();
        return view('admin.employee_designation.employee_designation_show', compact('data'));
    }

    // designation add page
    public function designationAddPage()
    {
        $data = Designation::where('status', '=', '1')->orderBy('designation')->get();
        return view('admin.employee_designation.employee_designation_add', compact('data'));
    }

    // designation add function
    public function designationAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'designation' => 'required|unique:designations|max:50',
                'short_name' => 'unique:designations|max:50',
            ],

            // modified msg
            [
                'designation.required' => 'Input field can not be empty',
                'designation.unique'   => 'Employee Designation name alreay taken',
                'designation.max'      => 'Employee Designation name should not be more than 40 characters',

                'short_name.unique'   => 'Designation Short name alreay taken',
                'short_name.max'      => 'Designation Short name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $designation    = $request->designation;
        $short_name   = $request->short_name;


        $result = DB::table('designations')->insert([
            'designation' => $designation,
            'short_name' => $short_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Employee Designation Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('designation.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('designation.show')->with($notification);
        }
    }

    //designation status function
    public function designationStatus($id)
    {

        $data = Designation::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('designations')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('designation.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('designation.show')->with($notification);
        }
    }

    //designation Edit function
    public function  designationEdit($id)
    {

        $data = Designation::find($id);
        return view('admin.employee_designation.employee_designation_edit', compact('data'));
    }

    //designation Update function
    public function designationUpdate(Request $request, $id)
    {

        #code ...
         //validate the input items
         $validated = $request->validate(
            [
                'designation' => 'required|unique:designations,id|max:50',
                'short_name' => 'unique:designations,id|max:50',
            ],

            // modified msg
            [
                'designation.required' => 'Input field can not be empty',
                'designation.unique'   => 'Employee Designation name alreay taken',
                'designation.max'      => 'Employee Designation name should not be more than 40 characters',

                'short_name.unique'   => 'Designation Short name alreay taken',
                'short_name.max'      => 'Designation Short name should not be more than 40 characters',
            ],
        );
        //getting data from add form
        $designation = $request->designation;
        $short_name  = $request->short_name;

        $dataUpdated = DB::table('designations')
            ->where('id', $id)
            ->update(
                [
                    'designation' => $designation,
                    'short_name' => $short_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Employee Designation Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('designation.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('designation.show')->with($notification);
        }
    }

    //designation delete function
    public function designationDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('designations')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Employee Designation Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('designation.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('designation.show')->with($notification);
        };
    }
}
