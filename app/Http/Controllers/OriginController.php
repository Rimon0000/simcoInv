<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OriginController extends Controller
{
    //
     //Origin show function
     public function originShow()
     {
         $data = Origin::orderByDesc('id')->get();
         return view('admin.product_origin.product_origin_show', compact('data'));
     }
 
     // Origin add page
     public function originAddPage()
     {

         return view('admin.product_origin.product_origin_add');
     }
 
     // Origin add function
     public function originAdd(Request $request)
     {
 
         // //validate the input items
         $validated = $request->validate(
             [
                 'origin' => 'required|unique:origins|max:50',
                 'short_name' => 'unique:origins|max:50',
             ],
 
             // modified msg
             [
                 'origin.required' => 'Input field can not be empty',
                 'origin.unique'   => 'Product Origin name alreay taken',
                 'origin.max'      => 'Product Origin name should not be more than 40 characters',
 
                 'short_name.unique'   => 'Origin Short name alreay taken',
                 'short_name.max'      => 'Origin Short name should not be more than 40 characters',
             ],
         );
 
         // // //getting data from add form
         $origin    = $request->origin;
         $short_name   = $request->short_name;
 
 
         $result = DB::table('origins')->insert([
             'origin' => $origin,
             'short_name' => $short_name,
             'created_by' => Auth::user()->id,
             'created_at' => Carbon::now(),
 
         ]);
         if ($result) {
             $notification = [
                 'message' => 'Product Origin Added Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('origin.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('origin.show')->with($notification);
         }
     }
 
     //Origin status function
     public function originStatus($id)
     {
 
         $data = Origin::find($id);
         $statusCheck = $data->status;
 
         //check status
         $statusCheck = ($statusCheck == '1') ? 0 : 1;
 
         $dataUpdated = DB::table('origins')
             ->where('id', $id)
             ->update(
                 ['status' => $statusCheck,]
             );
 
         if ($dataUpdated) {
             $notification = [
                 'message' => 'Status Updated Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('origin.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('origin.show')->with($notification);
         }
     }
 
     //Origin Edit function
     public function  originEdit($id)
     {
 
         $data = Origin::find($id);
         return view('admin.product_origin.product_origin_edit', compact('data'));
     }
 
     //Origin Update function
     public function originUpdate(Request $request, $id)
     {
 
         #code ...
          //validate the input items
          $validated = $request->validate(
             [
                 'origin' => 'required|unique:origins,id|max:50',
                 'short_name' => 'unique:origins,id|max:50',
             ],
 
             // modified msg
             [
                 'origin.required' => 'Input field can not be empty',
                 'origin.unique'   => 'Product Origin name alreay taken',
                 'origin.max'      => 'Product Origin name should not be more than 40 characters',
 
                 'short_name.unique'   => 'Origin Short name alreay taken',
                 'short_name.max'      => 'Origin Short name should not be more than 40 characters',
             ],
         );
         //getting data from add form
         $origin    = $request->origin;
         $short_name   = $request->short_name;
 
         $dataUpdated = DB::table('origins')
             ->where('id', $id)
             ->update(
                 [
                     'origin' => $origin,
                     'short_name' => $short_name,
                     'updated_by' => Auth::user()->id,
                     'updated_at' => Carbon::now(),
                 ]
             );
 
         if ($dataUpdated) {
             $notification = [
                 'message' => 'Product Origin Name Updated Successfully',
                 'alert-type' => 'success'
             ];
             return redirect()->route('origin.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('origin.show')->with($notification);
         }
     }
 
     // Origin delete function
     public function originDelete($id)
     {
         //delete the row from thr table
         $deleted = DB::table('origins')->where('id', '=', $id)->delete();
 
         if ($deleted) {
             $notification = [
                 'message' => 'Product Origin Deleted Successfully',
                 'alert-type' => 'error'
             ];
             return redirect()->route('origin.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('origin.show')->with($notification);
         };
     }
}
