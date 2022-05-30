<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\ProductList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //Product Detail Show Page function
    public function productDetailShow()
    {
        $data = ProductDetail::orderByDesc('id')->get();
        return view('admin.product_details.product_details_show', compact('data'));
    }

    //Product Detail Add Page function
    public function productDetailAddPage()
    {
        $productlists =  ProductList::all();
        return view('admin.product_details.product_details_add', compact('productlists'));
    }

    //Product Detail Display Page function
    public function productDetailDisplayShow($id)
    {
        $data = ProductDetail::find($id);
        $productlists =  ProductList::all();

        return view('admin.product_details.product_details_display', compact('data', 'productlists'));
    }

    //product detail add function
    public function productDetailAdd(Request $request)
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
        $product_id      = $request->product_id;
        $fb_url          = $request->fb_url;
        $whatsapp_url    = $request->whatsapp_url;
        $short_details   = $request->short_details;
        $long_details    = $request->long_details;
        $faq             = $request->faq;
        $warranty_policy = $request->warranty_policy;


        $product_img_1   = $request->file('product_img_1');
        $product_img_2   = $request->file('product_img_2');
        $product_img_3   = $request->file('product_img_3');
        $product_img_4   = $request->file('product_img_4');
        $product_alt_1   = $request->product_alt_1;
        $product_alt_2   = $request->product_alt_2;
        $product_alt_3   = $request->product_alt_3;
        $product_alt_4   = $request->product_alt_4;

        if ($product_img_1 == null) {
            // check if the user had choosen the image or not
            $product_img_1 = ($product_img_1 == null) ? null : $product_img_1;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img_1->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '_1.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_details/';

            // //Moving the image to a folder path 
            $product_img_1->move($upload_to, $img_name);
            $product_img_1 =   $upload_to . $img_name;
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
            $img_name =  $img_name_gen . '_2.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_details/';

            // //Moving the image to a folder path 
            $product_img_2->move($upload_to, $img_name);
            $product_img_2 =   $upload_to . $img_name;
        }

        //image 3
        if ($product_img_3 == null) {
            // check if the user had choosen the image or not
            $product_img_3 = ($product_img_3 == null) ? null : $product_img_3;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img_3->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '_3.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_details/';

            // //Moving the image to a folder path 
            $product_img_3->move($upload_to, $img_name);
            $product_img_3 =   $upload_to . $img_name;
        }

        //image 4
        if ($product_img_4 == null) {
            // check if the user had choosen the image or not
            $product_img_4 = ($product_img_4 == null) ? null : $product_img_4;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($product_img_4->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '_4.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/product_details/';

            // //Moving the image to a folder path 
            $product_img_4->move($upload_to, $img_name);
            $product_img_4 =   $upload_to . $img_name;
        }

        $result = DB::table('product_details')->insert([

            'product_id'      => $product_id,
            'fb_url'          => $fb_url,
            'whatsapp_url'    => $whatsapp_url,
            'short_details'   => $short_details,
            'long_details'    => $long_details,
            'faq'             => $faq,
            'warranty_policy' => $warranty_policy,

            'product_img_1'   => $product_img_1,
            'product_img_2'   => $product_img_2,
            'product_img_3'   => $product_img_3,
            'product_img_4'   => $product_img_4,
            'product_alt_1'   => $product_alt_1,
            'product_alt_2'   => $product_alt_2,
            'product_alt_3'   => $product_alt_3,
            'product_alt_4'   => $product_alt_4,
            'created_by'      => Auth::user()->id,
            'created_at'      => Carbon::now(),

        ]);

        if ($result) {
            $notification = [
                'message' => 'Product Details Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.detail.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.detail.show')->with($notification);
        }
    }

    //product Detail status function
    public function productDetailStatus($id)
    {

        $data = ProductDetail::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('product_details')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('product.detail.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('product.detail.show')->with($notification);
        }
    }




    //product Detail delete function
    public function productDetailDelete($id)
    {
        //find the image
        $image = ProductDetail::find($id);

        if ($image->product_img_1 == null) {
            //delete the row from thr table
            $deleted = DB::table('product_details')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Product Details Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('product.detail.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('product.detail.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->product_img_1);
            //delete the row from thr table
            $deleted = DB::table('product_details')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Product Detail Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('product.detail.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('product.detail.show')->with($notification);
            };
        }
    }

    // Product Detail Update function
    public function productDetailUpdate(Request $request, $id)
    {

        // Getting data from Service Details Edit form

        $product_id      = $request->product_id;
        $short_details   = $request->short_details;
        $long_details    = $request->long_details;
        $whatsapp_url    = $request->whatsapp_url;
        $fb_url          = $request->fb_url;
        $faq             = $request->faq;
        $warranty_policy = $request->warranty_policy;


        if (!empty($product_id && $fb_url && $whatsapp_url)) {
            $dataUpdated = DB::table('product_details')
                ->where('id', $id)
                ->update(
                    [
                        "product_id"   => $product_id,
                        "whatsapp_url" => $whatsapp_url,
                        "fb_url"       => $fb_url,
                        'updated_by'   => Auth::user()->id,
                        'updated_at'   => Carbon::now()
                    ]
                );
            if ($dataUpdated) {
                $notification = [
                    'message'     => 'Product Details Updated Successfully.',
                    'alert-type'  => 'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                return redirect()->back()->with('warning', 'Something Went Wrong !!');
            }
        }

        if (!empty($short_details)) {
            $dataUpdated = DB::table('product_details')
                ->where('id', $id)
                ->update(
                    [
                        "short_details" => $short_details,
                        'updated_by'    => Auth::user()->id,
                        'updated_at'    => Carbon::now()
                    ]
                );
            if ($dataUpdated) {
                $notification = [
                    'message'     => 'Product Details Updated Successfully.',
                    'alert-type'  => 'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                return redirect()->back()->with('warning', 'Something Went Wrong !!');
            }
        }

        if (!empty($long_details)) {

            $dataUpdated = DB::table('product_details')
                ->where('id', $id)
                ->update(
                    [
                        "long_details" => $long_details,
                        'updated_by'   => Auth::user()->id,
                        'updated_at'   => Carbon::now()
                    ]
                );
            if ($dataUpdated) {
                $notification = [
                    'message'     => 'Long Details Updated Successfully.',
                    'alert-type'  => 'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                return redirect()->back()->with('warning', 'Something Went Wrong !!');
            }
        }

        if (!empty($faq)) {

            $dataUpdated = DB::table('product_details')
                ->where('id', $id)
                ->update(
                    [
                        "faq"        => $faq,
                        'updated_by' => Auth::user()->id,
                        'updated_at' => Carbon::now()
                    ]
                );
            if ($dataUpdated) {
                $notification = [
                    'message'     => 'Faq Updated Successfully.',
                    'alert-type'  => 'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                return redirect()->back()->with('warning', 'Something Went Wrong !!');
            }
        }

        if (!empty($warranty_policy)) {

            $dataUpdated = DB::table('product_details')
                ->where('id', $id)
                ->update(
                    [
                        "warranty_policy" => $warranty_policy,
                        'updated_by'      => Auth::user()->id,
                        'updated_at'      => Carbon::now()
                    ]
                );

            if ($dataUpdated) {
                $notification = [
                    'message'     => 'Warranty Policy Updated Successfully.',
                    'alert-type'  => 'success'
                ];
                return redirect()->back()->with($notification);
            } else {
                return redirect()->back()->with('warning', 'Something Went Wrong !!');
            }
        }
    }
}
