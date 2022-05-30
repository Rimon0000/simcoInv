<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    //
    //employee show function
    public function employeeShow()
    {
        $data = Employee::orderByDesc('id')->get();

        return view('admin.employee.employee_show', compact('data'));
    }

    public function employeeAdd()
    {
        # code...
        $designations = Designation::all();
        $departments  = Department::all();
        return view('admin.employee.employee_add', compact('designations', 'departments'));
    }

    //employee Add Page function
    public function employeeStore(Request $request)
    {

         //validate the input items
        // $validated = $request->validate(
        //     [
        //         'display_section' => 'required|unique:display_sections|max:50',
        //     ],

        //     // modified msg
        //     [
        //         'display_section.required' => 'Input field can not be empty',
        //         'display_section.unique'   => 'Varity Section name alreay taken',
        //         'display_section.max'      => 'Varity Section name should not be more than 40 characters',
        //     ],
        // );

        // // //getting data from add form
        $emp_id            = $request->emp_id;
        $emp_name          = $request->emp_name;
        $nid               = $request->nid;
        $designation       = $request->designation;
        $department        = $request->department;
        $joint_date        = $request->joint_date;
        $salary            = $request->salary;
        $salary_type       = $request->salary_type;
        $father_name       = $request->father_name;
        $mother_name       = $request->mother_name;
        $gender            = $request->gender;
        $DOB               = $request->DOB;
        $marital           = $request->marital;
        $present_address   = $request->present_address;
        $permanent_address = $request->permanent_address;
        $contact           = $request->contact;
        $email             = $request->email;
        $status            = $request->status;
        $emp_img           = $request->file('emp_img');

        if ($emp_img == null) {
            // check if the user had choosen the image or not
            $emp_img = ($emp_img == null) ? null : $emp_img;
        } else {
            // //unique ID generate
            $img_name_gen = hexdec(uniqid());
            // //Original ext
            $img_ext      = strtolower($emp_img->getClientOriginalExtension());
            // //img new create
            $img_name =  $img_name_gen . '.' . $img_ext;
            // //where I'll keep the image --path
            $upload_to    = 'backend/assets/img/employee/';

            // //Moving the image to a folder path 
            $emp_img->move($upload_to, $img_name);
            $emp_img =   $upload_to . $img_name;
        }


        $result = DB::table('employees')->insert([
            'emp_id'            => $emp_id,
            'emp_name'          => $emp_name,
            'nid'               => $nid,
            'designation'       => $designation,
            'department'        => $department,
            'joint_date'        => $joint_date,
            'salary'            => $salary,
            'salary_type'       => $salary_type,
            'father_name'       => $father_name,
            'mother_name'       => $mother_name,
            'gender'            => $gender,
            'DOB'               => $DOB,
            'marital'           => $marital,
            'present_address'   => $present_address,
            'permanent_address' => $permanent_address,
            'contact'           => $contact,
            'email'             => $email,
            'status'            => $status,
            'emp_img'           => $emp_img,
            'created_by'        => Auth::user()->id,
            'created_at'        => Carbon::now(),

        ]);
        if ($result) {
            $notification = [
                'message' => 'Employee Section Added Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('employee.show')->with($notification);
        } else {
            $notification = [
                'message' => 'Something Went Wrong',
                'alert-type' => 'warning'
            ];
            return redirect()->route('employee.show')->with($notification);
        }
    }
}
