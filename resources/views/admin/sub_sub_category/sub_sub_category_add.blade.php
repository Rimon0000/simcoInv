@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('subsubcategory.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Sub Category Two</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('subsubcategory.add')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Sub Category Two Name</label>
                            <input type="text" class="form-control" name="sub_sub_cat_name" id="validationServer01" placeholder="Sub Category Two Name" required>
                            <div class="pt-1">
                                @error('sub_sub_cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <select class="form-control js-example-basic-single" name="cat_id">
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

                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Sub Category One Name</label>
                            <select class="form-control js-example-basic-single" name="sub_cat_id">
                                <span class="text-danger" value=""> Select Sub Category </span>
                                <option value="">select Sub category</option>
                                @foreach($data2 as $datum2)
                                <option value="{{ $datum2->id }}">{{ $datum2->sub_cat_name }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('sub_cat_id')
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection