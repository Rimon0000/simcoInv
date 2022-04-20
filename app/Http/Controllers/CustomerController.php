<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Area;
use App\Models\CustomerType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //customer show function
    public function customerShow()
    {
        $data = Customer::orderByDesc('id')->get();

        return view('admin.customer.customer_show', compact('data'));
    }

    //customer Add Page function
    public function customerAddPage()
    {
        $areas = Area::where('status',1)->orderByDesc('id')->get();
        $customertypes =CustomerType::where('status',1)->orderByDesc('id')->get();
        return view('admin.customer.customer_add', compact('areas', 'customertypes'));
    }

    //customer add function
    public function customerAdd(Request $request)
    {
        //  //validate the input items
        //  $validated = $request->validate(
        //      [
        //          'slider_name' => 'required|unique:sliders|max:50',
        //          'slider_img' => 'image|mimes:jpg,png,jpeg',
        //      ],

        //      // modified msg
        //      [
        //          'slider_name.required' => 'Input field Cannnot be empty',
        //          'slider_name.unique'   => 'Slider name alreay taken',
        //          'slider_name.max'      => 'Slider name should not be more than 30 characters',

        //          'slider_img.image'      => 'Image should be .png, .jpg, .jpeg',
        //      ],
        //  );

        // //getting data from  add form
        $customer_id     = $request->customer_id;
        $customer_name   = $request->customer_name;
        $credit_limit    = $request->credit_limit;
        $previous_due    = $request->previous_due;
        $mobile          = $request->mobile;
        $office_phone    = $request->office_phone;
        $email           = $request->email;
        $website         = $request->website;
        $customer_type   = $request->customer_type;
        $area            = $request->area;
        $present_address = $request->present_address;
        $status          = $request->status;
        $customer_img    = $request->file('customer_img');

        if ($customer_img == null) {
            // check if the user had choosen the image or not
            $customer_img = ($customer_img == null) ? null : $customer_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($customer_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/customer/';

            // //Moving the image to a folder path 
            $customer_img->move($upload_to, $img_name);
            $customer_img =   $upload_to . $img_name;
        }

        $result = DB::table('customers')->insert([
            'customer_id'     => $customer_id,
            'customer_name'   => $customer_name,
            'credit_limit'    => $credit_limit,
            'previous_due'    => $previous_due,
            'mobile'          => $mobile,
            'office_phone'    => $office_phone,
            'email'           => $email,
            'website'         => $website,
            'customer_type'   => $customer_type,
            'area'            => $area,
            'present_address' => $present_address,
            'status'          => $status,
            'customer_img'    => $customer_img,
            'created_by'      => Auth::user()->id,
            'created_at'      => Carbon::now(),


        ]);
        if ($result) {
            $notification = [
                'message' => 'Customer Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('customer.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.show')->with($notification);
        }
    }

    //customer Edit function
    public function  customerEdit($id)
    {

        $data = Customer::find($id);
        $areas = Area::where('status',1)->orderByDesc('id')->get();
        $customertypes =CustomerType::where('status',1)->orderByDesc('id')->get();
        return view('admin.customer.customer_edit', compact('data', 'areas', 'customertypes'));
    }

    //customer Update function
    public function customerUpdate(Request $request, $id)
    {


        #code ...
        $customer_id     = $request->customer_id;
        $customer_name   = $request->customer_name;
        $credit_limit    = $request->credit_limit;
        $previous_due    = $request->previous_due;
        $mobile          = $request->mobile;
        $office_phone    = $request->office_phone;
        $email           = $request->email;
        $website         = $request->website;
        $customer_type   = $request->customer_type;
        $area            = $request->area;
        $present_address = $request->present_address;
        $status          = $request->status;
     

        $dataUpdated = DB::table('customers')
            ->where('id', $id)
            ->update(
                [
                    'customer_id'     => $customer_id,
                    'customer_name'   => $customer_name,
                    'credit_limit'    => $credit_limit,
                    'previous_due'    => $previous_due,
                    'mobile'          => $mobile,
                    'office_phone'    => $office_phone,
                    'email'           => $email,
                    'website'         => $website,
                    'customer_type'   => $customer_type,
                    'area'            => $area,
                    'present_address' => $present_address,
                    'status'          => $status,
                    
                    'created_by'      => Auth::user()->id,
                    'created_at'      => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Customer Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('customer.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.show')->with($notification);
        }
    }

    //customer edit image function
    public function customerEditImage($id)
    {

        //fetching data from table
        $data = Customer::find($id);

        return view('admin.customer.customer_edit_image', compact('data'));
    }

    //customer image update function
    public function customerImageUpdate(Request $request, $id)
    {
        //validate the input item
        $validated = $request->validate(
            [
                'customer_img' => 'required|image|mimes:jpg,png,jpeg',
            ],
            //modified msg
            [
                //customer img msg
                'customer_img.required' => 'please choose an image',
                'customer_img.image' => 'image should be .png, .jpeg, .jpg',
            ]
        );

        //Getting the data form the form
        $customer_img = $request->file('customer_img');

        //Find the image
        $image = Customer::find($id);

        if (!empty($image->customer_img)) {
            //Unlink the image from the folder
            unlink($image->customer_img);
        }

        // //unique ID generate
        $img_name_gen = hexdec(uniqid());

        // //Original ext
        $img_ext      = strtolower($customer_img->getClientOriginalExtension());

        // //img new create
        $img_name =  $img_name_gen . '.' . $img_ext;

        // //where I'll keep the image --path
        $upload_to    = 'backend/assets/img/customer/';

        // //Moving the image to a folder path 
        $customer_img->move($upload_to, $img_name);

        $customer_img =   $upload_to . $img_name;

        $dataUpdated = DB::table('customers')
            ->where('id', $id)
            ->update(
                [
                    'customer_img' => $customer_img,

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('customer.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('customer.show')->with($notification);
        }
    }

    //customer delete function
    public function customerDelete($id)
    {
        //find the image
        $image = Customer::find($id);

        if ($image->customer_img == null) {
            //delete the row from thr table
            $deleted = DB::table('customers')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Customer Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('customer.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('customer.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->customer_img);
            //delete the row from thr table
            $deleted = DB::table('customers')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Customer Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('customer.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('customer.show')->with($notification);
            };
        }
    }
}
