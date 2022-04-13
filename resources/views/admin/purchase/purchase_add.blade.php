@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('purchase.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row m-4">
    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Product Purchase</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('purchase.store')}}" >
                    @csrf

                    <!-- Product Color, Size, Pieces, Weight Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Purchase Date</label>
                            <input type="date" class="form-control form-control-sm" name="purchase_date" value="{{ $purchaseOrder->purchase_date }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Purchase No.</label>
                            <input type="text" class="form-control form-control-sm" name="purchase_no"  value="{{ $purchaseOrder->purchase_no }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Supplier Name</label>
                            <input type="text" class="form-control form-control-sm" name="supplier_id"  value="{{ $purchaseOrder->supplier_id }}" readonly>
                        </div>
                    </div>
                    <hr>
                    <!-- Product Color, Size, Pieces, Weight Section End -->

                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_code" required>
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->id }}">{{ $productlist->product_id }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('product_code')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Unit</label>
                            <select class="form-control js-example-basic-single" name="unit_id" required>
                                <span class="text-danger" value=""> Unit </span>
                                <option value="">Product Code</option>

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

                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Attribute Number</label>
                            <select class="form-control js-example-basic-single" name="product_attr_id">
                                <span class="text-danger" value=""> Product Attribute </span>
                                <option value="">Product Attribute</option>

                                @foreach($productAttrs as $productAttr)
                                <option value="{{ $productAttr->id }}">{{ $productAttr->product_attr }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('product_attr_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Category</label>
                            <select class="form-control js-example-basic-single" name="cat_id" required>
                                <span class="text-danger" value=""> Product Category </span>
                                <option value="">Product Category</option>

                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('cat_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->
                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Product Name</label>
                            <select class="form-control js-example-basic-single" name="product_name" required>
                                <span class="text-danger" value=""> Product Name </span>
                                <option value="">Product Name</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->id }}">{{ $productlist->title }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('product_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Unit Price</label>
                            <input type="text" class="form-control form-control-sm" name="unit_price"  placeholder="Unit Price" required>
                            <div class="pt-1">
                                @error('unit_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Qty</label>
                            <input type="text" class="form-control form-control-sm" name="quantity"  placeholder="Quantity" required>
                            <div class="pt-1">
                                @error('quantity')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Total price</label>
                            <input type="text" class="form-control form-control-sm" name="total_price"  readonly>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="validationServer01">Description</label>
                            <input type="text" class="form-control form-control-sm" name="description"  placeholder="Total Price">
                            <div class="pt-1">
                                @error('description')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Purchase Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product SKU</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ $datum->productName->product_id }}</td>
                            <td>{{ $datum->productName->title }}</td>
                            <td>{{ $datum->supplierName->supplier_name }}</td>
                            <td>{{ $datum->categoryName->cat_name }}</td>
                            <td>{{ $datum->unitName->unit_name }}</td>
                            <td>{{ $datum->unit_price }}</td>
                            <td>{{ $datum->quantity }}</td>
                            <td>{{ $datum->total_price }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{$datum->id}}">
                                    Details
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$datum->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$datum->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{$datum->id}}">Product SKU - {{ $datum->productName->title }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Purchase Date</em></th>
                                                            <td scope="col">{{ $datum->purchase_date }}</td>
                                                            <th scope="col"><em>Purchase No.</em></th>
                                                            <td scope="col">{{ $datum->purchase_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Description</em></th>
                                                            <td scope="col">{{ $datum->description }}</td>
                                                            <th scope="col"><em>Created_by</em></th>
                                                            <td scope="col">{{ $datum->userName->name }}</td>
                                                        </tr>                                                      

                                                    </thead>
                                                </table>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('category.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('category.edit.image', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit Image</a></li>
                                            <li class="p-1"><a href="{{ route('category.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> <em>Sub Total:</em> </td>
                        <td style="color: black;"><strong>{{ $sub_total_price }}</strong></td>
                        <td></td>
                        <td></td>

                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>

@endsection