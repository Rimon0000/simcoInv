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
                <h2> <i class="fa-solid fa-circle-plus text-danger"></i> Add Supplier</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('supplier.add') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Supplier id and name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Supplier ID</label>
                            <input type="text" name="emp_id" class="form-control" id="validationServer01" placeholder="Employee ID" required>
                            <div class="pt-1">
                                @error('emp_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Supplier Name</label>
                            <input type="text" name="emp_name" class="form-control" id="validationServer01" placeholder="Employee Name" required>
                            <div class="pt-1">
                                @error('emp_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Supplier id and name end -->

                    <!-- Employee Joint Date, Salary start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Owner Name</label>
                            <input type="text" name="salary" class="form-control" id="validationServer01" placeholder="Salary" required>
                            <div class="pt-1">
                                @error('salary')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Previous Due</label>
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
                            <label for="validationServer01">Contact</label>
                            <input type="text" name="contact" class="form-control" id="validationServer01" placeholder="Contact" required>
                            <div class="pt-1">
                                @error('contact')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">WhatsApp</label>
                            <input type="text" name="father_name" class="form-control" id="validationServer01" placeholder="Father's Name" required>
                            <div class="pt-1">
                                @error('father_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Father and Mother Name end -->


                    <!-- Employee Contact, email start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Email</label>
                            <input type="email" name="email" class="form-control" id="validationServer01" placeholder="Email" required>
                            <div class="pt-1">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Website</label>
                            <input type="text" name="mother_name" class="form-control" id="validationServer01" placeholder="Mother's Name" required>
                            <div class="pt-1">
                                @error('mother_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Contact, email end -->

                    <!-- Employee Per, Pre Address start -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Present Office Address</label>
                            <input type="text" name="present_address" class="form-control" id="validationServer01" placeholder="Present Address" required>
                            <div class="pt-1">
                                @error('present_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Status</label>
                            <select class="form-control" name="status">
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
                    <!-- Employee Per, Pre Address end -->

                    <!-- Employee Image start -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Supplier Image</label>
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