<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //supplier show function
    public function supplierShow()
    {
        $data = Supplier::orderByDesc('id')->get();

        return view('admin.supplier.supplier_show', compact('data'));
    }

    //supplier Add Page function
    public function supplierAddPage()
    {
        return view('admin.supplier.supplier_add');
    }

    //supplier add function
    public function supplierAdd(Request $request)
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
        $supplier_id     = $request->supplier_id;
        $supplier_name   = $request->supplier_name;
        $owner_name      = $request->owner_name;
        $present_address = $request->present_address;
        $contact         = $request->contact;
        $whatsapp        = $request->whatsapp;
        $previous_due    = $request->previous_due;
        $email           = $request->email;
        $website         = $request->website;
        $supplier_img    = $request->file('supplier_img');

        if ($supplier_img == null) {
            // check if the user had choosen the image or not
            $supplier_img = ($supplier_img == null) ? null : $supplier_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($supplier_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/supplier/';

            // //Moving the image to a folder path 
            $supplier_img->move($upload_to, $img_name);
            $supplier_img =   $upload_to . $img_name;
        }

        $result = DB::table('suppliers')->insert([
            'supplier_id'     => $supplier_id,
            'supplier_name'   => $supplier_name,
            'owner_name'      => $owner_name,
            'present_address' => $present_address,
            'contact'         => $contact,
            'whatsapp'        => $whatsapp,
            'previous_due'    => $previous_due,
            'email'           => $email,
            'website'         => $website,
            'supplier_img'    =>$supplier_img,
            'created_by'   => Auth::user()->id,
            'created_at'   => Carbon::now(),


        ]);
        if ($result) {
            $notification = [
                'message' => 'Supplier Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('supplier.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('supplier.show')->with($notification);
        }
    }

    //supplier status function
    public function supplierStatus($id)
    {

        $data = Supplier::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('suppliers')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('supplier.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('supplier.show')->with($notification);
        }
    }

    //supplier Edit function
    public function  supplierEdit($id)
    {

        $data = Supplier::find($id);
        return view('admin.supplier.supplier_edit', compact('data'));
    }

     //supplier Update function
    public function supplierUpdate(Request $request, $id)
    {


        #code ...
        $supplier_id     = $request->supplier_id;
        $supplier_name   = $request->supplier_name;
        $owner_name      = $request->owner_name;
        $present_address = $request->present_address;
        $contact         = $request->contact;
        $whatsapp        = $request->whatsapp;
        $previous_due    = $request->previous_due;
        $email           = $request->email;
        $website         = $request->website;
        $supplier_img    = $request->file('supplier_img');

        $dataUpdated = DB::table('suppliers')
            ->where('id', $id)
            ->update(
                [
                    'supplier_id'     => $supplier_id,
                    'supplier_name'   => $supplier_name,
                    'owner_name'      => $owner_name,
                    'present_address' => $present_address,
                    'contact'         => $contact,
                    'whatsapp'        => $whatsapp,
                    'previous_due'    => $previous_due,
                    'email'           => $email,
                    'website'         => $website,
                    'updated_by'  => Auth::user()->id,
                    'updated_at'  => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Supplier Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('supplier.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('supplier.show')->with($notification);
        }
    }

      //supplier edit image function
      public function supplierEditImage($id)
      {
  
          //fetching data from table
          $data = Supplier::find($id);
  
          return view('admin.supplier.supplier_edit_image', compact('data'));
      }
 
     //supplier image update function
     public function supplierImageUpdate(Request $request, $id)
     {
         //validate the input item
         $validated = $request->validate(
             [
                 'supplier_img' => 'required|image|mimes:jpg,png,jpeg',
             ],
             //modified msg
             [
                 //supplier img msg
                 'supplier_img.required' => 'please choose an image',
                 'supplier_img.image' => 'image should be .png, .jpeg, .jpg',
             ]
         );
 
         //Getting the data form the form
         $supplier_img = $request->file('supplier_img');
 
         //Find the image
         $image = Supplier::find($id);
 
         if (!empty($image->supplier_img)) {
             //Unlink the image from the folder
             unlink($image->supplier_img);
         }
 
         // //unique ID generate
         $img_name_gen = hexdec(uniqid());
 
         // //Original ext
         $img_ext      = strtolower($supplier_img->getClientOriginalExtension());
 
         // //img new create
         $img_name =  $img_name_gen . '.' . $img_ext;
 
         // //where I'll keep the image --path
         $upload_to    = 'backend/assets/img/supplier/';
 
         // //Moving the image to a folder path 
         $supplier_img->move($upload_to, $img_name);
 
         $supplier_img =   $upload_to . $img_name;
 
         $dataUpdated = DB::table('suppliers')
             ->where('id', $id)
             ->update(
                 [
                     'supplier_img' => $supplier_img,
 
                 ]
             );
 
         if ($dataUpdated) {
             $notification = [
                 'message' => 'Image Updated Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('supplier.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong!!',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('supplier.show')->with($notification);
         }
     }

    //supplier delete function
    public function supplierDelete($id)
    {
        //find the image
        $image = Supplier::find($id);

        if ($image->supplier_img == null) {
            //delete the row from thr table
            $deleted = DB::table('suppliers')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Supplier Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('supplier.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('supplier.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->supplier_img);
            //delete the row from thr table
            $deleted = DB::table('suppliers')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Supplier Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('supplier.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('supplier.show')->with($notification);
            };
        }
    }
}
