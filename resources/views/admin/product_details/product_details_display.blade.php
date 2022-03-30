@extends('admin.master_admin')

@section('content')

<div class="row p-3 ml-3">
    <div class="col-lg-12">
        <div id="accordion2" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="headingFive">
                    <button class="btn btn-sm btn-info btn-link collapsed " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Short Product Details</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('policy.edit', ['id' => $data->id ]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="policy" id="summernote" cols="145" style="padding: 10px;">{{ $data->short_details }}</textarea>
                                    <div class="pt-1">
                                        @error('policy')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-sm" type="submit">Change</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row p-3 ml-3">
    <div class="col-lg-12">

        <div id="accordion3" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="headingSix">
                    <button class="btn btn-sm btn-info btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Long Product Details</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('policy.edit', ['id' => $data->id ]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="policy" id="summernote2" cols="145" style="padding: 10px;">{{ $data->short_details }}</textarea>
                                    <div class="pt-1">
                                        @error('policy')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-sm" type="submit">Change</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row p-3 ml-3">
    <div class="col-lg-12">

        <div id="accordion4" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="heading7">
                    <button class="btn btn-sm btn-info btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> FAQ Details</h2>
                        </div>
                    </button>
                </div>
                <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('policy.edit', ['id' => $data->id ]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="policy" id="summernote3" cols="145" style="padding: 10px;">{{ $data->faq }}</textarea>
                                    <div class="pt-1">
                                        @error('policy')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-sm" type="submit">Change</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row p-3 ml-3">
    <div class="col-lg-12">

        <div id="accordion5" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="heading8">
                    <button class="btn btn-sm btn-info btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Warranty Policy Details</h2>
                        </div>
                    </button>
                </div>
                <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion5">
                    <div class="card-body">
                        <form method="POST" action="{{ route('policy.edit', ['id' => $data->id ]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <textarea name="policy" id="summernote4" cols="145" style="padding: 10px;">{{ $data->faq }}</textarea>
                                    <div class="pt-1">
                                        @error('policy')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-info btn-sm" type="submit">Change</button>

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

        // short details summernote
        $('#summernote').summernote({
            height: "250",
        });

        // long details summernote
        $('#summernote2').summernote({
            height: "250",
        });

        // FAQ summernote
        $('#summernote3').summernote({
            height: "250",
        });

        // Warranty summernote
        $('#summernote4').summernote({
            height: "250",
        });
    });
</script>
@endsection