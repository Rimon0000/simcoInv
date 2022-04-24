<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\ProductList;
use App\Models\ServiceList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    // Coupon show function
    public function couponShow()
    {
        $data = Coupon::orderByDesc('id')->get();

        return view('admin.coupon.coupon_show', compact('data'));
    }

    // Coupon Add Page function
    public function couponAddPage()
    {
        $productLists = ProductList::all();
        return view('admin.coupon.coupon_add',compact('productLists'));
    }

    // Coupon Add Function
    public function couponAdd(Request $request)
    {
        //Validate the input items
        //   $validated = $request->validate(
        //       [
        //           // Fetching Data From Category Table
        //           'cat_name' => 'required|unique:categories|max:30',
        //           'cat_img'  => 'image|mimes:jpg,png,jpeg',
        //       ],

        //       // Modified msg
        //       [
        //           // Cat Name Msg
        //           'cat_name.required'  => 'Input Field Cannot Be Empty.',
        //           'cat_name.unique '   => 'Category Has Already Taken',
        //           'cat_name.max'       => 'Categorry Name Should Not Be More Than 30 Characters.',

        //           //Cat Img Msg
        //           'cat_img.image'      => 'Image Should Be .pmg, .jpg, .jpeg',
        //       ]
        //   );

        // Getting data from Category Add form

        $offer_name       = $request->offer_name;
        $product_id       = $request->product_id;
        $coupon_code      = $request->coupon_code;
        $coupon_type      = $request->coupon_type;
        $coupon_limit     = $request->coupon_limit;
        $coupon_amount    = $request->coupon_amount;
        $cart_min_value   = $request->cart_min_value;
        $expired_date     = $request->expired_date;
       

        $result = DB::table('coupons')->insert([
            "offer_name"       => $offer_name,
            "product_id"       => $product_id,
            "coupon_code"      => $coupon_code,
            "coupon_type"      => $coupon_type,
            "coupon_limit"     => $coupon_limit,
            "coupon_amount"    => $coupon_amount,
            "cart_min_value"   => $cart_min_value,
            "expired_date"     => $expired_date,
            'created_by'       => Auth::user()->id,
            'created_at'       => Carbon::now()
        ]);


        if ($result) {

            $notification = [
                'message'     => 'Coupon Added Successfully.',
                'alert-type'  => 'success'
            ];
            return redirect()->route('coupon.show')->with($notification);
        } else {
            return redirect()->route('coupon.show')->with('warning', 'Something went wrong !!');
        }
    }


    // Coupon Edit Function

    public function couponEdit($id)
    {

        $data         = Coupon::find($id);
        $productLists = ProductList::all();
        return view('admin.coupon.coupon_edit', compact('data','productLists'));
    }


    // Category Update Function

    public function couponUpdate(Request $request, $id)
    {

        $offer_name       = $request->offer_name;
        $product_id       = $request->product_id;
        $coupon_code      = $request->coupon_code;
        $coupon_type      = $request->coupon_type;
        $coupon_limit     = $request->coupon_limit;
        $coupon_amount    = $request->coupon_amount;
        $cart_min_value   = $request->cart_min_value;
        $expired_date     = $request->expired_date;

        $dataUpdated = DB::table('coupons')
            ->where('id', $id)
            ->update(
                [  "offer_name"       => $offer_name,
                "product_id"       => $product_id,
                "coupon_code"      => $coupon_code,
                "coupon_type"      => $coupon_type,
                "coupon_limit"     => $coupon_limit,
                "coupon_amount"    => $coupon_amount,
                "cart_min_value"   => $cart_min_value,
                "expired_date"     => $expired_date,
                'updated_by'       => Auth::user()->id,
                'updated_at'       => Carbon::now()
                ]
            );

       

        if ($dataUpdated) {
            $notification = [
                'message'     => 'Coupon Updated Successfully.',
                'alert-type'  => 'success'
            ];
            return redirect()->route('coupon.show')->with($notification);
        } else {
            $notification = [
                'message'     => 'Coupon Updated Successfully.',
                'alert-type'  => 'success'
            ];
            return redirect()->route('coupon.show')->with($notification);
        }
    }



    // Coupon Status Function

    public function couponStatus($id)
    {

        $data = Coupon::find($id);
        $statusCheck = $data->status;

        //Check Status
        $statusCheck = ($statusCheck == 1) ? 0 : 1;

        $dataUpdated = DB::table('coupons')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck]
            );

        if ($dataUpdated) {
            $notification = [
                'message'     => 'Status Updated Successfully.',
                'alert-type'  => 'success'
            ];
            return redirect()->route('coupon.show')->with($notification);
        } else {
            $notification = [
                'message'     => 'Status Updated Successfully.',
                'alert-type'  => 'success'
            ];
            return redirect()->route('coupon.show')->with($notification);
        }
    }




    // Coupon Delete Function

    public function couponDelete($id)
    {
        // Find The Image


        // Delete the row from the table 
        $deleted = DB::table('coupons')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message'     => 'Coupon Deleted Successfully.',
                'alert-type'  => 'error'
            ];
            return redirect()->route('coupon.show')->with($notification);
        } else {
            $notification = [
                'message'     => 'Something Went Wrong.',
                'alert-type'  => 'error'
            ];
            return redirect()->route('coupon.show')->with($notification);
        }
    }
}
