<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //category show function
    public function categoryShow()
    {
        $data = Category::orderByDesc('id')->get();

        return view('admin.category.category_show', compact('data'));
    }

    
    //category Add Page function
    public function categoryAddPage()
    {
        return view('admin.category.category_add');
    }

    //category edit image function
    public function categoryEditImage($id)
    {

        //fetching data from category table
        $data = category::find($id);

        return view('admin.category.category_edit_image', compact('data'));
    }


    //category add function
    public function categoryAdd(Request $request)
    {
        //validate the input items
        $validated = $request->validate(
            [
                'cat_name' => 'required|unique:categories|max:50',
                'cat_img' => 'image|mimes:jpg,png,jpeg',
            ],

            // modified msg
            [
                'cat_name.required' => 'Input field Cannnot be empty',
                'cat_name.unique'   => 'Category name alreay taken',
                'cat_name.max'      => 'Category name should not be more than 30 characters',

                'cat_img.image'      => 'Image should be .png, .jpg, .jpeg',
            ],
        );

        // //getting data from category add form
        $cat_name = $request->cat_name;
        $cat_img = $request->file('cat_img');

        if ($cat_img == null) {
            // check if the user had choosen the image or not
            $cat_img = ($cat_img == null) ? null : $cat_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($cat_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/category/';

            // //Moving the image to a folder path 
            $cat_img->move($upload_to, $img_name);
            $cat_img =   $upload_to . $img_name;
        }

        $result = DB::table('categories')->insert([
            'cat_name'   => $cat_name,
            'cat_img'    => $cat_img,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),


        ]);
        if ($result) {
            $notification = [
                'message' => 'Category Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('category.show')->with($notification);
        }
    }

    //category status function
    public function categoryStatus($id)
    {

        $data = category::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('categories')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('category.show')->with($notification);
        }
    }

    //category Edit function
    public function  categoryEdit($id)
    {

        $data = category::find($id);
        return view('admin.category.category_edit', compact('data'));
    }

     //category Update function
    public function categoryUpdate(Request $request, $id)
    {

        #code ...
        $cat_name = $request->cat_name;

        $dataUpdated = DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'cat_name' => $cat_name,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Category Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('category.show')->with($notification);
        }
    }

    //category image update function
    public function categoryImageUpdate(Request $request, $id)
    {
        //validate the input item
        $validated = $request->validate(
            [
                'cat_img' => 'required|image|mimes:jpg,png,jpeg',
            ],
            //modified msg
            [
                //cat img msg
                'cat_img.required' => 'please choose an image',
                'cat_img.image' => 'image should be .png, .jpeg, .jpg',
            ]
        );

        //Getting the data form the form
        $cat_img = $request->file('cat_img');

        //Find the image
        $image = category::find($id);

        if (!empty($image->cat_img)) {
            //Unlink the image from the folder
            unlink($image->cat_img);
        }

        // //unique ID generate
        $img_name_gen = hexdec(uniqid());

        // //Original ext
        $img_ext      = strtolower($cat_img->getClientOriginalExtension());

        // //img new create
        $img_name =  $img_name_gen . '.' . $img_ext;

        // //where I'll keep the image --path
        $upload_to    = 'backend/assets/img/category/';

        // //Moving the image to a folder path 
        $cat_img->move($upload_to, $img_name);

        $cat_img =   $upload_to . $img_name;

        $dataUpdated = DB::table('categories')
            ->where('id', $id)
            ->update(
                [
                    'cat_img'    => $cat_img,

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('category.show')->with($notification);
        }
    }

    //Category delete function
    public function categoryDelete($id)
    {
        //find the image
        $image = category::find($id);

        if ($image->cat_img == null) {
            //delete the row from thr table
            $deleted = DB::table('categories')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Category Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('category.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('category.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->cat_img);
            //delete the row from thr table
            $deleted = DB::table('categories')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Category Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('category.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('category.show')->with($notification);
            };
        }
    }
}
