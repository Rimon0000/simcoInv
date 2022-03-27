<?php

namespace App\Http\Controllers;

use App\Models\Tnc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TNCController extends Controller
{
    //
    public function tncShow()
    {
        # code...
        $data = Tnc::first();
        return view('admin.site_info.tnc', compact('data'));
    }

    // TNC add function
    public function tncAdd(Request $request)
    {

        //  // //validate the input items
        $validated = $request->validate(
            [
                'tnc' => 'required',
            ],

            // modified msg
            [
                //TNC msg
                'tnc.required' => 'Input field can not be empty',

            ],
        );

        //getting data from TNC add form
        $tnc  = $request->tnc;

        $result = DB::table('tncs')->insert([
            'tnc' => $tnc,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'TNC Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('tnc.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('tnc.show')->with($notification);
        }
    }

    //TNC Edit function
    public function tncEdit(Request $request, $id)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'tnc' => 'required',
            ],

            // modified msg
            [
                //TNC msg
                'tnc.required' => 'Input field can not be empty',

            ],
        );
        //getting data from TNC add form
        $tnc  = $request->tnc;

        $dataUpdated = DB::table('tncs')
            ->where('id', $id)
            ->update(
                [
                    'tnc' =>  $tnc,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );
        if ($dataUpdated) {
            $notification = [
                'message' => 'TNC Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('tnc.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('tnc.show')->with($notification);
        }
    }
}
