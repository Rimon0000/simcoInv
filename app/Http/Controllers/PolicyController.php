<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PolicyController extends Controller
{
    //
     // About Show Function
     public function aboutShow()
     {
         // Fetching Data from Categories table
         $data = About::first();
 
         return view('admin.site_info.about', compact('data'));
     }
 
 
     // About Add Function
     public function aboutAdd(Request $request)
     {
 
         // Validate the input items
         $validated = $request->validate(
             [
                 'about_us' => 'required',
             ],
             // modified msg
             [
                 // About Us name msg
                 'about_us.required' => 'Input field can not be empty.',
             ]
         );
 
         // Getting data from add form
         $about_us  = $request->about_us;
         $about_img = $request->file('about_img');
 
 
         if ($about_img == null) {
             // Check if the user had choosen the image or not or else assign default image
             $about_img = ($about_img == null) ? null : $about_img;
         } else {
             //uniqID generate
             $img_name_gen = hexdec(uniqid());
             // Original ext
             $img_ext      = strtolower($about_img->getClientOriginalExtension());
             // Image name create
             $img_name     = $img_name_gen . '.' . $img_ext;
             // where I'll keep the image -- Path
             $upload_to      = 'backend/assets/img/about/';
 
             // Moving the image to a folder path
             $about_img->move($upload_to, $img_name);
 
             $about_img  = $upload_to . $img_name;
         }
 
         // DB insert
         $result = DB::table('abouts')->insert([
             'about_us'   => $about_us,
             'about_img'  => $about_img,
             'created_by' => Auth::user()->id,
             'created_at' => Carbon::now(),
         ]);
 
         if ($result) {
             $notificaton = [
                 'message'    => 'About Us Added Successfully.',
                 'alert-type' => 'success'
             ];
             return redirect()->route('about.show')->with($notificaton);
         } else {
             $notificaton = [
                 'message'    => 'Something Went Wrong!!',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('about.show')->with($notificaton);
         }
     }
 
 
 
     // About Edit Function
     public function aboutEdit(Request $request, $id)
     {
 
         // Get the data from the form
         $about_us  = $request->about_us;
         $about_img = $request->file('about_img');
 
         // Validate the input items
         $validated = $request->validate(
             [
                 'about_us' => 'required',
             ],
             // modified msg
             [
                 // About Us name msg
                 'about_us.required' => 'Input field can not be empty.',
             ]
         );
 
         if (!empty($about_img)) {
             // Find the image
             $image = About::find($id);
 
             if (!empty($image->about_img)) {
                 // Unlink the images from the folder
                 unlink($image->about_img);
             }
 
             //uniqID generate
             $img_name_gen = hexdec(uniqid());
             // Original ext
             $img_ext      = strtolower($about_img->getClientOriginalExtension());
             // Image name create
             $img_name     = $img_name_gen . '.' . $img_ext;
             // where I'll keep the image -- Path
             $upload_to      = 'backend/assets/img/about/';
 
             // Moving the image to a folder path
             $about_img->move($upload_to, $img_name);
 
             $about_img  = $upload_to . $img_name;
 
             $dataUpdated = DB::table('abouts')
                 ->where('id', $id)
                 ->update(
                     [
                         'about_us'   => $about_us,
                         'about_img'    => $about_img,
                         'updated_by' => Auth::user()->id,
                         'updated_at' => Carbon::now(),
                     ]
                 );
         } else {
 
             $dataUpdated = DB::table('abouts')
                 ->where('id', $id)
                 ->update(
                     [
                         'about_us'   => $about_us,
                         'updated_by' => Auth::user()->id,
                         'updated_at' => Carbon::now(),
                     ]
                 );
         }
 
         if ($dataUpdated) {
             $notificaton = [
                 'message'    => 'About Updated Successfully.',
                 'alert-type' => 'success'
             ];
             return redirect()->route('about.show')->with($notificaton);
         } else {
             $notificaton = [
                 'message'    => 'Something Went Wrong!!',
                 'alert-type' => 'warning'
             ];
             return redirect()->route('about.show')->with($notificaton);
         }
     }
}
