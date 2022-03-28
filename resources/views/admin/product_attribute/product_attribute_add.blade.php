@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('product.list.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row m-4">
    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Product Attribute</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('product.list.add')}}" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="cat_id" required>
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                <option value="">Test</option>

                            </select>

                            <div class="pt-1">
                                @error('cat_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock Qty</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Stock Qty" required>
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock Alert</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Stock Alert" required>
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Units</label>
                            <select class="form-control js-example-basic-single" name="cat_id">
                                <span class="text-danger" value=""> Select Units </span>
                                <option value="">Select Units</option>

                                <option value="">Test</option>

                            </select>

                            <div class="pt-1">
                                @error('cat_id')
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
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Product Color" required>
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Size</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Product Size" required>
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Piece</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Product Piece">
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Weight</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Product Weight">
                            <div class="pt-1">
                                @error('product_id')
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
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Price">
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Sale Price</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Sale Price">
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount Price</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Discount Price">
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount %</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Discount %">
                            <div class="pt-1">
                                @error('product_id')
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
                            <input type="file" class="form-control" name="cat_img" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('cat_img')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt One</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Image Alt One" >
                            <div class="pt-1">
                                @error('product_id')
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
                            <input type="file" class="form-control" name="cat_img" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('cat_img')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt Two</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Image Alt Two" >
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                    </div>
                    <!-- Product List Image End -->

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