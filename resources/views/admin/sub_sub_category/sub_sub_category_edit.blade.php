@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('subsubcategory.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Sub Two Category</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('subsubcategory.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Sub Category Two Name</label>
                            <input type="text" class="form-control" name="sub_sub_cat_name" value="{{$data->sub_sub_cat_name}}" id="validationServer01" placeholder="Sub Category Two Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <select class="form-control js-sub-category-edit" name="cat_id">
                                <span class="text-danger" value=""> Select Category </span>
                                <option value="">select category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($data->cat_id == $category->id) ? "Selected":"" }} >{{ $category->cat_name }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('cat_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Sub Category One Name</label>
                            <select class="form-control js-sub-category-edit" name="sub_cat_id">
                                <span class="text-danger" value=""> Select Sub Category Two</span>
                                <option value="">select Sub category Two</option>
                                @foreach($categories2 as $category2)
                                <option value="{{ $category2->id }}" {{ ($data->sub_cat_id == $category2->id) ? "Selected":"" }} >{{ $category2->sub_cat_name }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('sub_cat_id')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-sub-category-edit').select2();
    });
</script>
@endsection