@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('category.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Sub Category</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('category.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Sub Category Name</label>
                            <input type="text" class="form-control" name="cat_name" id="validationServer01" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            
                           <select class="form-control">
                               @foreach(&data as $datum)
                               <option>{{ $datum->cat_name }}</option>
                               @endforeach
                           </select>

                            <div class="pt-1">
                                @error('cat_name')
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