<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoriesController extends Controller
{
    //
    //Sub category show function
    public function subCategoryShow()
    {
        $data = SubCategory::orderByDesc('id')->get();

        return view('admin.sub_category.sub_category_show', compact('data'));
    }

    // Sub category add page
     public function subCategoryAddPage()
     {
         $data = Category::all();
        return view('admin.sub_category.sub_category_add', compact('data'));
     }

    // Sub category add function
    public function subCategoryAdd(Request $request)
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

        $result = DB::table('sub_categories')->insert([
            'cat_name' => $cat_name,
            'cat_img' => $cat_img,
            'status' => 1

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

    //Sub category status function
    public function subCategoryStatus($id)
    {

        $data = SubCategory::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('sub_categories')
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

    //Sub category Edit function
    public function  subCategoryEdit($id)
    {

        $data = SubCategory::find($id);
        return view('admin.category.category_edit', compact('data'));
    }

      //Sub category Update function
    public function subCategoryUpdate(Request $request, $id)
    {

        #code ...
        $cat_name = $request->cat_name;

        $dataUpdated = DB::table('sub_categories')
            ->where('id', $id)
            ->update(
                ['cat_name' => $cat_name,]
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

    //Sub Category delete function
    public function subCategoryDelete($id)
    {
        //find the image
        $image = SubCategory::find($id);

        if ($image->cat_img == null) {
            //delete the row from thr table
            $deleted = DB::table('sub_categories')->where('id', '=', $id)->delete();

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
            $deleted = DB::table('sub_categories')->where('id', '=', $id)->delete();

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
