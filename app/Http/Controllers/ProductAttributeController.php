<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    //
    public function productAttributeShow()
    {
        $data = ProductAttribute::orderByDesc('id')->get();

        return view('admin.product_attribute.product_attribute_show', compact('data'));
    }

    //Product List Add Page function
    public function productAttributeAddPage()
    {
        return view('admin.product_attribute.product_attribute_add');
    }
}
