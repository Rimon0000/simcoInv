@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('coupon.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Coupon</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('coupon.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Offer Name</label>
                            <input type="text" class="form-control" name="offer_name" id="validationServer01" value="{{$data->offer_name}}" placeholder="Offer Name" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Title</label>
                            <select class="form-control js-example-basic-single" name="product_id">

                                <option value="">Select Product Title</option>
                                @foreach($productLists as $productList)
                                <option value="{{$productList->product_id }}"  {{ ($data->product_id == $productList->product_id) ? 'Selected' : ''}}>{{ $productList->title }}</option>
                                @endforeach
                               
                            </select>
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Code</label>
                            <input type="text" class="form-control" name="coupon_code" id="validationServer01" value="{{$data->coupon_code}}" placeholder="Coupon Code" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Type</label>
                            <select class="form-control" name="coupon_type" value="{{$data->coupon_type}}">
                                <span class="text-danger" value="">Coupon Type</span>
                                <option value="percent" selected>Coupon Percent</option>
                                <option value="cash">Coupon Cash</option>

                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Limit</label>
                            <input type="number" class="form-control" name="coupon_limit" min="1" value="1"   value="{{$data->coupon_limit}}" placeholder="Coupon Limit" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Amount</label>
                            <input type="number" class="form-control" name="coupon_amount" min="1" value="10"  value="{{$data->coupon_amount}}" placeholder="Coupon Amoun" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Cart Min Value</label>
                            <input type="number" class="form-control" name="cart_min_value" min="1" value="{{$data->cart_min_value}}" placeholder="Cart Min Value" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Expired Date</label>
                            <input type="date" class="form-control" name="expired_date" id="validationServer01" value="{{$data->expired_date}}" placeholder="Coupon Expired Date" required>
                        </div>
                    </div>
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
        // summernote
        $('.summernote').summernote({
            height: "250",
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>