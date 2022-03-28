@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('category.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Category</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('category.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" value="{{$data->cat_name}}" id="validationServer01" placeholder="Category Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-warning btn-sm" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection