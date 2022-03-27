@extends('admin.master_admin')

@section('content')

<div class="row p-3">
    <div class="col-lg-12">

        <div id="accordion2" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="headingFive">
                    <button class="btn btn-sm btn-info btn-link collapsed show " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Policy</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion2">
                    <div class="card-body">
                        <form method="POST" action="{{ empty($data) ? route('about.add') : route('about.edit', ['id' => $data->id ]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    @if(empty($data))
                                    <textarea name="about_us" id="summernote" cols="145" style="padding: 10px;"></textarea>
                                    @else
                                    <textarea name="about_us" id="summernote" cols="145" style="padding: 10px;">{{ $data->about_us }}</textarea>
                                    @endif
                                    <div class="pt-1">
                                        @error('about_us')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if(empty($data))
                                    <h3>Show Previous Image:</h3>
                                    <div class="custom-file mb-2">
                                        <input type="file" onchange="showPreview(event)" name="about_img" class="custom-file-input" accept="image/png, image/jpeg, image/jpg" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Image File Only.</label>
                                    </div>
                                    <div class="preview mt-3">
                                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px" />
                                    </div>
                                    @else
                                    <h6 class="pb-1">Previous Image:</h6>
                                    <div class="row pb-4">
                                        <div class="col-lg-12">
                                            <img src="{{ empty($data->about_img) ? asset('backend/assets/img/default-img.png') : asset($data->about_img) }}" class="img-thumbnail" alt="..." width="200px" height="200px">
                                        </div>
                                    </div>
                                    <h6 class="pb-1">Selected Image Preview:</h6>
                                    <div class="custom-file mb-2">
                                        <input type="file" onchange="showPreview(event)" name="about_img" class="custom-file-input" accept="image/png, image/jpeg, image/jpg" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose Image File Only.</label>
                                    </div>
                                    <div class="preview mt-3">
                                        <img class="img img-thumbnail" id="file-ip-1-preview" width="150px" height="80px" />
                                    </div>
                                    @endif
                                    <div class="pt-1">
                                        @error('about_img')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if(empty($data))
                            <button class="btn btn-success btn-sm" type="submit">Add</button>
                            @else
                            <button class="btn btn-info btn-sm" type="submit">Change</button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        // select2
        $('.js-sub-category-edit').select2();

        // summernote
        $('#summernote').summernote({
            height: "250",
        });
    });

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