@extends("admin.master_admin")

@section("content")

<div class="row p-3">
    <div class="col-lg-6">

        <a href="{{ route('employee.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back </a>


    </div>
</div>


<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Edit Employee </h2>
            </div>
            <div class="card-body">
                <!-- 
                 Display msg -
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif


                @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif

                Display msg end  -->


                <form method="POST" action="{{ route('employee.update', ['id' => $data->id] ) }}">
                    @csrf


                    <!-- Employee id and name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Employee ID</label>
                            <input type="text" name="emp_id" class="form-control" id="validationServer01" value="{{ $data->emp_id }}" placeholder="Employee ID" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Employee Name</label>
                            <input type="text" name="emp_name" class="form-control" id="validationServer01" value="{{ $data->emp_name }}" placeholder="Employee Name" required>
                        </div>
                    </div>
                    <!-- Employee id and name end -->

                    <!-- Employee Designation, Department start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Designation</label>
                            <select class="form-control js-example-basic-single" name="designation">
                                <option value="0">Select Designation</option>
                                @foreach($designations as $designation)
                                <option value="{{$designation->id}}" {{ ($data->designation == $designation->id) ? 'Selected' : ''}} >{{ $designation->designation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Department</label>
                            <select class="form-control js-example-basic-single" name="department">
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" {{ ($data->department == $department->id) ? 'Selected' : ''}}>{{ $department->department }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Employee Designation, Department end -->

                    <!-- Employee Joint Date, Salary start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Joint Date</label>
                            <input type="date" name="joint_date" class="form-control" value="{{ $data->joint_date }}" id="validationServer01" placeholder="Joint Date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Salary</label>
                            <input type="number" name="salary" class="form-control" value="{{ $data->salary }}" id="validationServer01" placeholder="Salary" required>
                        </div>
                    </div>
                    <!-- Employee Joint Date, Salary end -->
                    <hr>
                    <!-- Employee Father and Mother Name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Father's Name</label>
                            <input type="text" name="father_name" class="form-control" value="{{ $data->father_name }}" id="validationServer01" placeholder="Father's Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Mother's Name</label>
                            <input type="text" name="mother_name" class="form-control" value="{{ $data->mother_name }}" id="validationServer01" placeholder="Mother's Name" required>
                        </div>
                    </div>
                    <!-- Employee Father and Mother Name end -->

                    <!-- Employee Gender start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Gender</label>
                            <select class="form-control js-example-basic-single" name="gender" value="{{ $data->gender }}">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ ($data->gender == "Male") ? 'Selected' : ''}} >Male</option>
                                <option value="Female" {{ ($data->gender == "Female") ? 'Selected' : ''}} >Female</option>
                                <option value="Other" {{ ($data->gender == "Other") ? 'Selected' : ''}} >Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">DOB</label>
                            <input type="date" name="DOB" class="form-control" value="{{ $data->DOB }}" id="validationServer01" placeholder="DOB" required>
                        </div>
                    </div>
                    <!-- Employee Gender end -->


                    <!-- Employee Contact, email start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Contact</label>
                            <input type="text" name="contact" class="form-control" value="{{ $data->contact }}" id="validationServer01" placeholder="Contact" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $data->email }}" id="validationServer01" placeholder="Email" required>
                        </div>
                    </div>
                    <!-- Employee Contact, email end -->

                    <!-- Employee Marital, NID start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Marital</label>
                            <select class="form-control js-example-basic-single" name="marital" value="{{ $data->marital }}">
                                <option value="0">Select Marital</option>
                                <option value="Married" {{ ($data->marital == "Married") ? 'Selected' : ''}} >Married</option>
                                <option value="Unmarried" {{ ($data->marital == "Unmarried") ? 'Selected' : ''}} >Unmarried</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">NID</label>
                            <input type="text" name="nid" class="form-control" id="validationServer01" value="{{ $data->nid }}" placeholder="NID" required>
                        </div>
                    </div>
                    <!-- Employee Marital, NID end -->

                    <!-- Employee Per, Pre Address start -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Present Address</label>
                            <input type="text" name="present_address" class="form-control" value="{{ $data->present_address }}" id="validationServer01" placeholder="Present Address" required>
                            <div class="pt-1">
                                @error('present_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Permenent Address</label>
                            <input type="text" name="permanent_address" class="form-control" value="{{ $data->permanent_address }}" id="validationServer01" placeholder="Permenent Address" required>
                        </div>
                    </div>
                    <!-- Employee Per, Pre Address end -->

                    <!-- Employee start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Salary Type</label>

                            <select class="form-control js-example-basic-single" name="salary_type" value="{{ $data->salary_type }}">
                                <option value="0">Select Salary Type</option>
                                <option value="Monthly" {{ ($data->salary_type == "Monthly") ? 'Selected' : ''}} >Monthly</option>
                                <option value="Daily" {{ ($data->salary_type == "Daily") ? 'Selected' : ''}} >Daily</option>
                                <option value="Hourly" {{ ($data->salary_type == "Hourly") ? 'Selected' : ''}} >Hourly</option>
                                <option value="Project-Based" {{ ($data->salary_type == "Project-Based") ? 'Selected' : ''}} >Project-Based</option>
                                <option value="Intership" {{ ($data->salary_type == "Intership") ? 'Selected' : ''}} >Intership</option>
                                <option value="Intership (Paid)" {{ ($data->salary_type == "Intership (Paid)") ? 'Selected' : ''}}>Intership (Paid)</option>
                                <option value="Others" {{ ($data->salary_type == "Others") ? 'Selected' : ''}} >Others</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Status</label>
                            <select class="form-control js-example-basic-single" name="status" value="{{ $data->status }}">
                                <option value="">Select Status</option>
                                <option value="1" {{ ($data->status == "1") ? 'Selected' : ''}} >Yes</option>
                                <option value="0" {{ ($data->status == "0") ? 'Selected' : ''}} >No</option>
                            </select>
                        </div>
                    </div>
                    <!-- Employee end -->

                    <hr>
                    <button class="btn btn-warning btn-sm" type="submit">Update</button>
            </div>

            </form>
        </div>
    </div>
</div>



@endsection