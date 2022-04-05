<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //supplier show function
    public function supplierShow()
    {
        $data = Supplier::orderByDesc('id')->get();

        return view('admin.supplier.supplier_show', compact('data'));
    }

    //supplier Add Page function
    public function supplierAddPage()
    {
        return view('admin.supplier.supplier_add');
    }
}
