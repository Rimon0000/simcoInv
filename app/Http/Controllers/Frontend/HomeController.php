<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DisplaySection;
use App\Models\ProductList;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $banners         = Slider::where('status',1)->get();
        $categories      = Category::where('status',1)->get();
        $subcategories   = SubCategory::where('status',1)->get();
        $displaysections = DisplaySection::where('status',1)->get();
        $productlists    = ProductList::where('status',1)->take(8)->get();
        $newproductlists = ProductList::where('status',1)->get();

        return view('frontend.index', compact('banners', 'categories','subcategories','displaysections','productlists','newproductlists'));
    }
}
