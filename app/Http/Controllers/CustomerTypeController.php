<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerTypeController extends Controller
{
    //
    //category show function
    public function customerTypeShow()
    {
        $data = CustomerType::orderByDesc('id')->get();

        return view('admin.customer_type.customer_type_show', compact('data'));
    }

    //customer Type Add Page function
    public function customerTypeAddPage()
    {
        return view('admin.customer_type.customer_type_add');
    }

    //customer Type add function
    public function customerTypeAdd(Request $request)
    {
        //validate the input items
        $validated = $request->validate(
            [
                'customer_type' => 'required|unique:customer_types|max:100',
            ],

            // modified msg
            [
                'customer_type.required' => 'Input field Cannnot be empty',
                'customer_type.unique'   => 'Customer Type name alreay taken',
                'customer_type.max'      => 'Customer Type name should not be more than 50 characters',

            ],
        );

        // //getting data from category add form
        $customer_type = $request->customer_type;

        // if ($cat_img == null) {
        //     // check if the user had choosen the image or not
        //     $cat_img = ($cat_img == null) ? null : $cat_img;
        // } else {
        //     // //unique ID generate
        //     $img_name_gen = hexdec(uniqid());
        //     // //Original ext
        //     $img_ext      = strtolower($cat_img->getClientOriginalExtension());
        //     // //img new create
        //     $img_name =  $img_name_gen . '.' . $img_ext;
        //     // //where I'll keep the image --path
        //     $upload_to    = 'backend/assets/img/category/';

        //     // //Moving the image to a folder path 
        //     $cat_img->move($upload_to, $img_name);
        //     $cat_img =   $upload_to . $img_name;
        // }

        $result = DB::table('customer_types')->insert([
            'customer_type' => $customer_type,
            'created_by'    => Auth::user()->id,
            'created_at'    => Carbon::now(),


        ]);
        if ($result) {
            $notification = [
                'message' => 'Customer Type Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        }
    }

    //customer Type status function
    public function customerTypeStatus($id)
    {

        $data = CustomerType::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('customer_types')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        }
    }

    //customer Type Edit function
    public function  customerTypeEdit($id)
    {

        $data = CustomerType::find($id);
        return view('admin.customer_type.customer_type_edit', compact('data'));
    }

    //customer Type Update function
    public function customerTypeUpdate(Request $request, $id)
    {

        #code ...
        $customer_type = $request->customer_type;

        $dataUpdated = DB::table('customer_types')
            ->where('id', $id)
            ->update(
                [
                    'customer_type' => $customer_type,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Customer Type Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        }
    }

    //customer Type delete function
    public function customerTypeDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('customer_types')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Customer Type Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.type.show')->with($notification);
        };
    }
}
