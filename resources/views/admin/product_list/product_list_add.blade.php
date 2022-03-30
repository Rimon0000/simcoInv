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
                <h2>Add Product List</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('product.list.add')}}" enctype="multipart/form-data">
                    @csrf
                    <!-- Product Code and Title Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <input type="text" class="form-control" name="product_id" id="validationServer01" placeholder="Product Code" required>
                            <div class="pt-1">
                                @error('product_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Product Title</label>
                            <input type="text" class="form-control" name="title" id="validationServer01" placeholder="Product Title" required>
                            <div class="pt-1">
                                @error('title')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Code and Title Start -->

                    <!-- Product Category, Sub Category, Sub Sub Categroy Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <select class="form-control js-example-basic-single" name="category" required>
                                <span class="text-danger" value=""> Select Category </span>
                                <option value="">Select Category</option>

                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('category')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Sub Category One</label>
                            <select class="form-control js-example-basic-single" name="sub_category">
                                <span class="text-danger" value=""> Select Sub Category One</span>
                                <option value="">Select Sub Category One</option>

                                @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->sub_cat_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('sub_category')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Sub Category Two</label>
                            <select class="form-control js-example-basic-single" name="sub_sub_category">
                                <span class="text-danger" value=""> Select Category Two</span>
                                <option value="">Select Category Two</option>

                                @foreach($subsubcategories as $subsubcategory)
                                <option value="{{ $subsubcategory->id }}">{{ $subsubcategory->sub_sub_cat_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('sub_sub_category')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->

                    <!-- Product Brand, Orgin, Varity Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Brand</label>
                            <select class="form-control js-example-basic-single" name="brand" required>
                                <span class="text-danger" value=""> Select Brand </span>
                                <option value="">Select Brand</option>

                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('brand')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Origin</label>
                            <select class="form-control js-example-basic-single" name="origin">
                                <span class="text-danger" value=""> Select Origin </span>
                                <option value="">Select Origin</option>

                                <option value="1">Test</option>

                            </select>

                            <div class="pt-1">
                                @error('origin')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Varity Section</label>
                            <select class="form-control js-example-basic-single" name="display_section">
                                <span class="text-danger" value=""> Select Varity Section </span>
                                <option value="NA">Select Varity Section</option>

                                @foreach($displaysections as $displaysection)
                                <option value="{{ $displaysection->id }}">{{ $displaysection->display_section }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('display_section')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Product Brand, Orgin, Varity Section End -->

                    <!-- Product Stock No., Stock Alert , Units, Bar Code Section Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock No.</label>
                            <input type="text" class="form-control form-control-sm" name="stock" id="validationServer01" placeholder="Stock No." required>
                            <div class="pt-1">
                                @error('stock')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock Alert</label>
                            <input type="text" class="form-control form-control-sm" name="alert_stock" id="validationServer01" placeholder="Stock Alert" required>
                            <div class="pt-1">
                                @error('alert_stock')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Units</label>
                            <select class="form-control js-example-basic-single" name="unit" required>
                                <span class="text-danger" value=""> Select Units </span>
                                <option value="">Select Units</option>

                                @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('unit')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Bar Code</label>
                            <select class="form-control js-example-basic-single" name="bar_code">
                                <span class="text-danger" value=""> Select Bar Code </span>
                                <option value="">Select Bar Code</option>

                                <option value="1">Test</option>

                            </select>

                            <div class="pt-1">
                                @error('bar_code')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Product Stock No., Stock Alert , Units, Bar Code Section End -->

                    <!-- Product Color, Size, Pieces, Weight Section Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Color (s)</label>
                            <input type="text" class="form-control" name="color" id="validationServer01" value="NA" placeholder="Product Color" required>
                            <div class="pt-1">
                                @error('color')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Size (s)</label>
                            <input type="text" class="form-control" name="size" id="validationServer01" value="NA" placeholder="Product Size" required>
                            <div class="pt-1">
                                @error('size')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Piece (s)</label>
                            <input type="text" class="form-control" name="pcs" id="validationServer01" value="NA" placeholder="Product Piece">
                            <div class="pt-1">
                                @error('pcs')
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
                            <input type="text" class="form-control" name="sale_price" id="validationServer01" placeholder="Sale Price" required>
                            <div class="pt-1">
                                @error('sale_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount Price</label>
                            <input type="text" class="form-control" name="discount_price" value="0" id="validationServer01" placeholder="Discount Price">
                            <div class="pt-1">
                                @error('discount_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount %</label>
                            <input type="text" class="form-control" name="discount_percent" value="0" id="validationServer01" placeholder="Discount %">
                            <div class="pt-1">
                                @error('discount_percent')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Price, Sale, Discount and % End -->

                    <!-- Product warranty, Vat/Tax , Variation Swatches Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Warranty</label>
                            <input type="text" class="form-control" name="warranty" id="validationServer01" placeholder="Warranty" value="No Warranty">
                            <div class="pt-1">
                                @error('warranty')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Vat/Tax</label>
                            <input type="text" class="form-control" name="tax" value="0" id="validationServer01" placeholder="Vat/Tax">
                            <div class="pt-1">
                                @error('tax')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Variation Swatches</label>
                            <select class="form-control" name="variation_swatch">
                                <span class="text-danger" value=""> Variation Swatches </span>
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>

                            <div class="pt-1">
                                @error('variation_swatch')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product warranty, Vat/Tax , Variation Swatches Section End -->

                    <!-- Product Tags Starts -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Tags</label>
                            <input type="text" class="form-control" name="tags" id="validationServer01" placeholder="Product Tags">
                            <div class="pt-1">
                                @error('tags')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Tags Ends -->

                    <!-- Product Promotions -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Promotion</label>
                            <input type="text" class="form-control" name="promotion" id="validationServer01" placeholder="Product Promotion" >
                            <div class="pt-1">
                                @error('promotion')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Promotions -->

                    <!-- Product List Image Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer02">Product List Image</label>
                            <input type="file" class="form-control" name="product_img" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('product_img')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt</label>
                            <input type="text" class="form-control" name="product_alt" id="validationServer01" placeholder="Image Alt">
                            <div class="pt-1">
                                @error('product_alt')
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection