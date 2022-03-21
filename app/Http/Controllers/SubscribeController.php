<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribeController extends Controller
{
    //
    //Contact show function
    public function subscribeShow()
    {
        $data = Subscribe::orderByDesc('id')->get();

        return view('admin.subscribe.subscribe_show', compact('data'));
    }


    //Sub category status function
    public function subscribeStatus($id)
    {

        $data = Subscribe::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('subscribes')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('subscribe.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('subscribe.show')->with($notification);
        }
    }

     //Contact delete function
     public function subscribeDelete($id)
     {
         //delete the row from thr table
         $deleted = DB::table('subscribes')->where('id', '=', $id)->delete();
 
         if ($deleted) {
             $notification = [
                 'message' => 'Subscriber Deleted Successfully',
                 'alert-type' => 'error'
             ];
             return redirect()->route('subscribe.show')->with($notification);
         } else {
             $notification = [
                 'message' => 'Something Went Wrong',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('subscribe.show')->with($notification);
         };
     }
}
