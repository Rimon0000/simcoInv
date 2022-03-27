<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PolicyController extends Controller
{
    //Policy show function
    public function policyShow()
    {
        # code...
        $data = Policy::first();
        return view('admin.site_info.policy', compact('data'));
    }

    // Policy add function
    public function policyAdd(Request $request)
    {

        //  // //validate the input items
        $validated = $request->validate(
            [
                'policy' => 'required',
            ],

            // modified msg
            [
                //Policy msg
                'policy.required' => 'Input field can not be empty',

            ],
        );

        //getting data from Policy add form
        $policy  = $request->policy;

        $result = DB::table('policies')->insert([
            'policy' => $policy,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Privacy Policy Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('policy.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('policy.show')->with($notification);
        }
    }

    //Policy Edit function
    public function policyEdit(Request $request, $id)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'policy' => 'required',
            ],

            // modified msg
            [
                //Policy msg
                'policy.required' => 'Input field can not be empty',

            ],
        );

        //getting data from Policy add form
        $policy  = $request->policy;

        $dataUpdated = DB::table('policies')
            ->where('id', $id)
            ->update(
                [
                    'policy' =>  $policy,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );
        if ($dataUpdated) {
            $notification = [
                'message' => 'Privacy Policy Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('policy.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('policy.show')->with($notification);
        }
    }
}
