@extends('admin.master_admin')

@section('content')

<form method="POST" action="{{ route('product.detail.add') }}" enctype="multipart/form-data">
    @csrf
    <!-- Product Code Start -->
    <div class="row p-3">
        <div class="col-lg-12 mb-3">
            <label for="validationServer01">Product Code</label>
            <select class="form-control js-example-basic-single" name="product_id" required>
                <span class="text-danger" value=""> Product Code </span>
                <option value="">Product Code</option>

                @foreach($productlists as $productlist)
                <option value="{{ $productlist->product_id }}">{{ $productlist->title }}</option>
                @endforeach

            </select>

            <div class="pt-1">
                @error('product_id')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="validationServer01">Product Facebook Url</label>
            <input type="text" class="form-control form-control-sm" name="fb_url" placeholder="Product Facebook Url">
            <div class="pt-1">
                @error('fb_url')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <label for="validationServer01">Product WhatsApp Link</label>
            <input type="text" class="form-control form-control-sm" name="whatsapp_url" placeholder="Product WhatsApp Link">
            <div class="pt-1">
                @error('whatsapp_url')
                <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>
        </div>
    </div>
    <!-- Product Code End -->

    <div class="row p-3">
        <div class="col-lg-12">
            <div id="accordion2" class="accordion accordion-shadow">
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <a class="btn btn-sm btn-info btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <div class="card-header card-header-border-bottom">
                                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Short Description</h2>
                            </div>
                        </a>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion2">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="short_details" class="summernote" cols="145" style="padding: 10px;"></textarea>
                                    <div class="pt-1">
                                        @error('short_details')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row p-3">
        <div class="col-lg-12">
            <div id="accordionLong" class="accordion accordion-shadow">
                <div class="card">
                    <div class="card-header" id="headingLong">
                        <a class="btn btn-sm btn-info btn-link collapsed " data-toggle="collapse" data-target="#collapseLong" aria-expanded="false" aria-controls="collapseLong">
                            <div class="card-header card-header-border-bottom">
                                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Long Description</h2>
                            </div>
                        </a>
                    </div>
                    <div id="collapseLong" class="collapse" aria-labelledby="headingLong" data-parent="#accordionLong">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="long_details" class="summernote" cols="145" style="padding: 10px;"></textarea>
                                    <div class="pt-1">
                                        @error('long_details')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-lg-12">
            <div id="accordionFAQ" class="accordion accordion-shadow">
                <div class="card">
                    <div class="card-header" id="headingFAQ">
                        <a class="btn btn-sm btn-info btn-link collapsed " data-toggle="collapse" data-target="#collapseFAQ" aria-expanded="false" aria-controls="collapseFAQ">
                            <div class="card-header card-header-border-bottom">
                                <h2><i class="fa-solid fa-circle-plus text-danger"></i> FAQ</h2>
                            </div>
                        </a>
                    </div>
                    <div id="collapseFAQ" class="collapse" aria-labelledby="headingFAQ" data-parent="#accordionFAQ">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="faq" class="summernote" cols="145" style="padding: 10px;"></textarea>
                                    <div class="pt-1">
                                        @error('faq')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row p-3">
        <div class="col-lg-12">
            <div id="accordionWarranty" class="accordion accordion-shadow">
                <div class="card">
                    <div class="card-header" id="headingWarranty">
                        <a class="btn btn-sm btn-info btn-link collapsed " data-toggle="collapse" data-target="#collapseWarranty" aria-expanded="false" aria-controls="collapseWarranty">
                            <div class="card-header card-header-border-bottom">
                                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Warranty Policy</h2>
                            </div>
                        </a>
                    </div>
                    <div id="collapseWarranty" class="collapse" aria-labelledby="headingWarranty" data-parent="#accordionWarranty">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="warranty_policy" class="summernote" cols="145" style="padding: 10px;"></textarea>
                                    <div class="pt-1">
                                        @error('warranty_policy')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-lg-12">
            <div id="accordionImage" class="accordion accordion-shadow">
                <div class="card">
                    <div class="card-header" id="headingWarranty">
                        <a class="btn btn-sm btn-info btn-link collapsed show" data-toggle="collapse" data-target="#collapseImage" aria-expanded="false" aria-controls="collapseImage">
                            <div class="card-header card-header-border-bottom">
                                <h2><i class="fa-solid fa-circle-plus text-danger"></i> Product Images</h2>
                            </div>
                        </a>
                    </div>
                    <div id="collapseImage" class="collapse show" aria-labelledby="headingWarranty" data-parent="#accordionImage">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Product Details Image One Start -->
                                    <div class="row card m-1">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer02">Product Image One</label>
                                            <input type="file" class="form-control" name="product_img_1" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreviewImg1(event)">
                                            <div class="pt-1">
                                                @error('product_img_1')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                            <div class="preview">
                                                <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer01">Image Alt One</label>
                                            <input type="text" class="form-control" name="product_alt_1" id="validationServer01" placeholder="Image Alt One">
                                            <div class="pt-1">
                                                @error('product_alt_1')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Product Details Image One End -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- Product Details Image Two Start -->
                                    <div class="row card m-1">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer02">Product Image Two</label>
                                            <input type="file" class="form-control" name="product_img_2" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreviewImg2(event)">
                                            <div class="pt-1">
                                                @error('product_img_2')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                            <div class="preview">
                                                <img class="img img-thumbnail" id="file-ip-2-preview" width="150px" height="80px">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer01">Image Alt Two</label>
                                            <input type="text" class="form-control" name="product_alt_2" id="validationServer01" placeholder="Image Alt Two">
                                            <div class="pt-1">
                                                @error('product_alt_2')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Details Image Two End -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Product Details Image One Start -->
                                    <div class="row card m-1">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer02">Product Image Three</label>
                                            <input type="file" class="form-control" name="product_img_3" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreviewImg1(event)">
                                            <div class="pt-1">
                                                @error('product_img_3')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                            <div class="preview">
                                                <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer01">Image Alt Three</label>
                                            <input type="text" class="form-control" name="product_alt_3" id="validationServer01" placeholder="Image Alt One">
                                            <div class="pt-1">
                                                @error('product_alt_3')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Product Details Image One End -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- Product Details Image Two Start -->
                                    <div class="row card m-1">
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer02">Product Image Four</label>
                                            <input type="file" class="form-control" name="product_img_4" id="validationServer02" accept="image/png, image/jpg, image/jpeg" onchange="showPreviewImg2(event)">
                                            <div class="pt-1">
                                                @error('product_img_4')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                            <div class="preview">
                                                <img class="img img-thumbnail" id="file-ip-2-preview" width="150px" height="80px">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationServer01">Image Alt Four</label>
                                            <input type="text" class="form-control" name="product_alt_4" id="validationServer01" placeholder="Image Alt Two">
                                            <div class="pt-1">
                                                @error('product_alt_4')
                                                <span class="text-danger"> {{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Details Image Two End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-success btn-sm" type="submit">Add</button>
            </div>

        </div>
    </div>

</form>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // summernote
        $('.summernote').summernote({
            height: "250",
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
</script>
<script>
    function showPreviewImg1(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";

        }
    }

    function showPreviewImg2(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-2-preview");
            preview.src = src;
            preview.style.display = "block";

        }
    }
</script>
@endsection