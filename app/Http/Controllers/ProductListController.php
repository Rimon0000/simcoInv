<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\DisplaySection;
use App\Models\Origin;
use App\Models\ProductList;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Supplier;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductListController extends Controller
{
    // API

    public function productListSingle($id)
    {
        # code...
        $product_stock = DB::table('product_lists')->where('product_id', $id)->get(['id','stock', 'title', 'category','unit']);
        $category_name = DB::table('categories')->find($product_stock[0]->category);
        $unit_name     = DB::table('units')->find($product_stock[0]->unit);

        $data = [
            'cat_name'  => $category_name->cat_name,
            'unit_name' => $unit_name->unit_name,
            'p_id'      => $product_stock[0]->id,
            'unit'      => $product_stock[0]->unit,
            'cat_id'    => $product_stock[0]->category,
            'title'     => $product_stock[0]->title,
            'stock'     => $product_stock[0]->stock,

        ];
        
        return $data;
    }











    // API End


    //Product List show function
    public function productListShow()
    {
        $data = ProductList::orderByDesc('id')->get();

        return view('admin.product_list.product_list_show', compact('data'));
    }

    //Product List Add Page function
    public function productListAddPage()
    {
        $categories       = Category::all();
        $subcategories    = SubCategory::all();
        $subsubcategories = SubSubCategory::all();
        $brands           = Brand::all();
        $units            = Unit::all();
        $displaysections  = DisplaySection::all();
        $origins          = Origin::all();
        $suppliers        = Supplier::all();
        return view('admin.product_list.product_list_add', compact('categories', 'subcategories', 'subsubcategories', 'brands', 'units', 'displaysections', 'origins', 'suppliers'));
    }

    //product list add function
    public function productListAdd(Request $request)
    {
        // //validate the input items
        // $validated = $request->validate(
        //     [
        //         'cat_name' => 'required|unique:categories|max:50',
        //         'cat_img' => 'image|mimes:jpg,png,jpeg',
        //     ],

        //     // modified msg
        //     [
        //         'cat_name.required' => 'Input field Cannnot be empty',
        //         'cat_name.unique'   => 'Category name alreay taken',
        //         'cat_name.max'      => 'Category name should not be more than 30 characters',

        //         'cat_img.image'      => 'Image should be .png, .jpg, .jpeg',
        //     ],
        // );

        // //getting data from  add form
        $product_id       = $request->product_id;
        $title            = $request->title;
        $price            = $request->price;
        $sale_price       = $request->sale_price;
        $discount_price   = $request->discount_price;
        $discount_percent = $request->discount_percent;
        $category         = $request->category;
        $sub_category     = $request->sub_category;
        $sub_sub_category = $request->sub_sub_category;
        $brand            = $request->brand;
        $display_section  = $request->display_section;
        $origin           = $request->origin;
        $variation_swatch = $request->variation_swatch;
        $color            = $request->color;
        $size             = $request->size;
        $pcs              = $request->pcs;
        $weight           = $request->weight;
        $unit             = $request->unit;
        $stock            = $request->stock;
        $alert_stock      = $request->alert_stock;
        $supplier_id      = $request->supplier_id;
        $tax              = $request->tax;
        $tags             = $request->tags;
        $promotion        = $request->promotion;
        $product_img      = $request->file('product_img');
        $product_alt      = $request->product_alt;
        $product_img_2     = $request->file('product_img_2');
        $product_alt_2      = $request->product_alt_2;
        $warranty         = $request->warranty;

        if ($product_img == null) {
            // check if the user had choosen the image or not
            $product_img = ($product_img == null) ? null : $product_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_list/';

            // //Moving the image to a folder path 
            $product_img->move($upload_to, $img_name);
            $product_img =   $upload_to . $img_name;
        }

        //image 2
        if ($product_img_2 == null) {
            // check if the user had choosen the image or not
            $product_img_2 = ($product_img_2 == null) ? null : $product_img_2;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img_2->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_list/';

            // //Moving the image to a folder path 
            $product_img_2->move($upload_to, $img_name);
            $product_img_2 =   $upload_to . $img_name;
        }


        $result = DB::table('product_lists')->insert([
            'product_id'       => $product_id,
            'title'            => $title,
            'price'            => $price,
            'sale_price'       => $sale_price,
            'discount_price'   => $discount_price,
            'discount_percent' => $discount_percent,
            'category'         => $category,
            'sub_category'     => $sub_category,
            'sub_sub_category' => $sub_sub_category,
            'brand'            => $brand,
            'display_section'  => $display_section,
            'origin'           => $origin,
            'variation_swatch' => $variation_swatch,
            'color'            => $color,
            'size'             => $size,
            'pcs'              => $pcs,
            'weight'           => $weight,
            'unit'             => $unit,
            'stock'            => $stock,
            'alert_stock'      => $alert_stock,
            'supplier_id'      => $supplier_id,
            'tax'              => $tax,
            'tags'             => $tags,
            'promotion'        => $promotion,
            'product_img'      => $product_img,
            'product_alt'      => $product_alt,
            'product_img_2'    => $product_img_2,
            'product_alt_2'    => $product_alt_2,
            'warranty'         => $warranty,
            'created_by'       => Auth::user()->id,
            'created_at'       => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.list.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.list.show')->with($notification);
        }
    }

    //product list status function
    public function productListStatus($id)
    {

        $data = ProductList::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('product_lists')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.list.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.list.show')->with($notification);
        }
    }


    //product list edit image function
    public function productListEditImage($id)
    {

        //fetching data from category table
        $data = ProductList::find($id);

        return view('admin.product_list.product_list_edit_image', compact('data'));
    }

    //Product List image update function
    public function productListImageUpdate(Request $request, $id)
    {
        //validate the input item
        $validated = $request->validate(
            [
                'product_img' => 'required|image|mimes:jpg,png,jpeg',
            ],
            //modified msg
            [
                //product img msg
                'product_img.required' => 'please choose an image',
                'product_img.image' => 'image should be .png, .jpeg, .jpg',
            ]
        );

        //Getting the data form the form
        $product_img = $request->file('product_img');

        //Find the image
        $image = ProductList::find($id);

        if (!empty($image->product_img)) {
            //Unlink the image from the folder
            unlink($image->product_img);
        }

        // //unique ID generate
        $img_name_gen = hexdec(uniqid());

        // //Original ext
        $img_ext      = strtolower($product_img->getClientOriginalExtension());

        // //img new create
        $img_name =  $img_name_gen . '.' . $img_ext;

        // //where I'll keep the image --path
        $upload_to    = 'backend/assets/img/product_list/';

        // //Moving the image to a folder path 
        $product_img->move($upload_to, $img_name);

        $product_img =   $upload_to . $img_name;

        $dataUpdated = DB::table('product_lists')
            ->where('id', $id)
            ->update(
                [
                    'product_img'    => $product_img,

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.list.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.list.show')->with($notification);
        }
    }

    //Product list Edit function
    public function productListEdit($id)
    {

        $data             = ProductList::find($id);
        $categories       = Category::all();
        $subcategories    = SubCategory::all();
        $subsubcategories = SubSubCategory::all();
        $brands           = Brand::all();
        $units            = Unit::all();
        $origins          = Origin::all();
        $displaysections  = DisplaySection::all();
        $suppliers        = Supplier::all();

        return view('admin.product_list.product_list_edit', compact('data', 'categories', 'subcategories', 'subsubcategories', 'brands', 'units', 'displaysections', 'origins', 'suppliers'));
    }

    //Product List Update function
    public function productListUpdate(Request $request, $id)
    {

        #code ...
        // //getting data from  add form
        $product_id       = $request->product_id;
        $title            = $request->title;
        $price            = $request->price;
        $sale_price       = $request->sale_price;
        $discount_price   = $request->discount_price;
        $discount_percent = $request->discount_percent;
        $category         = $request->category;
        $sub_category     = $request->sub_category;
        $sub_sub_category = $request->sub_sub_category;
        $brand            = $request->brand;
        $display_section  = $request->display_section;
        $origin           = $request->origin;
        $variation_swatch = $request->variation_swatch;
        $color            = $request->color;
        $size             = $request->size;
        $pcs              = $request->pcs;
        $weight           = $request->weight;
        $unit             = $request->unit;
        $stock            = $request->stock;
        $alert_stock      = $request->alert_stock;
        $supplier_id      = $request->supplier_id;
        $tax              = $request->tax;
        $tags             = $request->tags;
        $promotion        = $request->promotion;
        $warranty         = $request->warranty;

        $dataUpdated = DB::table('product_lists')
            ->where('id', $id)
            ->update(
                [
                    'product_id'       => $product_id,
                    'title'            => $title,
                    'price'            => $price,
                    'sale_price'       => $sale_price,
                    'discount_price'   => $discount_price,
                    'discount_percent' => $discount_percent,
                    'category'         => $category,
                    'sub_category'     => $sub_category,
                    'sub_sub_category' => $sub_sub_category,
                    'brand'            => $brand,
                    'display_section'  => $display_section,
                    'origin'           => $origin,
                    'variation_swatch' => $variation_swatch,
                    'color'            => $color,
                    'size'             => $size,
                    'pcs'              => $pcs,
                    'weight'           => $weight,
                    'unit'             => $unit,
                    'stock'            => $stock,
                    'alert_stock'      => $alert_stock,
                    'supplier_id'      => $supplier_id,
                    'tax'              => $tax,
                    'tags'             => $tags,
                    'promotion'        => $promotion,
                    'warranty'         => $warranty,
                    'created_by'       => Auth::user()->id,
                    'created_at'       => Carbon::now(),
                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Product List Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.list.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.list.show')->with($notification);
        }
    }

    //product list delete function
    public function productListDelete($id)
    {
        //find the image
        $image = ProductList::find($id);

        if ($image->product_img == null) {
            //delete the row from thr table
            $deleted = DB::table('product_lists')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Product List Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('product.list.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('product.list.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->product_img);
            //delete the row from thr table
            $deleted = DB::table('product_lists')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Product List Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('product.list.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('product.list.show')->with($notification);
            };
        }
    }
}
