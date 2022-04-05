<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\ProductList;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //Coupon show function
    public function couponShow()
    {
        $data = Coupon::orderByDesc('id')->get();

        return view('admin.coupon.coupon_show', compact('data'));
    }

    //Coupon Add Page function
    public function couponAddPage()
    {
        $productlists = ProductList::orderByDesc('id')->get();

        return view('admin.coupon.coupon_add', compact('productlists'));
    }
}
