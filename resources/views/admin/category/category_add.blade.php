@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('category.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

 <div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Category</h2>
            </div>
            <div class="card-body">


                <form method="POST" action="{{route('category.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Category Name</label>
                            <input type="text" class="form-control" name="cat_name" id="validationServer01" placeholder="Category Name" required>
                            <div class="pt-1">
                                @error('cat_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Category Image</label>
                            <input type="file" class="form-control" name="cat_img" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('cat_img')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                            <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                        </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";

        }
    }
</script>


@endsection