<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    //Product Detail Page function
    public function productDetailShow()
    {
        $data = ProductDetail::orderByDesc('id')->get();

        return view('admin.product_attribute.product_attribute_show', compact('data'));
    }

    //Product Detail Add Page function
    public function productDetailAddPage()
    {
        return view('admin.product_attribute.product_attribute_add');
    }
}
