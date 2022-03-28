@extends('admin.master_admin')
@section ('content')


<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('subcategory.add.page')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i>Add Sub Category</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2> Sub Category Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub Category Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datum)
                        <tr>
                            <td scope="row">#</td>
                            <td>{{ $datum->sub_cat_name}}</td>
                            <td>{{ $datum->categoryName->cat_name }}</td>
                            <td>{{ $datum->userName->name }}</td>
                            <td><a href="{{ route ('subcategory.status', ['id' => $datum -> id]) }}" class="btn btn-sm {{ $datum->status == 1 ? 'btn-info': 'btn-danger' }}"> {{ $datum->status == 1 ? 'Active': 'Deactive' }}</a></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('subcategory.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('subcategory.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
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