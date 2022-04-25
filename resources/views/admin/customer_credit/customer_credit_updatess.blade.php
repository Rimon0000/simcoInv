@extends('admin.master_admin')
@section ('content')

<div class="row m-3">
    <div class="col-lg-6">
        <a href="{{ route ('invoice.approve')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row m-3">
    <div class="col-lg-12 ">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Invoice No. - {{ $invoiceOrder->invoice_no }}</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('invoice.approve.store')}}">
                    @csrf

                    <!-- Product Color, Size, Pieces, Weight Section Start -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Invoice Date: {{ $invoiceOrder->invoice_date }}</label>
                            <input type="hidden" name="invoice_no" value="{{ $invoiceOrder->invoice_no }}">
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-md-3 mb-3">
                            <label for="validationServer01">Customer Name: {{ $invoiceOrder->customerName->customer_name }}</label>
                            <label for="validationServer01">Customer Mobile: {{ $invoiceOrder->customerName->mobile }}</label>
                            <label for="validationServer01">Customer Address: {{ $invoiceOrder->customerName->present_address }}</label>
                        </div>
                    </div>
                    <hr>
                    <!-- Product Color, Size, Pieces, Weight Section End -->
                    <div class="form-row">
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
                                                <th scope="col">Current Stock</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count = 0; @endphp                                           

                                            @foreach($invoiceOrder['invoiceDetails'] as $key => $datum)

                                            @php $count++; @endphp
                                            <tr>
                                                <td scope="row">{{ $count }}</td>
                                                <td>{{ $datum->product_id}}</td>
                                                <td>{{ $datum->productName->title }}</td>
                                                <td>{{ $datum->cat_id }}</td>
                                                <td>{{ $datum->unit_id }}</td>
                                                <td>{{ $datum->productName->stock }}</td>
                                                <td>{{ $datum->unit_price }}</td>
                                                <td>{{ $datum->quantity }}</td>
                                                <td>{{ $datum->total_price }}</td>

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
                                            <td><em>Sub Total (Tk)</em></td>
                                            <td><strong>{{ $sub_total_price }}</strong></td>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 d-flex justify-content-end">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><h5>Sub Total (Tk) :</h5> </td>
                                        <th><h5 class="mx-2">{{ $sub_total_price }}</h5></th>
                                    </tr>
                                    <tr>
                                        <td><h5>Discount (Tk) :</h5></td>
                                        <th><h5 class="mx-2">{{ $discount_amount }}</h5></th>
                                    </tr>
                                    <tr>
                                        <td><h5>Paid Amount (Tk) :</h5> </td>
                                        <th><h5 class="mx-2">{{ $paid_amount }}</h5></th>
                                    </tr>
                                    <tr>
                                        <td><h5>Due Amount (Tk) :</h5> </td>
                                        <th><h5 class="mx-2">{{ $due_amount }}</h5></th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><hr></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Grand Total (Tk) :</h5> </td>
                                        <th><h5 class="mx-2">{{ $sub_total_price - $discount_amount }}</h5></th>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Approve Invoice</button>
                </form>
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