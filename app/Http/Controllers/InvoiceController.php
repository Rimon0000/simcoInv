<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
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

class InvoiceController extends Controller
{
    //

    //invoice show function
    public function invoiceShow()
    {
        $units     = Unit::orderByDesc('id')->get();
        $data      = Invoice::orderByDesc('id')->get();
        $customers = Customer::orderByDesc('id')->get();

        return view('admin.invoice.invoice_show', compact('data', 'customers', 'units'));
    }

    //invoice approve show function
    public function invoiceApprove()
    {
        $units     = Unit::orderByDesc('id')->get();
        $data      = Invoice::orderByDesc('id')->get();
        $customers = Customer::orderByDesc('id')->get();

        return view('admin.invoice.invoice_approve_show', compact('data', 'customers', 'units'));
    }




    //invoiceApproveStatus Add Page function
    public function invoiceApproveStatus($id)
    {
        $invoiceOrder    = Invoice::find($id);
        $units           = Unit::orderBy('unit_name', 'asc')->get();
        $categories      = Category::orderBy('cat_name', 'asc')->get();
        $productlists    = ProductList::orderBy('title', 'asc')->get();
        $productAttrs    = ProductAttribute::orderByDesc('id')->get();
        $data            = InvoiceDetail::where('invoice_no', $invoiceOrder->invoice_no)->orderByDesc('id')->get();
        $sub_total_price = InvoiceDetail::where('invoice_no', $invoiceOrder->invoice_no)->sum('total_price');

        return view('admin.invoice.invoice_approve', compact('invoiceOrder', 'units', 'data', 'categories', 'productlists', 'productAttrs', 'sub_total_price'));
    }


    //Invoice Order add function
    public function invoiceOrderAdd(Request $request)
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

        // //getting data from invoice add form
        $invoice_date = $request->invoice_date;
        $invoice_no   = $request->invoice_no;
        $customer_id  = $request->customer_id;
        $description  = $request->description;

        $result = DB::table('invoices')->insert([
            'invoice_date' => $invoice_date,
            'invoice_no'   => $invoice_no,
            'customer_id'  => $customer_id,
            'description'  => $description,
            'created_by'   => Auth::user()->id,
            'created_at'   => Carbon::now(),
        ]);

        if ($result) {
            $notification = [
                'message'    => 'Invoice Orders Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('invoice.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('invoice.show')->with($notification);
        }
    }


    //invoiceOrderAddPage Add Page function
    public function invoiceOrderAddPage($id)
    {
        $invoiceOrder    = Invoice::find($id);
        $units           = Unit::orderBy('unit_name', 'asc')->get();
        $categories      = Category::orderBy('cat_name', 'asc')->get();
        $productlists    = ProductList::orderBy('title', 'asc')->get();
        $productAttrs    = ProductAttribute::orderByDesc('id')->get();
        $data            = InvoiceDetail::where('invoice_no', $invoiceOrder->invoice_no)->orderByDesc('id')->get();
        $sub_total_price = InvoiceDetail::where('invoice_no', $invoiceOrder->invoice_no)->sum('total_price');

        return view('admin.invoice.invoice_add', compact('invoiceOrder', 'units', 'data', 'categories', 'productlists', 'productAttrs', 'sub_total_price'));
    }

    //invoiceStore Store add function
    public function invoiceStore(Request $request)
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

        // //getting data from invoice add form
        $invoice_date = $request->invoice_date;
        $invoice_no   = $request->invoice_no;
        $customer_id  = $request->customer_id;
        $product_id   = $request->product_id;
        $product_name = $request->product_name;
        $cat_id       = $request->cat_id;
        $unit_id      = $request->unit_id;
        $unit_price   = $request->unit_price;
        $quantity     = $request->quantity;

        $total_price  = $quantity * $unit_price;

        $productStock = DB::table('product_lists')->where('product_id', $product_id)->get('stock')->first();

        if (empty($productStock->stock) || $productStock->stock < $quantity) {
            $notification = [
                'message'    => 'Out of Stock Or Limit Exceeded',
                'alert-type' => 'warning'
            ];
            return redirect()->back()->with($notification);
        }

        if ($productStock->stock >= $quantity) {
            $result = DB::table('invoice_details')->insert([
                'invoice_date' => $invoice_date,
                'invoice_no'   => $invoice_no,
                'customer_id'  => $customer_id,
                'cat_id'       => $cat_id,
                'unit_id'      => $unit_id,
                'product_id'   => $product_id,
                'product_name' => $product_name,
                'quantity'     => $quantity,
                'unit_price'   => $unit_price,
                'total_price'  => $total_price,

                'created_by'   => Auth::user()->id,
                'created_at'   => Carbon::now(),
            ]);

            if ($result) {
                $notification = [
                    'message'    => 'Item Added Successfully',
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
    }


    public function invoiceOrderPayment(Request $request, $id)
    {
        # code...
        $invoice_date    = $request->invoice_date;
        $invoice_id      = $id;
        $invoice_no      = $request->invoice_no;
        $customer_id     = $request->customer_id;
        $sub_total_price = $request->sub_total_price;
        $discount_price  = $request->discount_price;
        $paid_amount     = $request->paid_amount;
        $due_amount      = $request->due_amount;
        $paid_status     = $request->paid_status;



        $result = DB::table('payments')->insert([
            'invoice_date'     => $invoice_date,
            'invoice_id'       => $invoice_id,
            'invoice_no'       => $invoice_no,
            'customer_id'      => $customer_id,
            'sub_total_amount' => $sub_total_price,
            'discount_amount'  => $discount_price,
            'paid_amount'      => $paid_amount,
            'due_amount'       => $due_amount,
            'paid_status'      => $paid_status,

            'created_by'       => Auth::user()->id,
            'created_at'       => Carbon::now(),
        ]);

        if ($result) {

            DB::table('payment_details')->insert([
                'invoice_date'        => $invoice_date,
                'invoice_id'          => $invoice_id,
                'invoice_no'          => $invoice_no,
                'current_paid_amount' => $paid_amount,
                'updated_by'          => Auth::user()->id,
                'created_at'          => Carbon::now(),
            ]);

            $sub_total_price = InvoiceDetail::where('invoice_no', $invoice_no)->sum('total_price');

            DB::table('invoices')
                ->where('invoice_no', $invoice_no)
                ->update(
                    [
                        'total_price'  => $sub_total_price,
                    ]
                );

            $notification = [

                'message'    => 'Invoice Payment Added Successfully',
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


    public function invoiceApproveStore(Request $request)
    {

        $invoice_no = $request->invoice_no;

        $approved = DB::table('invoices')
            ->where('invoice_no', $invoice_no)
            ->where('approved', 0)
            ->update([
                'approved' => 1,
                'approved_by' => Auth::user()->id,
            ]);
        # code...

        if ($approved) {

            $invoice_data = InvoiceDetail::where('invoice_no', $invoice_no)->get(['product_id', 'quantity']);

            foreach ($invoice_data as $invoice_datum) {

                $product_qtys = DB::table('product_lists')->where('product_id', $invoice_datum->product_id)->get('stock');

                foreach ($product_qtys as $product_qty) {

                    (float) $new_qty = (float)$product_qty->stock - (float)$invoice_datum->quantity;

                    DB::table('product_lists')->where('product_id', $invoice_datum->product_id)
                        ->update(['stock' => $new_qty]);
                }
            }

            $notification = [
                'message'    => 'Invoice Orders Approved.',
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



















        // $data = PurchaseOrder::find($id);

        // if (empty($data->approved)) {

        //     $approved = DB::table('purchase_orders')
        //         ->where('id', $id)
        //         ->where('approved', 0)
        //         ->update([
        //             'approved' => 1
        //         ]);

        //     if ($approved) {

        //         $purchase_data = Purchase::where('purchase_no', $data->purchase_no)->get(['product_code','quantity']);

        //         foreach ($purchase_data as $purchase_datum) {

        //             $product_qtys = DB::table('product_lists')->where('product_id', $purchase_datum->product_code)->get('stock');

        //             foreach ($product_qtys as $product_qty) {

        //                 (float) $new_qty = (float)$product_qty->stock + (float)$purchase_datum->quantity;

        //                 DB::table('product_lists')->where('product_id', $purchase_datum->product_code)
        //                     ->update(['stock' => $new_qty]);
        //             }
        //         }

        //         $notification = [
        //             'message'    => 'Purchase Orders Approved.',
        //             'alert-type' => 'success'
        //         ];
        //         return redirect()->back()->with($notification);
        //     } else {
        //         $notification = [
        //             'message' => 'Something Went Wrong.',
        //             'alert-type' => 'warning'
        //         ];
        //         return redirect()->back()->with($notification);
        //     }
        // } else {
        //     $notification = [
        //         'message' => 'All Ready Approved.',
        //         'alert-type' => 'info'
        //     ];
        //     return redirect()->back()->with($notification);
        // }
    }
}
