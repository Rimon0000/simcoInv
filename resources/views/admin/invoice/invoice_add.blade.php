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
                            <input type="text" class="form-control form-control-sm" name="customer_id" value="{{ $invoiceOrder->customer_id }}" style="background-color:#95caff;" readonly>
                        </div>
                    </div>
                    <hr>
                    <!-- Product Color, Size, Pieces, Weight Section End -->

                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_id" id="product_id" onchange="unitStock()" required>
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->product_id }}">{{ $productlist->product_id }}</option>
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
                            <input type="hidden" id="p_id" name="product_name">
                            <input type="text" class="form-control form-control-sm" id="product_name" readonly>
                            <!-- <select class="form-control js-example-basic-single" name="product_name" required>
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
                            </div> -->
                        </div>

                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Category</label>
                            <input type="hidden" id="cat_id" name="cat_id">
                            <input type="text" class="form-control form-control-sm" id="cat_name" readonly>
                            <!-- <select class="form-control js-example-basic-single" name="cat_id" required>
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
                            </div> -->
                        </div>

                    </div>
                    <!-- Product Category, Sub Category, Sub Sub Categroy End -->
                    <!-- Product Code, Stock Qty, Stock Alert, Units Start -->
                    <div class="form-row">
                        <div class="col-md-2 mb-3">
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
                        <div class="col-md-2 mb-3">
                            <label for="validationServer01">Unit Price</label>
                            <input type="number" class="form-control form-control-sm" id="unit_price" min="0" value="0" name="unit_price" onchange="unitPrice()" placeholder="Unit Price" required>
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
                            <input type="number" class="form-control form-control-sm" id="quantity" min="0" value="0" name="quantity" onchange="inputQty()" placeholder="Quantity" required>
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
                <table class="table table-striped" id="invoiceTable" class="display" style="width:100%">
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
                            <td>{{ $datum->productName->title }}</td>
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
                                <a href="{{ route('invoice.delete', ['id' => $datum->id, 'invoice_no' => $datum->invoice_no ]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> <em>Sub Total (Tk):</em> </td>
                            <td style="color: black;"><strong>{{ $sub_total_price }}</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row m-3">
    <div class="col-lg-6"></div>
    <div class="col-lg-6">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <form action="{{ route('invoice.order.payment', ['id' => $invoiceOrder->id]) }}" method="POST">
                @csrf

                <div class="pb-1 pt-1">
                    <strong>Invoice Date:</strong>
                </div>
                <div>
                    <input type="date" class="form-control form-control-sm" name="invoice_date" value="{{ $invoiceOrder->invoice_date }}" readonly>
                </div>
                <div class="pb-1 pt-1">
                    <strong>Invoice No.</strong>
                </div>
                <div>
                    <input type="text" class="form-control form-control-sm" name="invoice_no" value="{{ $invoiceOrder->invoice_no }}" readonly>
                </div>
                <div class="pb-1 pt-1">
                    <strong>Customer Name</strong>
                </div>
                <div>
                    <input type="text" class="form-control form-control-sm" name="customer_id" value="{{ $invoiceOrder->customer_id }}" readonly>
                </div>
                <div class="pb-1 pt-1">
                    <strong>Sub Total (Tk):</strong>
                </div>
                <div>
                    <input type="number" class="form-control form-control-sm" id="sub_total_price" name="sub_total_price" value="{{ $sub_total_price }}" readonly>
                </div>
                <div class="pb-1 pt-1">
                    <strong>Discount Price (Tk):</strong>
                </div>
                <div>
                    <input type="number" class="form-control form-control-sm" id="discount_price" min="0" max="{{ $sub_total_price  }}" value="0" name="discount_price" onchange="discountPrice()" placeholder="Discount Price" required>
                </div>
                <div class="pb-1 pt-1">
                    <strong>Enter Paid Amount:</strong>
                </div>
                <div>
                    <input type="number" class="form-control form-control-sm" min="0" max="{{ $sub_total_price  }}" id="paid_amount" value="0" name="paid_amount" onchange="sum()" placeholder="Paid Amount" required>
                </div>
                <div class="pb-1 pt-1">
                    <strong> Due Amount (Tk):</strong>
                </div>
                <div>
                    <input type="number" class="form-control form-control-sm" min="0" max="{{ $sub_total_price  }}" value="0" id="due_amount" name="due_amount" onchange="sum()" placeholder="Due Amount">
                </div>
                <div id="sum" class="pt-2 pb-2">

                </div>
                <div class="pb-1 pt-1">
                    <strong> Paid Status:</strong>
                </div>
                <div>
                    <select class="form-control js-example-basic-single" name="paid_status" required>
                        <span class="text-danger" value=""> Paid Status </span>
                        <option value="">Paid Status</option>
                        <option value="Full Paid">Full Paid</option>
                        <option value="Full Due">Full Due</option>
                        <option value="Partial Paid">Partial Paid</option>
                    </select>

                    <div class="pt-1">
                        @error('paid_status')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div>
                    <input type="submit" class="btn btn-block btn-sm btn-danger" value="Submit">
                </div>

                <br>
            </form>
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
    }


    // ####################### Part two
    var sub_total_price;
    var discount_price;
    var paid_amount;


    function discountPrice() {
        sub_total_price = document.getElementById('sub_total_price').value;
        discount_price = document.getElementById('discount_price').value;
        paid_amount = document.getElementById('paid_amount').value;
        due_amount = document.getElementById('due_amount').value;

        if (discount_price == 0) {
            document.getElementById('paid_amount').value = parseInt(sub_total_price);
            document.getElementById('due_amount').value = 0;

        } else {
            document.getElementById('paid_amount').value = (parseInt(sub_total_price) - parseInt(discount_price));
            document.getElementById('due_amount').value = 0;
        }
        sum();
    }


    function sum() {
        sub_total_price = document.getElementById('sub_total_price').value;
        discount_price = document.getElementById('discount_price').value;
        paid_amount = document.getElementById('paid_amount').value;
        due_amount = document.getElementById('due_amount').value;

        document.getElementById('sum').innerHTML = `<small><strong>Summition Tk:</strong> ${(parseInt(discount_price) + parseInt(paid_amount) + parseInt(due_amount))}</small>`;
    }



    function unitStock() {
        var product_id = document.getElementById('product_id').value;

        axios.get('http://127.0.0.1:8000/product-mgt/product-list/single-product/' + product_id)
            .then(function(response) {
                document.getElementById('unit_stock').value = response.data.stock;
                document.getElementById('product_name').value = response.data.title;
                document.getElementById('cat_name').value = response.data.cat_name;
                document.getElementById('p_id').value = response.data.p_id;
                document.getElementById('cat_id').value = response.data.cat_id;
                document.getElementById('cat_name').value = response.data.cat_name;
                document.getElementById('unit_id').value = response.data.unit;
                document.getElementById('unit_name').value = response.data.unit_name;
            });
    }



    // function paidAmount() {

    //     sub_total_price = document.getElementById('sub_total_price').value;
    //     discount_price = document.getElementById('discount_price').value;
    //     due_amount = document.getElementById('due_amount').value;
    //     paid_amount = document.getElementById('paid_amount').value;

    //     if (discount_price == 0) {
    //         document.getElementById('due_amount').value = parseInt(sub_total_price) - (parseInt(discount_price) + parseInt(paid_amount));
    //     } else if (discount_price > 0) {
    //         document.getElementById('due_amount').value = parseInt(sub_total_price) - (parseInt(discount_price) + parseInt(paid_amount));

    //     }

    // }
</script>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });

    $(document).ready(function() {
        $('#invoiceTable').DataTable();
    });
</script>
@endsection