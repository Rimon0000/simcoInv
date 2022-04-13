@extends('admin.master_admin')
@section ('content')


<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('displaysection.add.page')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i> Add Varity Section</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2> Varity Section Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Varity Section Name</th>
                            <th scope="col">User Name</th>
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
                            <td>{{ $datum->display_section}}</td>
                            <td>{{ $datum->userName->name }}</td>
                            <td><a href="{{ route ('displaysection.status', ['id' => $datum -> id]) }}" class="btn btn-sm {{ $datum->status == 1 ? 'btn-info': 'btn-danger' }}"> {{ $datum->status == 1 ? 'Active': 'Deactive' }}</a></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('displaysection.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('displaysection.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
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