@extends('admin.master_admin')
@section ('content')


<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('coupon.add.page')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-plus text-danger"></i> Add Coupon</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Coupon Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Offer Name</th>
                            <th scope="col">Product Title</th>
                            <th scope="col">Coupon Code</th>
                            <th scope="col">Coupon Type</th>
                            <th scope="col">Coupon Limit</th>
                            <th scope="col">Coupon Amount</th>
                            <th scope="col">Cart Min Value</th>
                            <th scope="col">Expired Date</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ $datum->offer_name}}</td>
                            <td>{{  !empty($datum->product_id) ? $datum->productListName->title : '' }}</td>
                            <td>{{ $datum->coupon_code}}</td>
                            <td>{{ $datum->coupon_type}}</td>
                            <td>{{ $datum->coupon_limit}}</td>
                            <td>{{ $datum->coupon_amount}}</td>
                            <td>{{ $datum->cart_min_value}}</td>
                            <td>{{ $datum->expired_date}}</td>
                            <td>{{ $datum->userName->name}}</td>
                            <td><a href="{{ route ('coupon.status', ['id' => $datum -> id]) }}" class="btn btn-sm {{ $datum->status == 1 ? 'btn-info': 'btn-danger' }}"> {{ $datum->status == 1 ? 'Active': 'Deactive' }}</a></td>
                            <td>
                            <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('coupon.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('coupon.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
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