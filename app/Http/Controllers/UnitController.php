<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    //
    //Unit show function
    public function unitShow()
    {
        $data = Unit::orderByDesc('id')->get();
        return view('admin.product_unit.product_unit_show', compact('data'));
    }

    // Unit add page
    public function unitAddPage()
    {
        $data = Unit::where('status', '=', '1')->orderBy('unit_name')->get();
        return view('admin.product_unit.product_unit_add', compact('data'));
    }

    // Unit add function
    public function unitAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'unit_name' => 'required|unique:units|max:50',
                'short_name' => 'unique:units|max:50',
            ],

            // modified msg
            [
                'unit_name.required' => 'Input field can not be empty',
                'unit_name.unique'   => 'Product Unit name alreay taken',
                'unit_name.max'      => 'Product Unit name should not be more than 40 characters',

                'short_name.unique'   => 'Unit Short name alreay taken',
                'short_name.max'      => 'Unit Short name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $unit_name    = $request->unit_name;
        $short_name   = $request->short_name;


        $result = DB::table('units')->insert([
            'unit_name' => $unit_name,
            'short_name' => $short_name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Product Unit Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('unit.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('unit.show')->with($notification);
        }
    }

    //Unit status function
    public function unitStatus($id)
    {

        $data = Unit::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('units')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('unit.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('unit.show')->with($notification);
        }
    }

    //Unit Edit function
    public function  unitEdit($id)
    {

        $data = Unit::find($id);
        return view('admin.product_unit.product_unit_edit', compact('data'));
    }

    //Unit Update function
    public function unitUpdate(Request $request, $id)
    {

        #code ...
         //validate the input items
         $validated = $request->validate(
            [
                'unit_name' => 'required|unique:units,id|max:50',
                'short_name' => 'unique:units,id|max:50',
            ],

            // modified msg
            [
                'unit_name.required' => 'Input field can not be empty',
                'unit_name.unique'   => 'Product Unit name alreay taken',
                'unit_name.max'      => 'Product Unit name should not be more than 40 characters',

                'short_name.unique'   => 'Unit Short name alreay taken',
                'short_name.max'      => 'Unit Short name should not be more than 40 characters',
            ],
        );
        //getting data from add form
        $unit_name    = $request->unit_name;
        $short_name   = $request->short_name;

        $dataUpdated = DB::table('units')
            ->where('id', $id)
            ->update(
                [
                    'unit_name' => $unit_name,
                    'short_name' => $short_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Product Unit Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('unit.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('unit.show')->with($notification);
        }
    }

    // UNnit delete function
    public function unitDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('units')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Product Unit Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('unit.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('unit.show')->with($notification);
        };
    }
}
