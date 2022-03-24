@extends('admin.master_admin')

@section('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('expanse.detail.add.page') }}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i> Add Expanse Detail </a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Expanse Detail Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Expanse Date</th>
                            <th scope="col">Expanse Name</th>
                            <th scope="col">Fixed Expanse Type</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Remarks</th>
                            <th scope="col">Added By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp
                        @foreach($data as $datum)
                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>{{ $datum->expanse_date }}</td>
                            <td>{{ $datum->expanse_name }}</td>
                            <td>{{ $datum->fixed_expanse == "" || $datum->fixed_expanse == null ?  "" : $datum->expanseName->expanse_type }}</td>
                            <td>{{ $datum->amount }}</td>
                            <td>{{ $datum->remarks }}</td>
                            <td>{{ $datum->userName->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('expanse.detail.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('expanse.detail.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
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