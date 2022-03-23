<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    //
    //
    public function faqShow()
    {
        # code...
        $data = Faq::all();
        return view('admin.site_info.faq', compact('data'));
    }

    // Address add function
    public function faqAdd(Request $request)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'question' => 'required|unique:faqs|max:200',
                'answer'  => 'required',
            ],

            // modified msg
            [
                //Address msg
                'question.required' => 'question field can not be empty',
                'question.max'      => 'question should not be more than 200 characters',

                //answer msg
                'answer.required' => 'answer field can not be empty',

            ],
        );

        // // //getting data from Faq add form
        $question  = $request->question;
        $answer   = $request->answer;


        $result = DB::table('faqs')->insert([
            'question' => $question,
            'answer'  => $answer,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Faq Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('faq.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('faq.show')->with($notification);
        }
    }

    //Faq Edit function
    public function  faqEdit($id)
    {

        $data = Faq::find($id);
        return view('admin.site_info.faq_edit', compact('data'));
    }

    // Faq Update function
    public function faqUpdate(Request $request, $id)
    {

        // //validate the input items
        $validated = $request->validate(
            [
                'question' => ['required', 'max:200', Rule::unique('faqs')->ignore($id)],
                'answer'  => 'required',
            ],

            // modified msg
            [
                //Address msg
                'question.required' => 'question field can not be empty',
                'question.unique' => 'question already Taken.',
                'question.max'      => 'question should not be more than 200 characters',

                //answer msg
                'answer.required' => 'answer field can not be empty',

            ],
        );

        // //getting data from address add form
        $question = $request->question;
        $answer   = $request->answer;

        $dataUpdated = DB::table('faqs')
            ->where('id', $id)
            ->update(
                [
                    'question' =>  $question,
                    'answer' =>  $answer,
                    'updated_by' => Auth::user()->id,
                    'updated_at' => Carbon::now(),
                ]
            );
        if ($dataUpdated) {
            $notification = [
                'message' => 'Faq Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('faq.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('faq.show')->with($notification);
        }
    }

    //FAQ delete function
    public function faqDelete($id)
    {
        //delete the row from thr table
        $deleted = DB::table('faqs')->where('id', '=', $id)->delete();

        if ($deleted) {
            $notification = [
                'message' => 'Faq Deleted Successfully',
                'alert-type' => 'error'
            ];
            return redirect()->route('faq.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('faq.show')->with($notification);
        };
    }
}
