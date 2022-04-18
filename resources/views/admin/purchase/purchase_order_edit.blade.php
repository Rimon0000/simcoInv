@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('purchase.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Product Purchase Order</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('purchase.order.update', ['id'=> $purchaseOrder->id])}}">
                    @csrf
                    <!-- Purchase Date, Purchase No., supplier_name Section Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Purchase Date</label>
                            <input type="date" class="form-control" value="{{ $purchaseOrder->purchase_date }}" name="purchase_date">
                            <div class="pt-1">
                                @error('purchase_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Purchase No.</label>
                            <input type="text" class="form-control" value="{{ $purchaseOrder->purchase_no }}" name="purchase_no" placeholder="Purchase No." >
                            <div class="pt-1">
                                @error('purchase_no')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Supplier Name</label>
                            <select class="form-control js-example-basic-single" name="supplier_id" required>
                                <span class="text-danger"> Select Supplier </span>
                                <option value="">Select Units</option>
                                @foreach($supplier_names as $supplier_name)
                                <option value="{{ $supplier_name->id }}" {{ ($purchaseOrder->supplier_id == $supplier_name->id ) ? "selected" : "" }}>{{ $supplier_name->supplier_name }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('supplier_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-warning btn-sm" type="submit">Update</button>
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