@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('product.attribute.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Attribute Image One</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('product.attribute.image.update', ['id'=> $data->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Product Attribute Image</label>
                            <input type="file" class="form-control" name="product_img_1" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('product_img_1')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Previous Attribute Image One</h2>
            </div>
            <div class="card-body">
                <h6 class="pb-3">Previous Image:</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{ empty($data->product_img_1) ? asset('backend/assets/img/default-img.png') : asset($data->product_img_1) }}" class="img-thumbnail" alt="..." width="200px" height="200px">
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Attribute Image</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('product.attribute.image.update', ['id'=> $data->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Product Attribute Image</label>
                            <input type="file" class="form-control" name="product_img_1" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('product_img_1')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="preview">
                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Attribute Image</h2>
            </div>
            <div class="card-body">
                <h6 class="pb-3">Previous Image:</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{ empty($data->product_img_1) ? asset('backend/assets/img/default-img.png') : asset($data->product_img_1) }}" class="img-thumbnail" alt="..." width="200px" height="200px">
                    </div>
                </div>
                <br>
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