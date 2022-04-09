@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('slider.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-2">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Slider</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('slider.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Slider Name</label>
                            <input type="text" class="form-control" name="slider_name" id="validationServer01" placeholder="Slider Name" required>
                            <div class="pt-1">
                                @error('slider_name')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_code">
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->id }}">{{ $productlist->product_id }}</option>
                                @endforeach

                            </select>

                            <div class="pt-1">
                                @error('product_code')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Slider Image</label>
                            <input type="file" class="form-control" name="slider_img" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('slider_img')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>

                            <div class="preview">
                                <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                            </div>

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Image Alt</label>
                            <input type="text" class="form-control" name="slider_alt" id="validationServer01" placeholder="Image Alt">
                            <div class="pt-1">
                                @error('slider_alt')
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>
@endsection