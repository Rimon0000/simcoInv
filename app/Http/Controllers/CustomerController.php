<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //customer show function
    public function customerShow()
    {
        $data = Customer::orderByDesc('id')->get();

        return view('admin.customer.customer_show', compact('data'));
    }

    //customer Add Page function
    public function customerAddPage()
    {
        return view('admin.customer.customer_add');
    }
}
