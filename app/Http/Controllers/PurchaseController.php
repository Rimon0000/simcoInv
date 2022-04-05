<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Unit;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //

    //category show function
    public function purchaseShow()
    {
        $data = Purchase::orderByDesc('id')->get();

        return view('admin.purchase.purchase_show', compact('data'));
    }


    //category Add Page function
    public function purchaseAddPage()
    {
        $units = Unit::orderByDesc('id')->get();
        $productlists = Unit::orderByDesc('id')->get();

        return view('admin.purchase.purchase_add', compact('units','productlists'));
    }
}
