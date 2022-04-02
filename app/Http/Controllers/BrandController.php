<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    //
    //Brand show function
    public function brandShow()
    {
        $data = Brand::orderByDesc('id')->get();

        return view('admin.brand.brand_show', compact('data'));
    }

    
    //Brand Add Page function
    public function brandAddPage()
    {
        return view('admin.brand.brand_add');
    }

    //brand edit image function
    public function brandEditImage($id)
    {

        //fetching data from brand table
        $data = Brand::find($id);

        return view('admin.brand.brand_edit_image', compact('data'));
    }


    //brand add function
    public function brandAdd(Request $request)
    {
        //validate the input items
        $validated = $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:50',
                'brand_img' => 'image|mimes:jpg,png,jpeg',
            ],

            // modified msg
            [
                'brand_name.required' => 'Input field Cannnot be empty',
                'brand_name.unique'   => 'Brand name alreay taken',
                'brand_name.max'      => 'Brand name should not be more than 30 characters',

                'brand_img.image'      => 'Image should be .png, .jpg, .jpeg',
            ],
        );

        // //getting data from brand add form
        $brand_name = $request->brand_name;
        $brand_img = $request->file('brand_img');

        if ($brand_img == null) {
            // check if the user had choosen the image or not
            $brand_img = ($brand_img == null) ? null : $brand_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($brand_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/brand/';

            // //Moving the image to a folder path 
            $brand_img->move($upload_to, $img_name);
            $brand_img =   $upload_to . $img_name;
        }

        $result = DB::table('brands')->insert([
            'brand_name'   => $brand_name,
            'brand_img'    => $brand_img,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),


        ]);
        if ($result) {
            $notification = [
                'message' => 'Brand Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('brand.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('brand.show')->with($notification);
        }
    }

    //Brand status function
    public function brandStatus($id)
    {

        $data = Brand::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('brands')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('brand.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('brand.show')->with($notification);
        }
    }

    //Brand Edit function
    public function  brandEdit($id)
    {

        $data = Brand::find($id);
        return view('admin.brand.brand_edit', compact('data'));
    }

     //Brand Update function
    public function brandUpdate(Request $request, $id)
    {

        #code ...
        $brand_name = $request->brand_name;

        $dataUpdated = DB::table('brands')
            ->where('id', $id)
            ->update(
                [
                    'brand_name' => $brand_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Brand Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('brand.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('brand.show')->with($notification);
        }
    }

    //Brand image update function
    public function brandImageUpdate(Request $request, $id)
    {
        //validate the input item
        $validated = $request->validate(
            [
                'brand_img' => 'required|image|mimes:jpg,png,jpeg',
            ],
            //modified msg
            [
                //brand_img msg
                'brand_img.required' => 'please choose an image',
                'brand_img.image' => 'image should be .png, .jpeg, .jpg',
            ]
        );

        //Getting the data form the form
        $brand_img = $request->file('brand_img');

        //Find the image
        $image = Brand::find($id);

        if (!empty($image->brand_img)) {
            //Unlink the image from the folder
            unlink($image->brand_img);
        }

        // //unique ID generate
        $img_name_gen = hexdec(uniqid());

        // //Original ext
        $img_ext      = strtolower($brand_img->getClientOriginalExtension());

        // //img new create
        $img_name =  $img_name_gen . '.' . $img_ext;

        // //where I'll keep the image --path
        $upload_to    = 'backend/assets/img/brand/';

        // //Moving the image to a folder path 
        $brand_img->move($upload_to, $img_name);

        $brand_img =   $upload_to . $img_name;

        $dataUpdated = DB::table('brands')
            ->where('id', $id)
            ->update(
                [
                    'brand_img'    => $brand_img,

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('brand.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('brand.show')->with($notification);
        }
    }

    //Category delete function
    public function brandDelete($id)
    {
        //find the image
        $image = Brand::find($id);

        if ($image->brand_img == null) {
            //delete the row from thr table
            $deleted = DB::table('brands')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Brand Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('brand.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('brand.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->brand_img);
            //delete the row from thr table
            $deleted = DB::table('brands')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Brand Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('brand.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('brand.show')->with($notification);
            };
        }
    }
}
