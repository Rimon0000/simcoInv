<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //category show function
    public function categoryShow(){
        return view('admin.category.category_show');

    }
}
