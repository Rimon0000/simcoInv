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


                <form method="POST" action="{{route('campaign.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Offer Name</label>
                            <input type="text" class="form-control" name="cat_name" id="validationServer01" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_id">
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->id }}">{{ $productlist->product_id }}</option>
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
                            <input type="text" class="form-control" name="cat_name" id="validationServer01" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Type</label>
                            <select class="form-control" name="product_id">
                                <span class="text-danger" value="">Coupon Type</span>
                                <option value="percent" selected>Coupon Percent</option>
                                <option value="cash">Coupon Cash</option>

                            </select>

                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Limit</label>
                            <input type="number" class="form-control" name="cat_name" min="1" value="1" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Amount</label>
                            <input type="number" class="form-control" name="cat_name" min="1" value="10" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Cart Min Value</label>
                            <input type="number" class="form-control" name="cat_name" min="1" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Coupon Expired Date</label>
                            <input type="date" class="form-control" name="cat_name" id="validationServer01" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
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