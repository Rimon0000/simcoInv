@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('product.attribute.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Product Attribute</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('product.attribute.update', ['id'=> $data->id])}}">
                    @csrf


                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_id" required>
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productLists as $productList)
                                <option value="{{ $productList->id }}"  {{ ($data->product_id == $productList->id) ? "Selected" : "" }}   >{{ $productList->product_id }}</option>
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
                            <input type="text" class="form-control form-control-sm" value="{{ $data->quantity }}" name="quantity" id="validationServer01" placeholder="Stock Qty" required>
                            <div class="pt-1">
                                @error('quantity')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Stock Alert</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $data->alert_stock }}" name="alert_stock" id="validationServer01" placeholder="Stock Alert" required>
                            <div class="pt-1">
                                @error('alert_stock')
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
                                <option value="{{ $unit->id }}" {{ ($data->unit_id == $unit->id) ? "Selected" : "" }} >{{ $unit->unit_name }}</option>
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
                            <input type="text" class="form-control" value="{{ $data->color }}" name="color" id="validationServer01" value="NA" placeholder="Product Color">
                            <div class="pt-1">
                                @error('color')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Size</label>
                            <input type="text" class="form-control" value="{{ $data->size }}" name="size" id="validationServer01" value="NA" placeholder="Product Size">
                            <div class="pt-1">
                                @error('size')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Piece</label>
                            <input type="text" class="form-control" value="{{ $data->piece }}" name="piece" id="validationServer01" value="0" placeholder="Product Piece">
                            <div class="pt-1">
                                @error('piece')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Weight</label>
                            <input type="text" class="form-control" value="{{ $data->weight }}" name="weight" id="validationServer01" value="NA" placeholder="Product Weight">
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
                            <input type="text" class="form-control" value="{{ $data->price }}" name="price" id="validationServer01" placeholder="Price" required>
                            <div class="pt-1">
                                @error('price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Sale Price</label>
                            <input type="text" class="form-control" value="{{ $data->sale_price }}" name="sale_price" id="validationServer01" value="0" placeholder="Sale Price">
                            <div class="pt-1">
                                @error('sale_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount Price</label>
                            <input type="text" class="form-control" value="{{ $data->discount_price }}" name="discount_price" id="validationServer01" value="0" placeholder="Discount Price">
                            <div class="pt-1">
                                @error('discount_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Discount %</label>
                            <input type="text" class="form-control" value="{{ $data->discount_percent }}" name="discount_percent" id="validationServer01" value="0" placeholder="Discount %">
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
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt One</label>
                            <input type="text" class="form-control" value="{{ $data->product_img_alt_1 }}" name="product_img_alt_1" id="validationServer01" placeholder="Image Alt One">
                            <div class="pt-1">
                                @error('product_img_alt_1')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Product List Image End -->
                    <!-- Product List Image Start -->
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="validationServer01">Image Alt Two</label>
                            <input type="text" class="form-control" value="{{ $data->product_img_alt_2 }}" name="product_img_alt_2" id="validationServer01" placeholder="Image Alt Two">
                            <div class="pt-1">
                                @error('product_img_alt_2')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
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