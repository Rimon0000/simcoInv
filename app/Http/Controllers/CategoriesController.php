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
        $status = $request->status;
 
        // check if the user had choosen the image or not
        $cat_img = ($cat_img == null) ? 'backend/assets/img/default-img.png' : $cat_img;

        //check status
        $status = ($status == 'on') ? 1 : 0;

        $result = DB::table('categories')->insert([
            'cat_name' => $cat_name,
            'cat_img' => $cat_img,
            'status' => $status

        ]);
        if ($result) {
            return redirect()->route('category.show')->with('success', 'Category Added Successfully.');
        } else {
            return redirect()->route('category.show')->with('warning', 'Something Went Wrong.');
        }
    }
}
