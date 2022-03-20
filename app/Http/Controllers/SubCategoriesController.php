<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = Category::where('status', '=', '1')->orderBy('cat_name')->get();
        return view('admin.sub_category.sub_category_add', compact('data'));
    }

    // Sub category add function
    public function subCategoryAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'sub_cat_name' => 'required|unique:sub_categories|max:50',
                'cat_id' => 'required',
            ],

            // modified msg
            [
                'sub_cat_name.required' => 'Input field can not be empty',
                'sub_cat_name.unique'   => 'Sub Category name alreay taken',
                'sub_cat_name.max'      => 'Sub Category name should not be more than 30 characters',

                'cat_id'      => 'Please select category',
            ],
        );

        // // //getting data from category add form
        $sub_cat_name = $request->sub_cat_name;
        $cat_id       = $request->cat_id;


        $result = DB::table('sub_categories')->insert([
            'sub_cat_name' => $sub_cat_name,
            'cat_id' => $cat_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Sub Category Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('subcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subcategory.show')->with($notification);
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
            return redirect()->route('subcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subcategory.show')->with($notification);
        }
    }

    //Sub category Edit function
    public function  subCategoryEdit($id)
    {

        $data = SubCategory::find($id);
        $categories = Category::where('status', '=', '1')->orderBy('cat_name')->get();
        return view('admin.sub_category.sub_category_edit', compact('data','categories'));
    }

    //Sub category Update function
    public function subCategoryUpdate(Request $request, $id)
    {

        #code ...
        $sub_cat_name = $request->sub_cat_name;
        $cat_id       = $request->cat_id;

        $dataUpdated = DB::table('sub_categories')
            ->where('id', $id)
            ->update(
                [
                    'sub_cat_name' =>  $sub_cat_name,
                    'cat_id' =>  $cat_id,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Sub Category Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('subcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subcategory.show')->with($notification);
        }
    }

    //Sub Category delete function
    public function subCategoryDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('sub_categories')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Sub Category Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('subcategory.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subcategory.show')->with($notification);
        };
    }
}
