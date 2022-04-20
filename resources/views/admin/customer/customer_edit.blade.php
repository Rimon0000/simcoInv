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
                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Edit Customer </h2>
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
                <form method="POST" action="{{ route('customer.update', ['id' => $data->id] ) }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Customer ID</label>
                            <input type="text" class="form-control" name="customer_id" value="{{$data->customer_id}}" id="validationServer01" placeholder="Customer ID" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" value="{{$data->customer_name}}" id="validationServer01" placeholder="Customer Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Credit Limit</label>
                            <input type="text" class="form-control" name="credit_limit" value="{{$data->credit_limit}}" id="validationServer01" placeholder="Credit Limit" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Previous Due</label>
                            <input type="text" class="form-control" name="previous_due" value="{{$data->previous_due}}" id="validationServer01" placeholder="Previous Due" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}" id="validationServer01" placeholder="Mobile" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Office Phone</label>
                            <input type="text" class="form-control" name="office_phone" value="{{$data->office_phone}}" id="validationServer01" placeholder="Office Phone" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$data->email}}" id="validationServer01" placeholder="Email" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Website</label>
                            <input type="text" class="form-control" name="website" value="{{$data->website}}" id="validationServer01" placeholder="Website" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Customer Type</label>
                            <select class="form-control js-example-basic-single" name="customer_type" value="{{ $data->customer_type }}">
                                <option value="">Select Customer Type</option>

                                @foreach($customertypes as $customertype)
                                <option value="{{ $customertype->id }}" {{ ($data->customer_type == $customertype->id) ? "Selected":"" }}>{{ $customertype->customer_type }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Area</label>
                            <select class="form-control js-example-basic-single" name="area" value="{{ $data->area }}">
                                <option value="">Select Area</option>

                                @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ ($data->area == $area->id) ? "Selected":"" }}>{{ $area->area }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Present Office Address</label>
                            <input type="text" class="form-control" name="present_address" value="{{$data->present_address}}" id="validationServer01" placeholder="Present Office Address" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Status</label>
                            <select class="form-control js-example-basic-single" name="status" value="{{ $data->status }}">
                                <option value="">Select Status</option>
                                <option value="1" {{ ($data->status == "1") ? 'Selected' : ''}}>Yes</option>
                                <option value="0" {{ ($data->status == "0") ? 'Selected' : ''}}>No</option>
                            </select>
                        </div>

                        <hr>
                        <button class="btn btn-warning btn-sm" type="submit">Update</button>


                </form>


            </div>
        </div>
    </div>
</div>



@endsection