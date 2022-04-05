<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //
    //slider show function
    public function sliderShow()
    {
        $data = Slider::orderByDesc('id')->get();

        return view('admin.slider.slider_show', compact('data'));
    }

    //slider Add Page function
    public function sliderAddPage()
    {
        $productlists = ProductList::orderByDesc('id')->get();
        return view('admin.slider.slider_add', compact('productlists'));
    }
}
