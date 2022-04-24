<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\ExpanseDetail;
use App\Models\Invoice;
use App\Models\ProductList;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $categories       = Category::count();
        $subCategories    = SubCategory::count();
        $subSubCategories = SubSubCategory::count();
        $brands           = Brand::count();
        $product_lists    = ProductList::count();
        $sliders          = Slider::count();
        $coupons          = Coupon::count();
        $campaign         = Campaign::count();

        // Purchase
        $now = Carbon::now();
        $purchaseOrder    = PurchaseOrder::where('approved',1)->whereMonth('purchase_date', '=', $now->month)->sum('total_price');
        $purchaseOrderUnapproved = PurchaseOrder::where('approved',0)->count();
        
        // Invoice
        $now = Carbon::now();
        $invoiceOrder    = Invoice::where('approved',1)->whereMonth('invoice_date', '=', $now->month)->sum('total_price');
        $invoiceOrderUnapproved = Invoice::where('approved',0)->count();
        

        return view(
            'admin.pages.index',
            compact('categories', 'subCategories', 'subSubCategories', 
            'brands', 'product_lists', 'sliders', 'coupons', 'campaign',
            'purchaseOrder','purchaseOrderUnapproved',
            'invoiceOrder','invoiceOrderUnapproved',
            )
        );
    }
}
