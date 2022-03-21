<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //Contact show function
    public function contactShow()
    {
        $data = Contact::orderByDesc('id')->get();

        return view('admin.contact.contact_show', compact('data'));
    }


    //Sub category status function
    public function contactStatus($id)
    {

        $data = Contact::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('contacts')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('contact.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('contact.show')->with($notification);
        }
    }

     //Contact delete function
     public function contactDelete($id)
     {
         //delete the row from thr table
         $deleted = DB::table('contacts')->where('id', '=', $id)->delete();
 
         if ($deleted) {
             $notification = [
                 'message' => 'Contact Deleted Successfully',
                 'alert-type' => 'error'
             ];
             return redirect()->route('contact.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('contact.show')->with($notification);
         };
     }
}
