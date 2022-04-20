@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Product Purchase</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('purchase.order.add')}}">
                    @csrf
                    <!-- Purchase Date, Purchase No., supplier_name Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Purchase Date</label>
                            <input type="date" class="form-control" name="purchase_date">
                            <div class="pt-1">
                                @error('purchase_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Purchase No.</label>
                            <input type="text" class="form-control" name="purchase_no" value="{{ 'PUR_'.uniqid() . mt_rand(100,999) }}" placeholder="Purchase No." required>
                            <div class="pt-1">
                                @error('purchase_no')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Supplier Name</label>
                            <select class="form-control js-example-basic-single" name="supplier_id" required>
                                <span class="text-danger"> Select Supplier </span>
                                <option value="">Select Units</option>
                                @foreach($supplier_names as $supplier_name)
                                <option value="{{ $supplier_name->id }}">{{ $supplier_name->supplier_name }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('supplier_id')
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
                <h2>Purchase Table</h2>
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
                            <th scope="col"><i class="fa-solid fa-circle-plus"></i> Purchase Items</th>
                            <th scope="col">Action</th>
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
                            <td><a href="{{ route ('purchase.add.page', ['id' => $datum->id])}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus"></i> Add Items</a></td>
                            <td>
                                <a href="{{ route('purchase.order.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning {{ empty($datum->approved) ? '' : 'disabled' }}"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('purchase.order.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger {{ empty($datum->approved) ? '' : 'disabled' }} "><i class="fa fa-trash" aria-hidden="true"></i></a>
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