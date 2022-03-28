<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //
    //Product List show function
    public function productListShow()
    {
        $data = ProductList::orderByDesc('id')->get();

        return view('admin.product_list.product_list_show', compact('data'));
    }

    //Product List Add Page function
    public function productListAddPage()
    {
        return view('admin.product_list.product_list_add');
    }
}
