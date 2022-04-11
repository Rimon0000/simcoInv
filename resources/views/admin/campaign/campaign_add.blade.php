@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('campaign.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Campaign</h2>
            </div>
            <div class="card-body">


                <form method="POST" action="{{route('campaign.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Campaign Name</label>
                            <input type="text" class="form-control" name="title" id="validationServer01" placeholder="Campaign Name" required>
                            <div class="pt-1">
                                @error('title')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Campaign Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="validationServer01" placeholder="Campaign Start Date" required>
                            <div class="pt-1">
                                @error('start_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Campaign End Date</label>
                            <input type="date" class="form-control" name="end_date" id="validationServer01" placeholder="Campaign end Date" required>
                            <div class="pt-1">
                                @error('end_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer02">Campaign Image</label>
                            <input type="file" class="form-control" name="camp_img" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event)">
                            <div class="pt-1">
                                @error('camp_img')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                            <div class="preview">
                                <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Image Alt</label>
                            <input type="text" class="form-control" name="product_img_alt" id="validationServer01" placeholder="Image Alt">
                            <div class="pt-1">
                                @error('product_img_alt_1')
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