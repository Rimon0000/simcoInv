<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use App\Models\ProductList;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductAttributeController extends Controller
{
    //
    //Product Attribute show
    public function productAttributeShow()
    {
        $data = ProductAttribute::orderByDesc('id')->get();

        return view('admin.product_attribute.product_attribute_show', compact('data'));
    }

    //Product atribute Add Page function
    public function productAttributeAddPage()
    {
        $Productlists =  ProductList::where('variation_swatch', 1)->get();
        $units        = Unit::all();
        return view('admin.product_attribute.product_attribute_add', compact('Productlists','units'));
    }

    //product attribute add function
    public function productAttributeAdd(Request $request)
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

        $product_id         = $request->product_id;
        $quantity           = $request->quantity ;
        $stock_alert        = $request->stock_alert;
        $unit_id            = $request->unit_id;
        $color              = $request->color;
        $size               = $request->size;
        $piece              = $request->piece;
        $weight             = $request->weight;
        $price              = $request->price;
        $sale_price         = $request->sale_price;
        $discount_price     = $request->discount_price;
        $discount_percent   = $request->discount_percent;
        $product_img_1      = $request->file('product_img_1');
        $product_img_2      = $request->file('product_img_2');
        $product_img_alt_1  = $request->file('product_img_alt_1');
        $product_img_alt_2  = $request->file('product_img_alt_2');


        if ($product_img_1 == null) {
            // check if the user had choosen the image or not
            $product_img = ($product_img_1 == null) ? null : $product_img_1;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img_1->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_attribute/';

            // //Moving the image to a folder path 
            $product_img_1->move($upload_to, $img_name);
            $product_img_1 =   $upload_to . $img_name;
        }

        //image 2
        if ($product_img_2 == null) {
            // check if the user had choosen the image or not
            $product_img = ($product_img_2 == null) ? null : $product_img_2;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img_2->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_attribute/';

            // //Moving the image to a folder path 
            $product_img_2->move($upload_to, $img_name);
            $product_img_2 =   $upload_to . $img_name;
        }

        $result = DB::table('product_attributes')->insert([
            'product_id'       => $product_id,
            'quantity'         => $quantity,
            'stock_alert'      => $stock_alert,
            'unit_id'          => $unit_id ,
            'color'            => $color,
            'size'             => $size,
            'piece'            => $piece,
            'weight'           => $weight,
            'price'            => $price,
            'sale_price'       => $sale_price,
            'discount_price'   => $discount_price,
            'discount_percent' => $discount_percent,
            'product_img_1'    => $product_img_1,
            'product_img_2'    => $product_img_2,
            'product_img_alt_1' => $product_img_alt_1,
            'product_img_alt_2' => $product_img_alt_2,
            'created_by'       => Auth::user()->id,
            'created_at'       => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.attribute.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.attribute.show')->with($notification);
        }
    }
}
