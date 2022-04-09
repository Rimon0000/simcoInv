<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

     //slider add function
     public function sliderAdd(Request $request)
     {
         //validate the input items
         $validated = $request->validate(
             [
                 'slider_name' => 'required|unique:sliders|max:50',
                 'slider_img' => 'image|mimes:jpg,png,jpeg',
             ],
 
             // modified msg
             [
                 'slider_name.required' => 'Input field Cannnot be empty',
                 'slider_name.unique'   => 'Slider name alreay taken',
                 'slider_name.max'      => 'Slider name should not be more than 30 characters',
 
                 'slider_img.image'      => 'Image should be .png, .jpg, .jpeg',
             ],
         );
 
         // //getting data from  add form
         $slider_name  = $request->slider_name;
         $product_code = $request->product_code;
         $slider_img   = $request->file('slider_img');
         $slider_alt   = $request->slider_alt;
 
         if ($slider_img == null) {
             // check if the user had choosen the image or not
             $slider_img = ($slider_img == null) ? null : $slider_img;
         } else {
             // //unique ID generate
             $img_name_gen = hexdec(uniqid());
             // //Original ext
             $img_ext      = strtolower($slider_img->getClientOriginalExtension());
             // //img new create
             $img_name =  $img_name_gen . '.' . $img_ext;
             // //where I'll keep the image --path
             $upload_to    = 'backend/assets/img/slider/';
 
             // //Moving the image to a folder path 
             $slider_img->move($upload_to, $img_name);
             $slider_img =   $upload_to . $img_name;
         }
 
         $result = DB::table('sliders')->insert([
             'slider_name'  => $slider_name,
             'product_code' => $product_code,
             'slider_img'   => $slider_img,
             'slider_alt'   => $slider_alt,
             'created_by'   => Auth::user()->id,
             'created_at'   => Carbon::now(),
 
 
         ]);
         if ($result) {
             $notification = [
                 'message' => 'Slider Added Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('slider.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('slider.show')->with($notification);
         }
     }
}
