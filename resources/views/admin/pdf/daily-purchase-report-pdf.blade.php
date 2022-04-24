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
            height: 70px;
            font-size: 30px !important;

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
        <h2>Simco IT Soltuions Ltd</h2>
        <address style="font-size: 24px;">Fulkoli building 4th floor , opposite moti complex , chawkbazar chittagong</address>
        <br>
    </header>
    <br>

    <div class="row m-3">
        <div class="col-lg-12 ">
            <div class="card card-default">
                <img src="{{ public_path('dummy.jpg') }}" style="width: 200px; height: 200px">
                <div class="card-body">
                    <div>
                        <table style="width: 100%;">
                            <tr>
                                <td style="text-align: center;">
                                    <div class="card-header card-header-border-bottom">
                                        <h2>Daily Purchase Report</h2>
                                    </div>
                                    <br>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationServer01"><strong>Purchase Date: <span style="font-size: 18px;">{{ date('d-M-Y', strtotime($start_date)) }}</span> to <span style="font-size: 18px;">{{ date('d-M-Y', strtotime($end_date)) }}</span></strong> </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <br><br>
                    <div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-default">
                                    <div class="card-body">
                                        <table style="width:100%">
                                            <thead >
                                                <tr >
                                                    <th scope="col" style="height: 50px;">#</th>
                                                    <th scope="col" style="height: 50px; width:35%">Customer Name</th>
                                                    <th scope="col" style="height: 50px;">Purchase No.</th>
                                                    <th scope="col" style="height: 50px; width:15%">Date</th>
                                                    <th scope="col" style="height: 50px;">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $count = 0; @endphp

                                                @foreach($allData as $key => $datum)

                                                @php $count++; @endphp
                                                <tr>
                                                    <td class="td__height" scope="row">{{ $count }}</td>
                                                    <td class="td__height">{{ $datum->supplierName->supplier_name}}</td>
                                                    <td class="td__height">{{ $datum->purchaseOrderNo->purchase_no }}</td>
                                                    <td class="td__height">{{ date('d-m-y', strtotime($datum->purchase_date)) }}</td>
                                                    <td class="td__height">{{ $datum->total_price }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr style="text-align: left;">
                                                <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" style="text-align: right;"><strong>Grand Total:</strong> </td>
                                                    <td>{{ $grand_total }}</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>
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