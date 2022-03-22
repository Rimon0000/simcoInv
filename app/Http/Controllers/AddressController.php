<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    //
    public function addressShow()
    {
        # code...
        $data = Address::first();
        return view('admin.site_info.address',compact('data'));
    }

     // Address add function
     public function addressAdd(Request $request)
     {
 
         // //validate the input items
         $validated = $request->validate(
             [
                 'address' => 'required|max:200',
                 'mobile'  => 'required|max:20',
                 'hotline' => 'max:20',
                 'email'   => 'required|max:200',
             ],
 
             // modified msg
             [
                 //Address msg
                 'address.required' => 'Address field can not be empty',
                 'address.max'      => 'Address should not be more than 200 characters',

                  //Mobile msg
                 'mobile.required' => 'Mobile field can not be empty',
                 'mobile.max'      => 'Mobile should not be more than 20 characters',

                  //Email msg
                 'email.required' => 'Email field can not be empty',
                 'hotline.max'    => 'Hot Line should not be more than 20 characters',
                 
             ],
         );
 
         // // //getting data from address add form
         $address  = $request->address;
         $mobile   = $request->mobile;
         $hotline  = $request->hotline;
         $email    = $request->email;
 
 
         $result = DB::table('addresses')->insert([
             'address' => $address,
             'mobile'  => $mobile,
             'hotline' => $hotline,
             'email'    => $email,
             'created_by' => Auth::user()->id,
             'created_at' => Carbon::now(),
 
         ]);
         if ($result) {
             $notification = [
                 'message' => 'Address Added Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('address.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('address.show')->with($notification);
         }
     }

      // Address Edit function
      public function addressEdit(Request $request, $id)
      {

          // //validate the input items
          $validated = $request->validate(
              [
                  'address' => 'required|max:200',
                  'mobile'  => 'required|max:20',
                  'hotline' => 'max:20',
                  'email'   => 'required|max:200',
              ],
  
              // modified msg
              [
                  //Address msg
                  'address.required' => 'Address field can not be empty',
                  'address.max'      => 'Address should not be more than 200 characters',
 
                   //Mobile msg
                  'mobile.required' => 'Mobile field can not be empty',
                  'mobile.max'      => 'Mobile should not be more than 20 characters',
 
                   //Email msg
                  'email.required' => 'Email field can not be empty',
                  'hotline.max'    => 'Hot Line should not be more than 20 characters',
                  
              ],
          );
  
        //   // // //getting data from address add form
          $address  = $request->address;
          $mobile   = $request->mobile;
          $hotline  = $request->hotline;
          $email    = $request->email;

        
  
  
          $dataUpdated = DB::table('addresses')
            ->where('id', $id)
            ->update(
                [
                    'address' =>  $address,
                    'mobile' =>  $mobile ,
                    'hotline' =>  $hotline,
                    'email' =>  $email,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );
          if ($dataUpdated) {
              $notification = [
                  'message' => 'Address Updated Successfully',
                  'alert-type' => 'success'
              ];
              return redirect()->route('address.show')->with($notification);
          } else {
              $notification = [
                  'message' => 'Something Went Wrong',
                  'alert-type' => 'warning'
              ];
              return redirect()->route('address.show')->with($notification);
          }
      }

}
