@extends('admin.master_admin')
@section ('content')

<div class="row m-3">
    <div class="col-lg-6">
        <a href="{{ route ('invoice.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row m-3">
    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Invoice Items - {{ $invoiceOrder->invoice_no }}</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('invoice.store')}}">
                    @csrf

                    <!-- Product Color, Size, Pieces, Weight Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Invoice Date</label>
                            <input type="date" class="form-control form-control-sm" name="invoice_date" value="{{ $invoiceOrder->invoice_date }}" style="background-color:#95caff;" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Invoice No.</label>
                            <input type="text" class="form-control form-control-sm" name="invoice_no" value="{{ $invoiceOrder->invoice_no }}" style="background-color:#95caff;" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Customer Name</label>
                            <input type="hidden" name="customer_id" value="{{ $invoiceOrder->customer_id }}">
                            <input type="text" class="form-control form-control-sm" value="{{ $invoiceOrder->customer_id }}" style="background-color:#95caff;" readonly>
                        </div>
                    </div>
                    <hr>
                    <!-- Product Color, Size, Pieces, Weight Section End -->

                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_id" required>
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
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Unit</label>
                            <select class="form-control js-example-basic-single" name="unit_id" required>
                                <span class="text-danger" value=""> Unit </span>
                                <option value="">Product Unit</option>

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

                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row m-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Invoice Item Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product SKU</th>
                            <th scope="col">Product Name</th>
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
                            <td>{{ $datum->product_id }}</td>
                            <td>{{ $datum->product_name }}</td>
                            <td>{{ $datum->cat_id }}</td>
                            <td>{{ $datum->unit_id }}</td>
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
                                                <h5 class="modal-title" id="exampleModalLabel{{$datum->id}}">Product SKU - </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Invoice Date</em></th>
                                                            <td scope="col">{{ $datum->invoice_date }}</td>
                                                            <th scope="col"><em>Invoice No.</em></th>
                                                            <td scope="col">{{ $datum->invoice_no }}</td>
                                                            <td scope="col"><em>Customer Name</em></td>
                                                            <td scope="col">{{ $datum->customer_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <!-- <th scope="col"><em>Description</em></th>
                                                            <td scope="col">{{ $datum->description }}</td> -->
                                                            <th scope="col"><em>Created_by</em></th>
                                                            <td scope="col">{{ $datum->user_id }}</td>
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
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('category.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('category.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <em>Sub Total:</em> </td>
                            <td style="color: black;"><strong id="sub_total_price">{{ $sub_total_price }}</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Discount Price:</td>
                            <td>
                                <input type="number" class="form-control form-control-sm" id="discount_price" min="0" max="{{ $sub_total_price  }}" value="0" name="discount_price" onchange="discountPrice()" placeholder="Discount Price" required>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Enter Paid Amount:</td>
                            <td>
                                <input type="number" class="form-control form-control-sm" min="0" max="{{ $sub_total_price  }}" id="paid_amount" name="paid_amount" placeholder="Paid Amount">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Paid Status:</td>
                            <td>

                                <select class="form-control js-example-basic-single" name="paid_status">
                                    <span class="text-danger" value=""> Paid Status </span>
                                    <option value="">Paid Status</option>
                                    <option value="1">Full Paid</option>
                                    <option value="2">Full Due</option>
                                    <option value="3">Partial Paid</option>
                                </select>

                                <div class="pt-1">
                                    @error('paid_status')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>

                                <input type="submit" class="btn btn-block btn-sm btn-danger" value="Submit">

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    // ####################### Part one
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


    // ####################### Part two
    var sub_total_price;
    var discount_price;
    var paid_amount;

    function discountPrice() {
        sub_total_price = document.getElementById('sub_total_price').innerHTML;
        discount_price = document.getElementById('discount_price').value;

        if (discount_price == 0) {
            document.getElementById('paid_amount').value = parseInt(sub_total_price);
        } else {
            document.getElementById('paid_amount').value = (parseInt(sub_total_price) - parseInt(discount_price));
        }

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