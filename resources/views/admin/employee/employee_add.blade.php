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

                <h2> <i class="fa-solid fa-circle-plus text-danger"></i> Add Employee</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('employee.add.page') }}" enctype="multipart/form-data">
                    @csrf


                    <!-- Employee id and name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Employee ID</label>
                            <input type="text" name="emp_id" class="form-control" id="validationServer01" placeholder="Employee ID" required>
                            <div class="pt-1">
                                @error('emp_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Employee Name</label>
                            <input type="text" name="emp_name" class="form-control" id="validationServer01" placeholder="Employee Name" required>
                            <div class="pt-1">
                                @error('emp_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
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
                                <option value="{{$designation->id}}" >{{ $designation->designation }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('designation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Department</label>
                            <select class="form-control js-example-basic-single" name="department">
                                <option value="">Select Department</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" >{{ $department->department }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('department')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Designation, Department end -->

                    <!-- Employee Joint Date, Salary start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Joint Date</label>
                            <input type="date" name="joint_date" class="form-control" id="validationServer01" placeholder="Joint Date" required>
                            <div class="pt-1">
                                @error('joint_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Salary</label>
                            <input type="number" name="salary" class="form-control" id="validationServer01" placeholder="Salary" required>
                            <div class="pt-1">
                                @error('salary')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Joint Date, Salary end -->
                    <hr>
                    <!-- Employee Father and Mother Name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Father's Name</label>
                            <input type="text" name="father_name" class="form-control" id="validationServer01" placeholder="Father's Name" required>
                            <div class="pt-1">
                                @error('father_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Mother's Name</label>
                            <input type="text" name="mother_name" class="form-control" id="validationServer01" placeholder="Mother's Name" required>
                            <div class="pt-1">
                                @error('mother_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Father and Mother Name end -->

                    <!-- Employee Gender start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Gender</label>
                            <select class="form-control js-example-basic-single" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>

                            <div class="pt-1">
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">DOB</label>
                            <input type="date" name="DOB" class="form-control" id="validationServer01" placeholder="DOB" required>
                            <div class="pt-1">
                                @error('DOB')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Gender end -->


                    <!-- Employee Contact, email start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Contact</label>
                            <input type="text" name="contact" class="form-control" id="validationServer01" placeholder="Contact" required>
                            <div class="pt-1">
                                @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Email</label>
                            <input type="email" name="email" class="form-control" id="validationServer01" placeholder="Email" required>
                            <div class="pt-1">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Contact, email end -->

                    <!-- Employee Marital, NID start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Marital</label>
                            <select class="form-control js-example-basic-single" name="marital">
                                <option value="">Select Marital</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                            </select>

                            <div class="pt-1">
                                @error('marital')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">NID</label>
                            <input type="text" name="nid" class="form-control" id="validationServer01" placeholder="NID">
                            <div class="pt-1">
                                @error('nid')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Marital, NID end -->

                    <!-- Employee Per, Pre Address start -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Present Address</label>
                            <input type="text" name="present_address" class="form-control" id="validationServer01" placeholder="Present Address" required>
                            <div class="pt-1">
                                @error('present_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Permenent Address</label>
                            <input type="text" name="permanent_address" class="form-control" id="validationServer01" placeholder="Permenent Address" required>
                            <div class="pt-1">
                                @error('permanent_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Per, Pre Address end -->

                    <!-- Employee start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Salary Type</label>
                            
                            <select class="form-control js-example-basic-single" name="salary_type" required>
                                <option value="">Select Salary Type</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Daily">Daily</option>
                                <option value="Hourly">Hourly</option>
                                <option value="Project-Based">Project-Based</option>
                                <option value="Intership">Intership</option>
                                <option value="Intership (Paid)">Intership (Paid)</option>
                                <option value="Others">Others</option>
                            </select>

                            <div class="pt-1">
                                @error('salary_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Status</label>
                            <select class="form-control js-example-basic-single" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>

                            <div class="pt-1">
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee end -->

                    <!-- Employee Image start -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Employee Image</label>
                            <input type="file" name="emp_img" class="form-control" id="validationServer02" accept="image/png , image/gif, image/jpeg" onchange="showPreview(event);">
                            <div class="pt-1">
                                @error('emp_img')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                    </div>
                    <!-- Employee Image end -->

                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";

        }
    }
</script>




@endsection