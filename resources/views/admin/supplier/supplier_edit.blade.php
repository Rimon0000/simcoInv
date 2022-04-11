@extends("admin.master_admin")

@section("content")

<div class="row p-3">
    <div class="col-lg-6">

        <a href="{{ route('supplier.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back </a>


    </div>
</div>


<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Edit Supplier </h2>
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


                <form method="POST" action="{{ route('supplier.update', ['id' => $data->id] ) }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Supplier ID</label>
                            <input type="text" class="form-control" name="supplier_id" value="{{$data->supplier_id}}" id="validationServer01" placeholder="Supplier ID" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Supplier Name</label>
                            <input type="text" class="form-control" name="supplier_name" value="{{$data->supplier_name}}" id="validationServer01" placeholder="Supplier Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Owner Name</label>
                            <input type="text" class="form-control" name="owner_name" value="{{$data->owner_name}}" id="validationServer01" placeholder="Owner Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Present Address</label>
                            <input type="text" class="form-control" name="present_address" value="{{$data->present_address}}" id="validationServer01" placeholder="Present Address" required>
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
                            <label for="validationServer01">Contact</label>
                            <input type="text" class="form-control" name="contact" value="{{$data->contact}}" id="validationServer01" placeholder="Contact" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" value="{{$data->whatsapp}}" id="validationServer01" placeholder="Whatsapp" required>
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