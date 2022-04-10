<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\ExpanseDetail;
use App\Models\ProductList;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
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


        return view(
            'admin.pages.index',
            compact('categories', 'subCategories', 'subSubCategories', 'brands', 'product_lists', 'sliders', 'coupons', 'campaign')
        );
    }
}
