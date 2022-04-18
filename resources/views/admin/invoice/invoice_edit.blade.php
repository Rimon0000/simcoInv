@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Invoice Order</h2>
            </div>




            
            <div class="card-body">

                <form method="POST" action="{{route('invoice.order.update', ['id'=> $data->id])}}">
                    @csrf
                    <!-- Purchase Date, Purchase No., supplier_name Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Invoice Date</label>
                            <input type="date" class="form-control" value="{{$data->invoice_date }}" name="invoice_date">
                            <div class="pt-1">
                                @error('invoice_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Invoice No.</label>
                            <input type="text" class="form-control" value="{{$data->invoice_no }}" name="invoice_no" placeholder="Invoice No.">
                            <div class="pt-1">
                                @error('invoice_no')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Customer Name</label>
                            <select class="form-control js-example-basic-single" name="customer_id" required>
                                <span class="text-danger"> Select Customer </span>
                                <option value="">Select Customer</option>
                               
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ ($data->customer_id == $customer->id) ? "Selected" : "" }}>{{ $customer->customer_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('customer_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Description</label>
                            <input type="text" class="form-control" value="{{ $data->description }}" name="description" placeholder="Description">
                            <div class="pt-1">
                                @error('description')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable();
    });
</script>
@endsection