<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>

    <style>
        table,
        th,
        td {
            /* border: 1px solid; */
            border-collapse: collapse;
            text-align: center;
            padding: 5px;
        }

        th {
            background-color: #04AA6D;
            color: white;
        }

        .td__height {
            height: 50px;
            /* vertical-align: bottom; */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        header {
            position: fixed;
            top: -60px;
            left: -90px;
            right: -80px;
            height: 50px;
            font-size: 20px !important;

            /** Extra personal styles **/
            background-color: #008B8B;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: -90px;
            right: -80px;
            height: 60px;

            /** Extra personal styles **/
            background-color: #008B8B;
            color: white;
            text-align: center;

        }
    </style>
</head>

<body>

    <!-- Define header and footer blocks before your content -->
    <header>
        Simco IT Soltuions Ltd
    </header>
    <br>

    <div class="row m-3">
        <div class="col-lg-12 ">
            <div class="card card-default">
            <img src="{{ public_path('dummy.jpg') }}" style="width: 200px; height: 200px">
                <div class="card-body">
                    <div>
                        <table style="width: 100%;">
                            <tr style="border: none !important">
                                <td style="text-align: left; border: none !important">
                                    <h4 style="margin-bottom: 20px;">Customer Details:</h4>
                                    <div>-------------------------------</div>
                                    <label for="validationServer01"><strong>Name:</strong> {{ $invoiceOrder->customerName->customer_name }}</label><br>
                                    <label for="validationServer01"><strong>Mobile:</strong> {{ $invoiceOrder->customerName->mobile }}</label><br>
                                    <label for="validationServer01"><strong>Address:</strong> {{ $invoiceOrder->customerName->present_address }}</label><br>
                                </td>
                                <td style="text-align: right;">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>Invoice No. - {{ $invoiceOrder->invoice_no }}</h2>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01"><strong>Invoice Date:</strong> {{ date("d M Y", strtotime($invoiceOrder->invoice_date))  }}</label>
                                    </div>
                                </td>
                            </tr>
                            <tr style="border: none !important">
                                <td style="text-align: left;">

                                </td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <div class="form-row">
                        <div class="col-lg-12">
                            <div class="card card-default">
                                <div class="card-header card-header-border-bottom">
                                    <h2>Invoice Item Table</h2>
                                </div>
                                <div class="card-body">
                                    <table style="border: 1px solid red;" class="table table-striped" id="invoiceTable" class="display" style="width:100%">
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
                                                <td class="td__height" scope="row">{{ $count }}</td>
                                                <td class="td__height">{{ $datum->product_id}}</td>
                                                <td class="td__height">{{ $datum->productName->title }}</td>
                                                <td class="td__height">{{ $datum->cat_id }}</td>
                                                <td class="td__height">{{ $datum->unit_id }}</td>
                                                <td class="td__height">{{ $datum->productName->stock }}</td>
                                                <td class="td__height">{{ $datum->unit_price }}</td>
                                                <td class="td__height">{{ $datum->quantity }}</td>
                                                <td class="td__height">{{ $datum->total_price }}</td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-row">
                        <div class="col-lg-6"></div>
                        <div style="margin-left: 75%;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="width: 150px;">
                                            <h5>Sub Total (Tk) :</h5>
                                        </td>
                                        <th style="width: 50px; font-size: 20px;">
                                            <h5 class="mx-2">{{ $sub_total_price }}</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">
                                            <h5>Discount (Tk) :</h5>
                                        </td>
                                        <th style="width: 50px; font-size: 18px;">
                                            <h5 class="mx-2">{{ $discount_amount }}</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">
                                            <h5>Paid Amount (Tk) :</h5>
                                        </td>
                                        <th style="width: 50px; font-size: 18px;">
                                            <h5 class="mx-2">{{ $paid_amount }}</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">
                                            <h5>Due Amount (Tk) :</h5>
                                        </td>
                                        <th style="width: 50px; font-size: 18px;">
                                            <h5 class="mx-2">{{ $due_amount }}</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px;">
                                            <h5>Grand Total (Tk) :</h5>
                                        </td>
                                        <th style="width: 50px; font-size: 20px;">
                                            <h5 class="mx-2">{{ $sub_total_price - $discount_amount }}</h5>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <br><br><br>

                    <div style="margin-left:80%">
                        <h4 style="text-align: center;">Approved By</h4>
                        <br>
                        <hr style="width: 100%; text-align: left">
                        <i style="font-size:12px">Print Date: {{ date("d M Y") }}</i>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <footer>
        <h6 style="font-size: 30px;">Copyright© {{ date("d M Y") }}</h6>
        <address style="font-size: 30px;">Fulkoli building 4th floor , opposite moti complex , chawkbazar chittagong</address>
        <br>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>