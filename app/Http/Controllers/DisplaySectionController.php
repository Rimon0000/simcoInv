<?php

namespace App\Http\Controllers;

use App\Models\DisplaySection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisplaySectionController extends Controller
{
    //
    //
    //Display Section show function
    public function displaySectionShow()
    {
        $data = DisplaySection::orderByDesc('id')->get();
        return view('admin.varity_section.varity_section_show', compact('data'));
    }

    // Display Section add page
    public function displaySectionAddPage()
    {
        $data = DisplaySection::where('status', '=', '1')->orderBy('display_section')->get();
        return view('admin.varity_section.varity_section_add', compact('data'));
    }

    // UDisplay Section add function
    public function displaySectionAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'display_section' => 'required|unique:display_sections|max:50',
            ],

            // modified msg
            [
                'display_section.required' => 'Input field can not be empty',
                'display_section.unique'   => 'Varity Section name alreay taken',
                'display_section.max'      => 'Varity Section name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $display_section    = $request->display_section;


        $result = DB::table('display_sections')->insert([
            'display_section' => $display_section,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Varity Section Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        }
    }

    //Display Section status function
    public function displaySectionStatus($id)
    {

        $data = DisplaySection::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('display_sections')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        }
    }

    //Display Section Edit function
    public function  displaySectionEdit($id)
    {

        $data = DisplaySection::find($id);
        return view('admin.varity_section.varity_section_edit', compact('data'));
    }

    //Unit Update function
    public function displaySectionUpdate(Request $request, $id)
    {

        #code ...
         //validate the input items
         $validated = $request->validate(
            [
                'display_section' => 'required|unique:display_sections|max:50',
            ],

            // modified msg
            [
                'display_section.required' => 'Input field can not be empty',
                'display_section.unique'   => 'Varity Section name alreay taken',
                'display_section.max'      => 'Varity Section name should not be more than 40 characters',
            ],
        );

        // // //getting data from add form
        $display_section    = $request->display_section;

        $dataUpdated = DB::table('display_sections')
            ->where('id', $id)
            ->update(
                [
                    'display_section' => $display_section,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Varity Section Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        }
    }

    // Display Section delete function
    public function displaySectionDelete($id)
    {
        //delete the row from the table
        $deleted = DB::table('display_sections')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Varity Section Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('displaysection.show')->with($notification);
        };
    }
    
}
