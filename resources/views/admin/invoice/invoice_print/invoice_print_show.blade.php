@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Print Invoice Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Invoice Date</th>
                            <th scope="col">Invoice No.</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Print Invoice</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ $datum->invoice_date}}</td>
                            <td>{{ $datum->invoice_no}}</td>
                            <td>{{ $datum->customerName->customer_name }}</td>
                            <td>{{ $datum->total_price}}</td>
                            <td><a href="{{ route ('invoice.print', ['id' => $datum->id])}}" target="blank" class="btn btn-info btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a></td>
                            <!-- <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"></li>
                                            <li class="p-1"><a href="{{ route('invoice.approve.status', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('category.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td> -->
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