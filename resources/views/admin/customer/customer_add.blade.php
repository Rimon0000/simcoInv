@extends("admin.master_admin")

@section("content")

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('customer.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back </a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2> <i class="fa-solid fa-circle-plus text-danger"></i> Add Customer</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('customer.add') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Customer id and name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Customer ID</label>
                            <input type="text" name="customer_id" class="form-control" value="{{ 'CNO_'.uniqid() . mt_rand(100,999) }}" id="validationServer01" placeholder="Customer ID" required>
                            <div class="pt-1">
                                @error('customer_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Customer Name</label>
                            <input type="text" name="customer_name" class="form-control" id="validationServer01" placeholder="Customer Name" required>
                            <div class="pt-1">
                                @error('customer_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Customer id and name end -->

                    <!-- Employee Joint Date, Salary start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Credit Limit</label>
                            <input type="number" min="0" value="0" name="credit_limit" class="form-control" id="validationServer01" placeholder="Credit Limit">
                            <div class="pt-1">
                                @error('credit_limit')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Previous Due</label>
                            <input type="number" min="0" value="0" name="previous_due" class="form-control" id="validationServer01" placeholder="Previous Due">
                            <div class="pt-1">
                                @error('previous_due')
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
                            <label for="validationServer01">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="validationServer01" placeholder="Mobile" required>
                            <div class="pt-1">
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Office Phone</label>
                            <input type="text" name="office_phone" class="form-control" id="validationServer01" placeholder="Office Phone">
                            <div class="pt-1">
                                @error('office_phone')
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
                            <input type="email" name="email" class="form-control" id="validationServer01" placeholder="Email">
                            <div class="pt-1">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Website</label>
                            <input type="text" name="website" class="form-control" id="validationServer01" placeholder="Website">
                            <div class="pt-1">
                                @error('website')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Contact, email end -->

                    <!-- Employee Per, Pre Address start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Customer Type</label>
                            <select class="form-control" name="customer_type">
                                <option value="">Select Customer Type</option>

                                @foreach($customertypes as $customertype)
                                <option value="{{ $customertype->id }}">{{ $customertype->customer_type }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('customer_type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Area</label>
                            <select class="form-control" name="area">
                                <option value="">Select Area</option>

                                @foreach($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('area')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Per, Pre Address end -->

                    <!-- Employee Per, Pre Address start -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Present Office Address</label>
                            <input type="text" name="present_address" class="form-control" id="validationServer01" placeholder="Present Office Address" required>
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
                                <option value="1" selected>Yes</option>
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
                            <label for="validationServer02">Customer Image</label>
                            <input type="file" name="customer_img" class="form-control" id="validationServer02" accept="image/png , image/gif, image/jpeg" onchange="showPreview(event);">
                            <div class="pt-1">
                                @error('customer_img')
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