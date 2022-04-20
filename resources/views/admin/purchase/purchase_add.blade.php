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
                <h2>Purchase Details - {{ $purchaseOrder->purchase_no }}</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('purchase.store')}}">
                    @csrf

                    <!-- Product Color, Size, Pieces, Weight Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Purchase Date</label>
                            <input type="date" class="form-control form-control-sm" name="purchase_date" value="{{ $purchaseOrder->purchase_date }}" style="background-color:#95caff;" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Purchase No.</label>
                            <input type="text" class="form-control form-control-sm" name="purchase_no" value="{{ $purchaseOrder->purchase_no }}" style="background-color:#95caff;" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Supplier Name</label>
                            <input type="hidden" name="supplier_id" value="{{ $purchaseOrder->supplier_id }}">
                            <input type="text" class="form-control form-control-sm" value="{{ $purchaseOrder->supplierName->supplier_name }}" style="background-color:#95caff;" readonly>
                        </div>
                    </div>
                    <hr>
                    <!-- Product Color, Size, Pieces, Weight Section End -->
                    <h5>Add Product:</h5>
                    <br>
                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_code" id="product_id"  onchange="unitStock()" required>
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->product_id  }}" >{{ $productlist->product_id }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('product_code')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Product Name</label>
                            <!-- <select class="form-control js-example-basic-single" name="product_name" id="product_name" required>
                                <span class="text-danger" value=""> Product Name </span>
                                <option value="">Product Name</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->id }}">{{ $productlist->title }}</option>
                                @endforeach

                            </select> -->
                            <input type="hidden" id="p_id" name="product_name">
                            <input type="text" class="form-control form-control-sm" id="product_name" readonly>

                            <div class="pt-1">
                                @error('product_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="col-md-3 mb-3">
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
                        </div> -->
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Category</label>
                            <!-- <select class="form-control js-example-basic-single" name="cat_id" required>
                                <span class="text-danger" value=""> Product Category </span>
                                <option value="">Product Category</option>

                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                @endforeach

                            </select> -->
                            <input type="hidden" id="cat_id" name="cat_id">
                            <input type="text" class="form-control form-control-sm" id="cat_name" readonly>

                            <div class="pt-1">
                                @error('cat_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Unit</label>
                            <!-- <select class="form-control js-example-basic-single" name="unit_id" required>
                                <span class="text-danger" value=""> Unit </span>
                                <option value="">Product Unit</option>

                                @foreach($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                @endforeach

                            </select> -->
                            <input type="hidden" id="unit_id" name="unit_id">
                            <input type="text" class="form-control form-control-sm" id="unit_name" readonly>

                            <div class="pt-1">
                                @error('unit_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>




                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->
                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">

                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Unit Price</label>
                            <input type="number" class="form-control form-control-sm" id="unit_price" value="0" name="unit_price" onchange="unitPrice()" placeholder="Unit Price" required>
                            <div class="pt-1">
                                @error('unit_price')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Unit Stock</label>
                            <input type="number" class="form-control form-control-sm" id="unit_stock" value="0" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Qty</label>
                            <input type="number" class="form-control form-control-sm" id="quantity" value="0" name="quantity" onchange="inputQty()" placeholder="Quantity" required>
                            <div class="pt-1">
                                @error('quantity')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Total price</label>
                            <input type="number" class="form-control form-control-sm" value="0" id="total_price" name="total_price" style="background-color:#95caff;" readonly>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="validationServer01">Description</label>
                            <input type="text" class="form-control form-control-sm" id="quantity" name="description" placeholder="Description">
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
                <h2>Purchase Items Table</h2>
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
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('purchase.delete', ['id' => $datum->id, 'purchase_no' => $datum->purchase_no ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger {{ empty($purchaseOrder->approved) ? '' : 'disabled' }} "><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                        <td></td>
                        <td> <em>Sub Total (TK):</em> </td>
                        <td style="color: black;"><strong>{{ $sub_total_price }}</strong></td>
                        <td></td>
                        <td></td>

                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    var unit_price;
    var quantity;

    function unitPrice() {
        unit_price = document.getElementById('unit_price').value;
        document.getElementById('total_price').value = (parseInt(unit_price) * parseInt(quantity));
    }

    function inputQty() {
        quantity = document.getElementById('quantity').value;
        document.getElementById('total_price').value = (parseInt(unit_price) * parseInt(quantity));

        console.log(document.getElementById('total_price').value = (parseInt(unit_price) * parseInt(quantity)));
    }





    function unitStock() {

        var product_id = document.getElementById('product_id').value;


        axios.get('http://127.0.0.1:8000/product-mgt/product-list/single-product/' + product_id)
            .then(function(response) {
                console.log(response.data);
                document.getElementById('p_id').value = response.data.p_id;
                document.getElementById('product_name').value = response.data.title;
                document.getElementById('unit_stock').value = response.data.stock;
                document.getElementById('cat_id').value = response.data.cat_id;
                document.getElementById('cat_name').value = response.data.cat_name;
                document.getElementById('unit_id').value = response.data.unit;
                document.getElementById('unit_name').value = response.data.unit_name;
            });

    }
</script>



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