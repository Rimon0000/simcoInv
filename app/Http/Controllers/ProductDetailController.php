<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    //Product Detail Page function
    public function productDetailShow()
    {
        $data = ProductDetail::orderByDesc('id')->get();
        return view('admin.product_details.product_details_show', compact('data'));
    }

    //Product Detail Add Page function
    public function productDetailAddPage()
    {
        $productlists =  ProductList::all();
        return view('admin.product_details.product_details_add', compact('productlists'));
    }

    //Product Detail Display Page function
    public function productDetailDisplayShow($id)
    {
        $data = ProductDetail::find($id);

        return view('admin.product_details.product_details_display', compact('data'));
    }

    
}
