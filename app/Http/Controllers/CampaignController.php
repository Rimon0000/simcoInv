<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    //campaign show function
    public function campaignShow()
    {
        $data = Campaign::orderByDesc('id')->get();

        return view('admin.campaign.campaign_show', compact('data'));
    }

    //campaign Add Page function
    public function campaignAddPage()
    {
        return view('admin.campaign.campaign_add');
    }

    //Campaign add function
    public function campaignAdd(Request $request)
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
        $title      = $request->title;
        $start_date = $request->start_date;
        $end_date   = $request->end_date;
        $discount   = $request->discount;
        $month      = $request->month;
        $year       = $request->year;
        $camp_img   = $request->file('camp_img');
        $camp_alt   = $request->camp_alt;

        if ($camp_img == null) {
            // check if the user had choosen the image or not
            $camp_img = ($camp_img == null) ? null : $camp_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($camp_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/campaign/';

            // //Moving the image to a folder path 
            $camp_img->move($upload_to, $img_name);
            $camp_img =   $upload_to . $img_name;
        }

        $result = DB::table('campaigns')->insert([
            'title'      => $title,
            'start_date' => $start_date,
            'end_date'   => $end_date,
            'discount'   => $discount,
            'month'      => $month,
            'year'       => $year,
            'camp_img'   => $camp_img,
            'camp_alt'   => $camp_alt,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),


        ]);
        if ($result) {
            $notification = [
                'message' => 'Campaign Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('campaign.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('campaign.show')->with($notification);
        }
    }

    //campaign status function
    public function campaignStatus($id)
    {

        $data = Campaign::find($id);
        $statusCheck = $data->status;

        //check status
        $statusCheck = ($statusCheck == '1') ? 0 : 1;

        $dataUpdated = DB::table('campaigns')
            ->where('id', $id)
            ->update(
                ['status' => $statusCheck,]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Status Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('campaign.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('campaign.show')->with($notification);
        }
    }

    //campaign Edit function
    public function  campaignEdit($id)
    {

        $data = Campaign::find($id);
        return view('admin.campaign.campaign_edit', compact('data'));
    }

    //campaign Update function
    public function campaignUpdate(Request $request, $id)
    {

        #code ...
        $title      = $request->title;
        $start_date = $request->start_date;
        $end_date   = $request->end_date;
        $discount   = $request->discount;
        $month      = $request->month;
        $year       = $request->year;
        $camp_img   = $request->file('camp_img');
        $camp_alt   = $request->camp_alt;

        $dataUpdated = DB::table('campaigns')
            ->where('id', $id)
            ->update(
                [
                    'title'      => $title,
                    'start_date' => $start_date,
                    'end_date'   => $end_date,
                    'discount'   => $discount,
                    'month'      => $month,
                    'year'       => $year,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),

                ]
            );

        if ($dataUpdated) {
            $notification = [
                'message' => 'Campaign Name Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('campaign.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('campaign.show')->with($notification);
        }
    }

    //campaign edit image function
    public function campaignEditImage($id)
    {

        //fetching data from table
        $data = Campaign::find($id);

        return view('admin.campaign.campaign_edit_image', compact('data'));
    }

   //campaign image update function
   public function campaignImageUpdate(Request $request, $id)
   {
    //    //validate the input item
    //    $validated = $request->validate(
    //        [
    //            'camp_img' => 'required|image|mimes:jpg,png,jpeg',
    //        ],
    //        //modified msg
    //        [
    //            //camp img msg
    //            'camp_img.required' => 'please choose an image',
    //            'camp_img.image' => 'image should be .png, .jpeg, .jpg',
    //        ]
    //    );

       //Getting the data form the form
       $camp_img = $request->file('camp_img');
       $camp_alt = $request->camp_alt;

       //Find the image
       $image = Campaign::find($id);

       if (!empty($image->camp_img)) {
           //Unlink the image from the folder
           unlink($image->camp_img);
       }

       // //unique ID generate
       $img_name_gen = hexdec(uniqid());

       // //Original ext
       $img_ext      = strtolower($camp_img->getClientOriginalExtension());

       // //img new create
       $img_name =  $img_name_gen . '.' . $img_ext;

       // //where I'll keep the image --path
       $upload_to    = 'backend/assets/img/campaign/';

       // //Moving the image to a folder path 
       $camp_img->move($upload_to, $img_name);

       $camp_img =   $upload_to . $img_name;

       $dataUpdated = DB::table('campaigns')
           ->where('id', $id)
           ->update(
               [
                   'camp_img' => $camp_img,
                   'camp_alt' => $camp_alt,

               ]
           );

       if ($dataUpdated) {
           $notification = [
               'message' => 'Image Updated Successfully',
               'alert-type' => 'success'
           ];
           return redirect()->route('campaign.show')->with($notification);
       } else {
           $notification = [
               'message' => 'Something Went Wrong!!',
               'alert-type' => 'warning'
           ];
           return redirect()->route('campaign.show')->with($notification);
       }
   }

    //campaign delete function
    public function campaignDelete($id)
    {
        //find the image
        $image = Campaign::find($id);

        if ($image->camp_img == null) {
            //delete the row from thr table
            $deleted = DB::table('campaigns')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Campaign Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('campaign.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('campaign.show')->with($notification);
            };
        } else {

            //Unlink the image from the folder 
            unlink($image->camp_img);
            //delete the row from thr table
            $deleted = DB::table('campaigns')->where('id', '=', $id)->delete();

            if ($deleted) {
                $notification = [
                    'message' => 'Campaign Deleted Successfully',
                    'alert-type' => 'error'
                ];
                return redirect()->route('campaign.show')->with($notification);
            } else {
                $notification = [
                    'message' => 'Something Went Wrong',
                    'alert-type' => 'warning'
                ];
                return redirect()->route('campaign.show')->with($notification);
            };
        }
    }
}
