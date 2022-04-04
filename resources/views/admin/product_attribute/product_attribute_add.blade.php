@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('product.attribute.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row m-4">
    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Product Attribute</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('product.attribute.add')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_id" required>
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($Productlists as $ProductList)
                                <option value="{{ $ProductList->id }}">{{ $ProductList->product_id }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock Qty</label>
                            <input type="text" class="form-control form-control-sm" name="quantity" id="validationServer01" placeholder="Stock Qty" required>
                            <div class="pt-1">
                                @error('quantity')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock Alert</label>
                            <input type="text" class="form-control form-control-sm" name="stock_alert" id="validationServer01" placeholder="Stock Alert" required>
                            <div class="pt-1">
                                @error('stock_alert')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Units</label>
                            <select class="form-control js-example-basic-single" name="unit_id" required>
                                <span class="text-danger"> Select Units </span>
                                <option value="">Select Units</option>

                                @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('unit_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->

                    <!-- Product Color, Size, Pieces, Weight Section Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Color</label>
                            <input type="text" class="form-control" name="color" id="validationServer01" value="NA" placeholder="Product Color">
                            <div class="pt-1">
                                @error('color')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Size</label>
                            <input type="text" class="form-control" name="size" id="validationServer01" value="NA" placeholder="Product Size">
                            <div class="pt-1">
                                @error('size')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Piece</label>
                            <input type="text" class="form-control" name="piece" id="validationServer01" value="0" placeholder="Product Piece">
                            <div class="pt-1">
                                @error('piece')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Weight</label>
                            <input type="text" class="form-control" name="weight" id="validationServer01" value="NA" placeholder="Product Weight">
                            <div class="pt-1">
                                @error('weight')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Color, Size, Pieces, Weight Section End -->

                    <!-- Product Price, Sale, Discount and % Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Price</label>
                            <input type="text" class="form-control" name="price" id="validationServer01" placeholder="Price" required>
                            <div class="pt-1">
                                @error('price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Sale Price</label>
                            <input type="text" class="form-control" name="sale_price" id="validationServer01" value="0" placeholder="Sale Price">
                            <div class="pt-1">
                                @error('sale_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount Price</label>
                            <input type="text" class="form-control" name="discount_price" id="validationServer01" value="0" placeholder="Discount Price">
                            <div class="pt-1">
                                @error('discount_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount %</label>
                            <input type="text" class="form-control" name="discount_percent" id="validationServer01" value="0" placeholder="Discount %">
                            <div class="pt-1">
                                @error('discount_percent')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Price, Sale, Discount and % End -->
                    <hr>
                    <!-- Product Attribute Image One Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer02">Product Attribute Image One</label>
                            <input type="file" class="form-control" name="product_img_1" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreviewImg1(event)">
                            <div class="pt-1">
                                @error('product_img_1')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt One</label>
                            <input type="text" class="form-control" name="product_img_alt_1" id="validationServer01" placeholder="Image Alt One" >
                            <div class="pt-1">
                                @error('product_img_alt_1')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                    </div>
                    <br>
                    <!-- Product List Image End -->
                    <!-- Product List Image Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer02">Product Attribute Image Two</label>
                            <input type="file" class="form-control" name="product_img_2" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreviewImg2(event)">
                            <div class="pt-1">
                                @error('product_img_2')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt Two</label>
                            <input type="text" class="form-control" name="product_img_alt_2" id="validationServer01" placeholder="Image Alt Two" >
                            <div class="pt-1">
                                @error('product_img_alt_2')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                        <img class="img img-thumbnail" id="file-ip-2-preview" width="150px" height="80px">
                    </div>
                    <!-- Product List Image End -->

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
    function showPreviewImg1(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";

        }
    }
</script>
<script>
    function showPreviewImg2(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-2-preview");
            preview.src = src;
            preview.style.display = "block";

        }
    }
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({ width: '100%' });
    });
</script>
@endsection