<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //category show function
    public function categoryShow()
    {
        $data = Category::orderByDesc('id')->get();

        return view('admin.category.category_show', compact('data'));
    }
    //category add function
    public function categoryAdd(Request $request)
    {

        //getting data from category add form
        $cat_name = $request->cat_name;
        $cat_img = $request->cat_img;

        // check if the user had choosen the image or not
        $cat_img = ($cat_img == null) ? 'backend/assets/img/default-img.png' : $cat_img;


        $result = DB::table('categories')->insert([
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

    public function  categoryEdit($id)
    {

        $data = category::find($id);
        return view('admin.category.category_edit', compact('data'));
    }

    public function categoryUpdate(Request $request, $id)
    {

        #code ...
        $cat_name = $request->cat_name;

        $dataUpdated = DB::table('categories')
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

    public function categoryDelete($id){
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
