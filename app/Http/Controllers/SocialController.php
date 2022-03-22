<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    //
    //Social show function
    public function socialShow()
    {
        $data = Social::orderByDesc('id')->get();

        return view('admin.social.social_show', compact('data'));
    }

    //Social Add page Function
    public function socialAddPage()
    {
        return view('admin.social.social_add');
    }

    //social edit image function
    public function socialEditImage($id)
    {

        //fetching data from social table
        $data = social::find($id);

        return view('admin.social.social_edit_image', compact('data'));
    }

    //Social add function
    public function socialAdd(Request $request)
    {
        //validate the input items
        $validated = $request->validate(
            [
                'social_name' => 'required|unique:socials|max:100',
                'social_link' => 'required|unique:socials|max:400',
                'social_img' => 'image|mimes:jpg,png,jpeg',
            ],

            // modified msg
            [
                //Social name msg
                'social_name.required' => 'Social name Cannnot be empty',
                'social_name.unique'   => 'Social name alreay taken',
                'social_name.max'      => 'Social name should not be more than 50 characters',

                //Social Link msg
                'social_link.required' => 'Social Link Cannnot be empty',
                'social_link.unique'   => 'Social Link alreay taken',
                'social_link.max'      => 'Social Link should not be more than 400 characters',

                //Social img msg
                'social_img.image'      => 'Image should be .png, .jpg, .jpeg',
            ],
        );

        // //getting data from Social add form
        $social_name = $request->social_name;
        $social_link = $request->social_link;
        $social_img = $request->file('social_img');

        if ($social_img == null) {
            // check if the user had choosen the image or not
            $social_img = ($social_img == null) ? null : $social_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($social_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/social/';

            // //Moving the image to a folder path 
            $social_img->move($upload_to, $img_name);
            $social_img =   $upload_to . $img_name;
        }

        $result = DB::table('socials')->insert([
            'social_name'   => $social_name,
            'social_link'   => $social_link,
            'social_img'    => $social_img,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        if ($result) {
            $notification = [
                'message' => 'Social Details Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('social.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('social.show')->with($notification);
        }
    }

    //Social status function
    public function categoryStatus($id)
    {

        $data = Social::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('categories')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('category.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('category.show')->with($notification);
        }
    }

    //Social Edit function
    public function  socialEdit($id)
    {

        $data = Social::find($id);
        return view('admin.social.social_edit', compact('data'));
    }

    //Social Update Function
    public function socialUpdate(Request $request, $id)
    {

        #code ...
        $social_name = $request->social_name;
        $social_link = $request->social_link;

        //validate the input items
        $validated = $request->validate(
            [
                'social_name' => 'required|unique:socials|max:100',
                'social_link' => 'required|unique:socials|max:400',
            ],

            // modified msg
            [
                //Social name msg
                'social_name.required' => 'Social name Cannnot be empty',
                'social_name.unique'   => 'Social name alreay taken',
                'social_name.max'      => 'Social name should not be more than 50 characters',

                //Social Link msg
                'social_link.required' => 'Social Link Cannnot be empty',
                'social_link.unique'   => 'Social Link alreay taken',
                'social_link.max'      => 'Social Link should not be more than 400 characters',
            ],
        );


        $dataUpdated = DB::table('socials')
            ->where('id', $id)
            ->update(
                [
                    'social_name' => $social_name,
                    'social_link' => $social_link,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Social Details Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('social.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('social.show')->with($notification);
        }
    }

    //Social image update function
    public function socialImageUpdate(Request $request, $id)
    {
        //validate the input item
        $validated = $request->validate(
            [
                'social_img' => 'required|image|mimes:jpg,png,jpeg',
            ],
            //modified msg
            [
                //social img msg
                'social_img.required' => 'please choose an image',
                'social_img.image' => 'image should be .png, .jpeg, .jpg',
            ]
        );

        //Getting the data form the form
        $social_img = $request->file('social_img');

        //Find the image
        $image = Social::find($id);

        if (!empty($image->social_img)) {
            //Unlink the image from the folder
            unlink($image->social_img);
        }

        // //unique ID generate
        $img_name_gen = hexdec(uniqid());

        // //Original ext
        $img_ext      = strtolower($social_img->getClientOriginalExtension());

        // //img new create
        $img_name =  $img_name_gen . '.' . $img_ext;

        // //where I'll keep the image --path
        $upload_to    = 'backend/assets/img/social/';

        // //Moving the image to a folder path 
        $social_img->move($upload_to, $img_name);

        $social_img =   $upload_to . $img_name;

        $dataUpdated = DB::table('socials')
            ->where('id', $id)
            ->update(
                [
                    'social_img'    => $social_img,

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('social.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong!!',
                'alert-type' => 'warning'
            ];
            return redirect()->route('social.show')->with($notification);
        }
    }

    //social delete function
    public function socialDelete($id)
    {
        //find the image
        $image = Social::find($id);

        if ($image->social_img == null) {
            //delete the row from thr table
            $deleted = DB::table('socials')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Social Details Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('social.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('social.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->social_img);
            //delete the row from thr table
            $deleted = DB::table('socials')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Socials Details Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('social.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('social.show')->with($notification);
            };
        }
    }
}
