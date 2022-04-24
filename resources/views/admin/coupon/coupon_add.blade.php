@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('coupon.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Coupon</h2>
            </div>
            <div class="card-body">


                <form method="POST" action="{{route('coupon.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Offer Name</label>
                            <input type="text" class="form-control" name="offer_name" id="validationServer01" placeholder="Offer Name" required>
                            <div class="pt-1">
                                @error('offer_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Title</label>
                            <select class="form-control js-example-basic-single" name="product_id">
                                <option value="">Select Product Title</option>
                                @foreach($productLists as $productList)
                                <option value="{{$productList->product_id }}">{{ $productList->title }}</option>
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
                            <input type="text" class="form-control" name="coupon_code" value="{{ 'C-'.strtoupper(uniqid()) }}" id="validationServer01" placeholder="Coupon Code" required>
                            <div class="pt-1">
                                @error('coupon_code')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Type</label>
                            <select class="form-control" name="coupon_type">
                                <span class="text-danger" value="">Coupon Type</span>
                                <option value="percent" selected>Coupon Percent</option>
                                <option value="cash">Coupon Cash</option>

                            </select>

                            <div class="pt-1">
                                @error('coupon_type')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Limit</label>
                            <input type="number" class="form-control" name="coupon_limit" min="1" value="1" placeholder="Coupon Limit" required>
                            <div class="pt-1">
                                @error('coupon_limit')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Amount</label>
                            <input type="number" class="form-control" name="coupon_amount" min="1" value="10" placeholder="Coupon Amoun" required>
                            <div class="pt-1">
                                @error('coupon_amount')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Cart Min Value</label>
                            <input type="number" class="form-control" name="cart_min_value" min="1" value="100" placeholder="Cart Min Value" required>
                            <div class="pt-1">
                                @error('cart_min_value')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Expired Date</label>
                            <input type="date" class="form-control" name="expired_date" id="validationServer01" placeholder="Coupon Expired Date" required>
                            <div class="pt-1">
                                @error('expired_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

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

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>
@endsection