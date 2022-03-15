@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('subcategory.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Sub Category</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('subcategory.add')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Sub Category Name</label>
                            <input type="text" class="form-control" name="sub_cat_name" id="validationServer01" placeholder="Sub Category Name" required>
                            <div class="pt-1">
                                @error('sub_cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <select class="form-control" name="cat_id">
                                <span class="text-danger" value=""> Select Category </span>
                                <option value="">select category</option>
                                @foreach($data as $datum)
                                <option value="{{ $datum->id }}">{{ $datum->cat_name }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('cat_id')
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

@endsection