<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    //
    //Area show function
    public function areaShow()
    {
        $data = Area::orderByDesc('id')->get();
        return view('admin.employee_area.employee_area_show', compact('data'));
    }

    // Area add page
    public function areaAddPage()
    {
        $data = Area::where('status', '=', '1')->orderBy('area')->get();
        return view('admin.employee_area.employee_area_add', compact('data'));
    }

    // Area add function
    public function areaAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'area' => 'required|unique:areas|max:50',
                'short_name' => 'unique:areas|max:50',
            ],

            // modified msg
            [
                'area.required' => 'Input field can not be empty',
                'area.unique'   => 'Employee Area name alreay taken',
                'area.max'      => 'Employee Area name should not be more than 40 characters',

                'short_name.unique'   => 'Area Short name alreay taken',
                'short_name.max'      => 'Area Short name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $area    = $request->area;
        $short_name   = $request->short_name;


        $result = DB::table('areas')->insert([
            'area' => $area,
            'short_name' => $short_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Employee Area Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('area.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('area.show')->with($notification);
        }
    }

    //Area status function
    public function areaStatus($id)
    {

        $data = Area::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('areas')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('area.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('area.show')->with($notification);
        }
    }

    //Area Edit function
    public function  areaEdit($id)
    {

        $data = Area::find($id);
        return view('admin.employee_area.employee_area_edit', compact('data'));
    }

    //Area Update function
    public function areaUpdate(Request $request, $id)
    {

        #code ...
         //validate the input items
         $validated = $request->validate(
            [
                'area' => 'required|unique:areas,id|max:50',
                'short_name' => 'unique:areas,id|max:50',
            ],

            // modified msg
            [
                'area.required' => 'Input field can not be empty',
                'area.unique'   => 'Employee Area name alreay taken',
                'area.max'      => 'Employee Area name should not be more than 40 characters',

                'short_name.unique'   => 'Area Short name alreay taken',
                'short_name.max'      => 'Area Short name should not be more than 40 characters',
            ],
        );
        //getting data from add form
        $area        = $request->area;
        $short_name  = $request->short_name;

        $dataUpdated = DB::table('areas')
            ->where('id', $id)
            ->update(
                [
                    'area' => $area,
                    'short_name' => $short_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Employee Area Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('area.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('area.show')->with($notification);
        }
    }

    //Area delete function
    public function areaDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('areas')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Employee Area Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('area.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('area.show')->with($notification);
        };
    }
}
