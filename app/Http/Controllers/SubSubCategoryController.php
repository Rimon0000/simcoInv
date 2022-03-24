<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubSubCategoryController extends Controller
{
    //
    //Sub Sub category show function
    public function subSubCategoryShow()
    {
        $data = SubSubCategory::orderByDesc('id')->get();

        return view('admin.sub_sub_category.sub_sub_category_show', compact('data'));
    }

    // Sub category add page
    public function subSubCategoryAddPage()
    {
        $data = Category::where('status', '=', '1')->orderBy('cat_name')->get();
        $data2 = SubCategory::where('status', '=', '1')->orderBy('sub_cat_name')->get();
        return view('admin.sub_sub_category.sub_sub_category_add', compact('data', 'data2'));
    }

    // Sub Sub category add function
    public function subSubCategoryAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'sub_sub_cat_name' => 'required|unique:sub_sub_categories|max:50',
                'sub_cat_id'       => 'required',
                'cat_id'           => 'required',
            ],

            // modified msg
            [
                'sub_sub_cat_name.required' => 'Sub Category Two field can not be empty',
                'sub_sub_cat_name.unique'   => 'Sub Category Two name alreay taken',
                'sub_sub_cat_name.max'      => 'Sub Category Two name should not be more than 30 characters',

                'cat_id'      => 'Please select category',
                'sub_cat_id'      => 'Please select Sub category One',
            ],
        );

        // // //getting data from category and Sub Category add form
        $sub_sub_cat_name =  $request->sub_sub_cat_name;
        $sub_cat_id       =  $request->sub_cat_id;
        $cat_id           =  $request->cat_id;


        $result = DB::table('sub_sub_categories')->insert([
            'sub_sub_cat_name' => $sub_sub_cat_name,
            'sub_cat_id'       => $sub_cat_id,
            'cat_id'           => $cat_id,
            'created_by'       => Auth::user()->id,
            'created_at'       => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Sub Category Two Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('subsubcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subsubcategory.show')->with($notification);
        }
    }

    //Sub Sub category Edit function
    public function  subSubCategoryEdit($id)
    {

        $data = SubSubCategory::find($id);
        $categories = Category::where('status', '=', '1')->orderBy('cat_name')->get();
        $categories2 = SubCategory::where('status', '=', '1')->orderBy('sub_cat_name')->get();
        return view('admin.sub_sub_category.sub_sub_category_edit', compact('data', 'categories','categories2'));
    }

    //Sub Sub category Update function
    public function subSubCategoryUpdate(Request $request, $id)
    {

        #code ...
        $sub_sub_cat_name = $request->sub_sub_cat_name;
        $sub_cat_id       = $request->sub_cat_id;
        $cat_id       = $request->cat_id;

        $dataUpdated = DB::table('sub_sub_categories')
            ->where('id', $id)
            ->update(
                [
                    'sub_sub_cat_name' =>  $sub_sub_cat_name,
                    'sub_cat_id' =>  $sub_cat_id,
                    'cat_id' =>  $cat_id,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Sub Category Two Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('subsubcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subsubcategory.show')->with($notification);
        }
    }

    //Sub Sub Category delete function
    public function subSubCategoryDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('sub_sub_categories')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Sub Category Two Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('subsubcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subsubcategory.show')->with($notification);
        };
    }
}
