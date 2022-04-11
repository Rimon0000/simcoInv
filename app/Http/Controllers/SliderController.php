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
        //  //validate the input items
        //  $validated = $request->validate(
        //      [
        //          'slider_name' => 'required|unique:sliders|max:50',
        //          'slider_img' => 'image|mimes:jpg,png,jpeg',
        //      ],
 
        //      // modified msg
        //      [
        //          'slider_name.required' => 'Input field Cannnot be empty',
        //          'slider_name.unique'   => 'Slider name alreay taken',
        //          'slider_name.max'      => 'Slider name should not be more than 30 characters',
 
        //          'slider_img.image'      => 'Image should be .png, .jpg, .jpeg',
        //      ],
        //  );
 
         // //getting data from  add form
         $slider_name  = $request->slider_name;
         $slider_subtitle  = $request->slider_subtitle;
         $slider_text  = $request->slider_text;
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
             'slider_subtitle'  => $slider_subtitle,
             'slider_text'  => $slider_text,
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

     //slider status function
    public function sliderStatus($id)
    {

        $data = Slider::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('sliders')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
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

     //Slider Edit function
     public function  sliderEdit($id)
     {
 
         $data = Slider::find($id);
         $productlists = ProductList::orderByDesc('id')->get();
         return view('admin.slider.slider_edit', compact('data', 'productlists'));
     }
 
      //Slider Update function
     public function sliderUpdate(Request $request, $id)
     {

 
         #code ...
         $slider_name     = $request->slider_name;
         $slider_subtitle = $request->slider_subtitle;
         $slider_text     = $request->slider_text;
         $product_code    = $request->product_code;
         $slider_img      = $request->file('slider_img');
         $slider_alt      = $request->slider_alt;
 
         $dataUpdated = DB::table('sliders')
             ->where('id', $id)
             ->update(
                 [
                    'slider_name'  => $slider_name,
                    'slider_subtitle'  => $slider_subtitle,
                    'slider_text'  => $slider_text,
                    'product_code' => $product_code,
                     'updated_by'  => Auth::user()->id,
                     'updated_at'  => Carbon::now(),
 
                 ]
             );
 
         if ($dataUpdated) {
             $notification = [
                 'message' => 'Slider Name Updated Successfully',
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

      //slider edit image function
      public function sliderEditImage($id)
      {
  
          //fetching data from table
          $data = Slider::find($id);
  
          return view('admin.slider.slider_edit_image', compact('data'));
      }
 
     //Slide image update function
     public function sliderImageUpdate(Request $request, $id)
     {
         //validate the input item
         $validated = $request->validate(
             [
                 'slider_img' => 'required|image|mimes:jpg,png,jpeg',
             ],
             //modified msg
             [
                 //cat img msg
                 'slider_img.required' => 'please choose an image',
                 'slider_img.image' => 'image should be .png, .jpeg, .jpg',
             ]
         );
 
         //Getting the data form the form
         $slider_img = $request->file('slider_img');
         $slider_alt = $request->slider_alt;
 
         //Find the image
         $image = Slider::find($id);
 
         if (!empty($image->slider_img)) {
             //Unlink the image from the folder
             unlink($image->slider_img);
         }
 
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
 
         $dataUpdated = DB::table('sliders')
             ->where('id', $id)
             ->update(
                 [
                     'slider_img' => $slider_img,
                     'slider_alt' => $slider_alt,
 
                 ]
             );
 
         if ($dataUpdated) {
             $notification = [
                 'message' => 'Image Updated Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('slider.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong!!',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('slider.show')->with($notification);
         }
     }

    //Slider delete function
    public function sliderDelete($id)
    {
        //find the image
        $image = Slider::find($id);

        if ($image->slider_img == null) {
            //delete the row from thr table
            $deleted = DB::table('sliders')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Slider Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('slider.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('slider.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->slider_img);
            //delete the row from thr table
            $deleted = DB::table('sliders')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Slider Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('slider.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('slider.show')->with($notification);
            };
        }
    }

}
