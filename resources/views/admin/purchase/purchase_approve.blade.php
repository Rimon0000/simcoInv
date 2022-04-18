@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Pending Purchase List</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Purchase Date</th>
                            <th scope="col">Purchase No.</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ date('d-m-y', strtotime($datum->purchase_date)) }}</td>
                            <td>{{ $datum->purchase_no}}</td>
                            <td>{{ $datum->supplierName->supplier_name }}</td>
                            <td>{{ $datum->total_price}}</td>
                            <td> <strong class="{{ empty($datum->approved) ? 'text-danger' : 'text-success'}}">{{ empty($datum->approved) ? 'Pending' : 'Approved' }}</strong> </td>
                            <td><a href="{{ route('purchase.order.approve', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-primary">Check</a></td>
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