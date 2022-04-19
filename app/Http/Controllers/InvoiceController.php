<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
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
use PDF;

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
        $data = Invoice::where('approved', 0)->orderByDesc('id')->get();
        return view('admin.invoice.invoice_approve_show', compact('data'));
    }


    //invoiceApproveStatus Add Page function
    public function invoiceApproveStatus($id)
    {
        $invoiceOrder    = Invoice::with(['invoiceDetails'])->find($id);
        $sub_total_price = InvoiceDetail::where('invoice_no', $invoiceOrder->invoice_no)->sum('total_price');
        $discount_amount = Payment::where('invoice_no', $invoiceOrder->invoice_no)->sum('discount_amount');
        $paid_amount     = Payment::where('invoice_no', $invoiceOrder->invoice_no)->sum('paid_amount');
        $due_amount      = Payment::where('invoice_no', $invoiceOrder->invoice_no)->sum('due_amount');

        return view('admin.invoice.invoice_approve', compact('invoiceOrder', 'sub_total_price', 'discount_amount', 'paid_amount', 'due_amount'));
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

                $sub_total_price = InvoiceDetail::where('invoice_no', $invoice_no)->sum('total_price');

                DB::table('invoices')
                    ->where('invoice_no', $invoice_no)
                    ->update(
                        [
                            'total_price'  => $sub_total_price,
                        ]
                    );

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
        # code...
        $invoice_no = $request->invoice_no;

        $approved = DB::table('invoices')
            ->where('invoice_no', $invoice_no)
            ->where('approved', 0)
            ->update([
                'approved' => 1,
                'approved_by' => Auth::user()->id,
            ]);

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
    }

    //Invoice Order Edit function
    public function invoiceOrderEdit($id)
    {
        $data = Invoice::find($id);
        $customers = Customer::all();
        // $data           = Purchase::where('purchase_no', $purchaseOrder->purchase_no)->orderByDesc('id')->get();
        // $sub_total_price = Purchase::where('purchase_no', $purchaseOrder->purchase_no)->sum('total_price');
        // 'data','sub_total_price'

        return view('admin.invoice.invoice_edit', compact('data', 'customers',));
    }

    //Invoice Order Update function
    public function invoiceOrderUpdate(Request $request, $id)
    {


        #code ...
        $invoice_date = $request->invoice_date;
        $invoice_no   = $request->invoice_no;
        $customer_id  = $request->customer_id;
        $description  = $request->description;


        $dataUpdated = DB::table('invoices')
            ->where('id', $id)
            ->update(
                [
                    'invoice_date' => $invoice_date,
                    'invoice_no'   => $invoice_no,
                    'customer_id'   => $customer_id,
                    'description'   => $description,
                    'updated_by'    => Auth::user()->id,
                    'updated_at'    => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Invoice Order Updated Successfully',
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

    //Invoice delete function
    public function invoiceDelete($id, $invoice_no)
    {
        //delete the row from thr table
        $deleted = DB::table('invoice_details')->where('id', '=', $id)->delete();

        if ($deleted) {

            $sub_total_price = InvoiceDetail::where('invoice_no', $invoice_no)->sum('total_price');

            DB::table('invoices')
                ->where('invoice_no', $invoice_no)
                ->update(
                    [
                        'total_price' => $sub_total_price,
                    ]
                );


            $notification = [
                'message' => 'Invoice Item Deleted Successfully',
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

    //Invoice Order delete function
    public function invoiceOrderDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('invoices')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Invoice Order Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('invoice.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('invoice.show')->with($notification);
        };
    }










    // Inovice Print ########################################################################################################

    public function invoicePrintShow()
    {
        # code...
        $data = Invoice::all();
        return view('admin.invoice.invoice_print.invoice_print_show', compact('data'));
    }




    public function invoicePrint($id)
    {
        $data['invoiceOrder']    = Invoice::with(['invoiceDetails'])->find($id);
        $data['sub_total_price'] = InvoiceDetail::where('invoice_no', $data['invoiceOrder']->invoice_no)->sum('total_price');
        $data['discount_amount'] = Payment::where('invoice_no', $data['invoiceOrder']->invoice_no)->sum('discount_amount');
        $data['paid_amount']     = Payment::where('invoice_no', $data['invoiceOrder']->invoice_no)->sum('paid_amount');
        $data['due_amount']      = Payment::where('invoice_no', $data['invoiceOrder']->invoice_no)->sum('due_amount');

        $pdf  = PDF::loadView('admin.pdf.invoice-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    // Inovice Print ########################################################################################################

}
