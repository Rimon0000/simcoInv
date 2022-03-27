@extends('admin.master_admin')

@section('content')

<div class="row p-3">
    <div class="col-lg-12">

        <div id="accordion2" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="headingFive">
                    <button class="btn btn-sm btn-info btn-link collapsed show " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Terms & Conditions</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion2">
                    <div class="card-body">
                        <form method="POST" action="{{ empty($data) ? route('tnc.add') : route('tnc.edit', ['id' => $data->id ]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    @if(empty($data))
                                    <textarea name="tnc" id="summernote" cols="145" style="padding: 10px;"></textarea>
                                    @else
                                    <textarea name="tnc" id="summernote" cols="145" style="padding: 10px;">{{ $data->tnc }}</textarea>
                                    @endif
                                    <div class="pt-1">
                                        @error('tnc')
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