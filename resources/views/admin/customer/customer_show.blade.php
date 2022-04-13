@extends("admin.master_admin")

@section("content")

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('customer.add.page')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i> Add Customer</a>
    </div>
</div>

<div class="row p-3">

    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Customer List Table</h2>
            </div>
            <div class="card-body">

                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Image</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Previous Due</th>
                            <th scope="col">Email</th>
                            <th scope="col">Details</th>
                            <th scope="col">Created By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td><img src="{{ $datum->customer_img == null ? asset('backend/assets/img/default-img.png') : asset($datum->customer_img) }}" alt="default image" width="50px" height="50px"></td>
                            <td>{{ $datum->customer_name }}</td>
                            <td>{{ $datum->customer_id }}</td>
                            <td>{{ $datum->mobile }}</td>
                            <td>{{ $datum->previous_due }}</td>
                            <td>{{ $datum->email }}</td>
                            <td></td>
                            <td>{{ $datum->userName->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"></button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('customer.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('customer.edit.image', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit Image</a></li>
                                           
                                            <li class="p-1"><a href="{{ route('customer.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
                                          
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