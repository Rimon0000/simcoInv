@extends('admin.master_admin')
@section ('content')


<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Category</h2>
            </div>
            <div class="card-body">

                <!-- display message -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                <!-- display message -->

                <form method="POST" action="{{route('category.add')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" id="validationServer01" placeholder="Category Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Category Image</label>
                            <input type="file" class="form-control" name="cat_img" id="validationServer02">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1" checked>
                            <label class="form-check-label" for="exampleCheck1">Status</label>
                        </div>
                    </div>
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
                <h2>Category Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Category Nmae</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $datam)
                        <tr>
                            <td scope="row">#</td>
                            <td><img src="{{ asset ($datam->cat_img) }}" alt="default image" width="100px" height="80px"></td>
                            <td>{{ $datam->cat_name}}</td>
                            <td>{{ $datam->status}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="">Edit</a> ||
                                <a class="btn btn-sm btn-danger" href="">Detlete</a>
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