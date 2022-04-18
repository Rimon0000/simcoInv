<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\ProductList;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    //

    //purchase show function
    public function purchaseShow()
    {
        $data           = PurchaseOrder::orderByDesc('id')->get();
        $units          = Unit::orderByDesc('id')->get();
        $supplier_names = Supplier::orderByDesc('id')->get();

        return view('admin.purchase.purchase_show', compact('data', 'supplier_names', 'units'));
    }

    
    //purchase approve show function
    public function purchaseApproveShow()
    {
        $data = PurchaseOrder::where('approved', 0)->orderByDesc('id')->get();
        return view('admin.purchase.purchase_approve', compact('data',));
    }

    //purchase Add Page function
    public function purchaseAddPage()
    {
        $units        = Unit::orderByDesc('id')->get();
        $data         = Purchase::orderByDesc('id')->get();
        $productlists = ProductList::orderByDesc('id')->get();

        return view('admin.purchase.purchase_add', compact('data', 'units', 'productlists'));
    }


    //Purchase Store add function
    public function purchaseStore(Request $request)
    {
        //validate the input items
        // $validated = $request->validate(
        //     [
        //         'cat_name' => 'required|unique:categories|max:50',
        //         'cat_img'  => 'image|mimes:jpg,png,jpeg,svg',
        //     ],

        //     // modified msg
        //     [
        //         'cat_name.required' => 'Input field Cannnot be empty',
        //         'cat_name.unique'   => 'Category name alreay taken',
        //         'cat_name.max'      => 'Category name should not be more than 30 characters',

        //         'cat_img.image'      => 'Image should be .png, .jpg, .jpeg, .svg',
        //     ],
        // );

        // //getting data from category add form
        $purchase_date    = $request->purchase_date;
        $purchase_no      = $request->purchase_no;
        $supplier_id      = $request->supplier_id;
        $cat_id           = $request->cat_id;
        $unit_id          = $request->unit_id;
        $product_code     = $request->product_code;
        $product_name     = $request->product_name;
        $product_attr_id  = $request->product_attr_id;
        $quantity         = $request->quantity;
        $unit_price       = $request->unit_price;
        $description      = $request->description;

        $total_price      = $quantity * $unit_price;

        $result = DB::table('purchases')->insert([
            'purchase_date'   => $purchase_date,
            'purchase_no'     => $purchase_no,
            'supplier_id'     => $supplier_id,
            'cat_id'          => $cat_id,
            'unit_id'         => $unit_id,
            'product_code'    => $product_code,
            'product_name'    => $product_name,
            'product_attr_id' => $product_attr_id,
            'quantity'        => $quantity,
            'unit_price'      => $unit_price,
            'total_price'     => $total_price,
            'description'     => $description,

            'created_by'      => Auth::user()->id,
            'created_at'      => Carbon::now(),
        ]);

        if ($result) {

            $sub_total_price = Purchase::where('purchase_no', $purchase_no)->sum('total_price');

            DB::table('purchase_orders')
                ->where('purchase_no', $purchase_no)
                ->update(
                    [
                        'total_price'  => $sub_total_price,
                    ]
                );

            $notification = [
                'message'    => 'Purchase Orders Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($notification);
        }
    }

    ################################################################################################################################
    ################################################################################################################################
    ################################################################################################################################
    ################################################################################################################################
    ################################################################################################################################
    ################################################################################################################################
    ################################################################################################################################

    //Purchase Order add function
    public function purchaseOrderAdd(Request $request)
    {
        //validate the input items
        // $validated = $request->validate(
        //     [
        //         'cat_name' => 'required|unique:categories|max:50',
        //         'cat_img'  => 'image|mimes:jpg,png,jpeg,svg',
        //     ],

        //     // modified msg
        //     [
        //         'cat_name.required' => 'Input field Cannnot be empty',
        //         'cat_name.unique'   => 'Category name alreay taken',
        //         'cat_name.max'      => 'Category name should not be more than 30 characters',

        //         'cat_img.image'      => 'Image should be .png, .jpg, .jpeg, .svg',
        //     ],
        // );

        // //getting data from category add form
        $purchase_date = $request->purchase_date;
        $purchase_no   = $request->purchase_no;
        $supplier_id   = $request->supplier_id;

        $result = DB::table('purchase_orders')->insert([
            'purchase_date' => $purchase_date,
            'purchase_no'   => $purchase_no,
            'supplier_id'   => $supplier_id,
            'created_by'    => Auth::user()->id,
            'created_at'    => Carbon::now(),
        ]);

        if ($result) {
            $notification = [
                'message'    => 'Purchase Orders Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('purchase.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('purchase.show')->with($notification);
        }
    }

    //purchaseOrderAddPage Add Page function
    public function purchaseOrderAddPage($id)
    {
        $purchaseOrder   = PurchaseOrder::find($id);
        $units           = Unit::orderBy('unit_name', 'asc')->get();
        $categories      = Category::orderBy('cat_name', 'asc')->get();
        $productlists    = ProductList::orderBy('title', 'asc')->get();
        $productAttrs    = ProductAttribute::orderByDesc('id')->get();
        $data            = Purchase::where('purchase_no', $purchaseOrder->purchase_no)->orderByDesc('id')->get();
        $sub_total_price = Purchase::where('purchase_no', $purchaseOrder->purchase_no)->sum('total_price');

        return view('admin.purchase.purchase_add', compact('purchaseOrder', 'units', 'data', 'categories', 'productlists', 'productAttrs', 'sub_total_price'));
    }

    //purchase Order Edit function
    public function purchaseOrderEdit($id)
    {

        $purchaseOrder  = PurchaseOrder::find($id);
        $supplier_names = Supplier::all();

        return view('admin.purchase.purchase_order_edit', compact('purchaseOrder', 'supplier_names',));
    }

    //Purchase Order Update function
    public function purchaseOrderUpdate(Request $request, $id)
    {


        #code ...
        $purchase_date = $request->purchase_date;
        $purchase_no   = $request->purchase_no;
        $supplier_id   = $request->supplier_id;


        $dataUpdated = DB::table('purchase_orders')
            ->where('id', $id)
            ->update(
                [
                    'purchase_date' => $purchase_date,
                    'purchase_no'   => $purchase_no,
                    'supplier_id'   => $supplier_id,
                    'updated_by'    => Auth::user()->id,
                    'updated_at'    => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Purchase Order Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('purchase.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('purchase.show')->with($notification);
        }
    }



    public function purchaseOrderApprove($id)
    {
        # code...
        $data = PurchaseOrder::find($id);

        if (empty($data->approved)) {

            $approved = DB::table('purchase_orders')
                ->where('id', $id)
                ->where('approved', 0)
                ->update([
                    'approved' => 1
                ]);

            if ($approved) {

                $purchase_data = Purchase::where('purchase_no', $data->purchase_no)->get(['product_code', 'quantity']);

                foreach ($purchase_data as $purchase_datum) {

                    $product_qtys = DB::table('product_lists')->where('product_id', $purchase_datum->product_code)->get('stock');

                    foreach ($product_qtys as $product_qty) {

                        (float) $new_qty = (float)$product_qty->stock + (float)$purchase_datum->quantity;

                        DB::table('product_lists')->where('product_id', $purchase_datum->product_code)
                            ->update(['stock' => $new_qty]);
                    }
                }

                $notification = [
                    'message'    => 'Purchase Orders Approved.',
                    'alert-type' => 'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong.',
                    'alert-type' => 'warning'
                ];
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = [
                'message' => 'All Ready Approved.',
                'alert-type' => 'info'
            ];
            return redirect()->back()->with($notification);
        }
    }

    //Purchase delete function
    public function purchaseDelete($id, $purchase_no)
    {
        //delete the row from thr table
        $deleted = DB::table('purchases')->where('id', '=', $id)->delete();

        if ($deleted) {

            $sub_total_price = Purchase::where('purchase_no', $purchase_no)->sum('total_price');

            DB::table('purchase_orders')
                ->where('purchase_no', $purchase_no)
                ->update(
                    [
                        'total_price'  => $sub_total_price,
                    ]
                );

            $notification = [
                'message' => 'Purchase Item Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($notification);
        };
    }

    //Purchase Order delete function
    public function purchaseOrderDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('purchase_orders')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Purchase Order Item Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('purchase.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('purchase.show')->with($notification);
        };
    }
}
