@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Invoice Order</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('invoice.order.add')}}">
                    @csrf
                    <!-- Purchase Date, Purchase No., supplier_name Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Invoice Date</label>
                            <input type="date" class="form-control" name="invoice_date">
                            <div class="pt-1">
                                @error('invoice_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Invoice No.</label>
                            <input type="text" class="form-control" name="invoice_no" value="{{ strtoupper('INV_'.uniqid() . mt_rand(100,999)) }}" placeholder="Invoice No.">
                            <div class="pt-1">
                                @error('invoice_no')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Customer Name</label>
                            <select class="form-control js-example-basic-single" name="customer_id" required>
                                <span class="text-danger"> Select Customer </span>
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                @endforeach


                            </select>

                            <div class="pt-1">
                                @error('customer_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Description</label>
                            <input type="text" class="form-control" name="description" placeholder="Description">
                            <div class="pt-1">
                                @error('description')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
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
                <h2>Invoice Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Invoice No.</th>
                            <th scope="col" style="width: 170px;">Customer Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Approved</th>
                            <th scope="col">Add Invoice Items</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ date('d-m-y', strtotime($datum->invoice_date)) }}</td>
                            <td>{{ $datum->invoice_no}}</td>
                            <td>{{ $datum->customerName->customer_name }}</td>
                            <td>{{ $datum->total_price}}</td>
                            <td> <strong class="{{ empty($datum->approved) ? 'text-danger' : 'text-success'}}">{{ empty($datum->approved) ? 'Pending' : 'Approved' }}</strong> </td>
                            <td><a href="{{ route ('invoice.add.page', ['id' => $datum->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i> Invoice Items</a></td>
                            <td>
                                <a href="{{ route ('invoice.print', ['id' => $datum->id])}}" target="blank" class="btn btn-primary btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>
                                <a href="{{ route('invoice.order.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning {{ empty($datum->total_price) ? '' : 'disabled' }}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('invoice.order.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger {{ empty($datum->total_price) ? '' : 'disabled' }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable();
    });
</script>
@endsection