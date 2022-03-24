<?php

namespace App\Http\Controllers;

use App\Models\ExpanseDetail;
use App\Models\ExpanseType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ExpanseController extends Controller
{
    //
    // Expanse Type Show Function
    public function expanseShow()
    {
        // Fetching Data from expanse table
        $data = ExpanseType::orderByDesc('id')->get();

        return view('admin.expanse_type.expanse_type_show', compact('data'));
    }

    // Expanse Type Add Page
    public function expanseAddPage()
    {
        # code...
        return view('admin.expanse_type.expanse_type_add');
    }


    // Expase Type Add Function
    public function expanseAdd(Request $request)
    {

        // Getting data from Expanse add form
        $expanse_type = $request->expanse_type;
        $remarks      = $request->remarks;


        // Validate the input items
        $validated = $request->validate(
            [
                'expanse_type' => 'required|unique:expanse_types|max:50',
                'remarks'      => 'max:50',
            ],
            // modified msg
            [
                // expanse type msg
                'expanse_type.required' => 'Input field can not be empty.',
                'expanse_type.unique'   => 'Expanse type already taken.',
                'expanse_type.max'      => 'Expanse type name should not be more than 50 characters.',

                // expanse type msg
                'remarks.max' => 'Remarks should not be more than 50 characters.',
            ]
        );


        $result = DB::table('expanse_types')->insert([
            'expanse_type' => $expanse_type,
            'remarks'      => $remarks,
            'created_by'   => Auth::id(),
            'created_at'   => Carbon::now(),
        ]);

        if ($result) {
            $notificaton = [
                'message'    => 'Expanse Type Added Successfully.',
                'alert-type' => 'success'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        } else {
            $notificaton = [
                'message'    => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        }
    }


    // Expanse Type Edit Function
    public function expanseEdit($id)
    {
        # code...
        $data = ExpanseType::find($id);
        return view('admin.expanse_type.expanse_type_edit', compact('data'));
    }


    // Expanse Type Update Function
    public function expanseUpdate(Request $request, $id)
    {
        # code...

        // Getting data from Expanse add form
        $expanse_type = $request->expanse_type;
        $remarks      = $request->remarks;

        // Validate the input items
        $validated = $request->validate(
            [
                'expanse_type' => ['required', 'max:50', Rule::unique('expanse_types')->ignore($id)],
                'remarks'      => 'max:50',
            ],
            // modified msg
            [
                // expanse type msg
                'expanse_type.required' => 'Input field can not be empty.',
                'expanse_type.unique'   => "Expanse type $expanse_type already taken.",
                'expanse_type.max'      => 'Expanse type name should not be more than 50 characters.',

                // expanse type msg
                'remarks.max' => 'Remarks should not be more than 50 characters.',
            ]
        );



        $dataUpdated = DB::table('expanse_types')
            ->where('id', $id)
            ->update(
                ['expanse_type' => $expanse_type, 'remarks' => $remarks, 'updated_by' => Auth::user()->id, 'updated_at' => Carbon::now(),]
            );

        if ($dataUpdated) {
            $notificaton = [
                'message'    => 'Expanse Type Name Updated Successfully.',
                'alert-type' => 'success'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        } else {
            $notificaton = [
                'message'    => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        }
    }


    // Expanse Delete Function
    public function expanseDelete($id)
    {
        // Delete the row from the table
        $deleted = DB::table('expanse_types')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notificaton = [
                'message'    => 'Expanse Type Deleted Successfully.',
                'alert-type' => 'error'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        } else {
            $notificaton = [
                'message'    => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        }
    }


    // Expanse Status Function
    public function expanseStatus($id)
    {
        # code...
        $data = ExpanseType::find($id);

        $statusCheck = $data->status;

        // Check Status
        $statusCheck = ($statusCheck == 1) ? 0 : 1;

        $dataUpdated = DB::table('expanse_types')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notificaton = [
                'message'    => 'Status Updated Successfully.',
                'alert-type' => 'success'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        } else {
            $notificaton = [
                'message'    => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.show')->with($notificaton);
        }
    }


    // Expanse Type End

    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    ##                                               Expanse Details Start                                         ##
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################
    #################################################################################################################



    // Expanse Detail Show Function
    public function expanseDetailShow()
    {
        // Fetching Data from expanse table
        $data = ExpanseDetail::orderByDesc('id')->get();

        return view('admin.expanse_detail.expanse_detail_show', compact('data'));
    }

    // Expanse Detail Add Page
    public function expanseDetailAddPage()
    {
        # code...
        $data = ExpanseType::where('status', '=', '1')->orderBy('expanse_type')->get();
        return view('admin.expanse_detail.expanse_detail_add', compact('data'));
    }


    // Expase Detail Add Function
    public function expanseDetailAdd(Request $request)
    {

        // Getting data from Expanse add form
        $expanse_date  = $request->expanse_date;
        $expanse_name  = $request->expanse_name;
        $fixed_expanse = $request->fixed_expanse;
        $amount        = $request->amount;
        $remarks       = $request->remarks;


        // Validate the input items
        $validated = $request->validate(
            [
                'expanse_date'  => 'required|max:50',
                'amount'        => 'required',
                'expanse_name'  => 'max:50',
                'remarks'       => 'max:50',
            ],
            // modified msg
            [
                // expanse date msg
                'expanse_date.required' => 'Pls select the Date.',
                'amount.required'       => 'Amount field can not be empty.',
                // expanse detail name msg
                'expanse_name.max'      => 'Expanse details name should not be more than 50 characters.',
                // remarks msg
                'remarks.max'           => 'Remarks should not be more than 50 characters.',
            ]
        );


        if (empty($expanse_name) && empty($fixed_expanse)) {

            $notificaton = [
                'message'    => 'Both Expanse Name and Fixed Expanse can not be empty.',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.detail.add.page')->with($notificaton);
        } else {
            $result = DB::table('expanse_details')->insert([
                'expanse_date'  => $expanse_date,
                'expanse_name'  => $expanse_name,
                'fixed_expanse' => $fixed_expanse,
                'amount'        => $amount,
                'remarks'       => $remarks,
                'created_by'    => Auth::id(),
                'created_at'    => Carbon::now(),
            ]);

            if ($result) {
                $notificaton = [
                    'message'    => 'Expanse Details Added Successfully.',
                    'alert-type' => 'success'
                ];
                return redirect()->route('expanse.detail.show')->with($notificaton);
            } else {
                $notificaton = [
                    'message'    => 'Something Went Wrong!!',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('expanse.detail.show')->with($notificaton);
            }
        }
    }


    // Expanse Detail Delete Function
    public function expanseDetailDelete($id)
    {
        // Delete the row from the table
        $deleted = DB::table('expanse_details')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notificaton = [
                'message'    => 'Expanse Detail Deleted Successfully.',
                'alert-type' => 'error'
            ];
            return redirect()->route('expanse.detail.show')->with($notificaton);
        } else {
            $notificaton = [
                'message'    => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.deatail.show')->with($notificaton);
        }
    }

    // Expanse Detail Edit Function
    public function expanseDetailEdit($id)
    {
        # code...
        $data = ExpanseDetail::find($id);
        $expanse_types = ExpanseType::where('status', '=', '1')->orderBy('expanse_type')->get();
        return view('admin.expanse_detail.expanse_detail_edit', compact('data', 'expanse_types'));
    }


    // Expanse Detail Update Function
    public function expanseDetailUpdate(Request $request, $id)
    {
        # code...

        // Getting data from Expanse add form
        $expanse_date  = $request->expanse_date;
        $expanse_name  = $request->expanse_name;
        $fixed_expanse = $request->fixed_expanse;
        $amount        = $request->amount;
        $remarks       = $request->remarks;

        // Validate the input items
        $validated = $request->validate(
            [
                'expanse_date'  => 'required|max:50',
                'amount'        => 'required',
                'expanse_name'  => 'max:50',
                'remarks'       => 'max:50',
            ],
            // modified msg
            [
                // expanse date msg
                'expanse_date.required' => 'Pls select the Date.',
                'amount.required'       => 'Amount field can not be empty.',
                // expanse detail name msg
                'expanse_name.max'      => 'Expanse details name should not be more than 50 characters.',
                // remarks msg
                'remarks.max'           => 'Remarks should not be more than 50 characters.',
            ]
        );

        if (empty($expanse_name) && empty($fixed_expanse)) {

            $notificaton = [
                'message'    => 'Both Expanse Name and Fixed Expanse can not be empty.',
                'alert-type' => 'warning'
            ];
            return redirect()->route('expanse.detail.edit',['id' => $id])->with($notificaton);
        } else {

            $dataUpdated = DB::table('expanse_details')
                ->where('id', $id)
                ->update(
                    [
                        'expanse_date'  => $expanse_date,
                        'expanse_name'  => $expanse_name,
                        'fixed_expanse' => $fixed_expanse,
                        'amount'        => $amount,
                        'remarks'       => $remarks,
                        'updated_by'    => Auth::user()->id,
                        'updated_at'    => Carbon::now(),
                    ]
                );


            if ($dataUpdated) {
                $notificaton = [
                    'message'    => 'Expanse Details Edited Successfully.',
                    'alert-type' => 'success'
                ];
                return redirect()->route('expanse.detail.show')->with($notificaton);
            } else {
                $notificaton = [
                    'message'    => 'Something Went Wrong!!',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('expanse.detail.show')->with($notificaton);
            }
        }
    }
}
