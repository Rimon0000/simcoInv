@extends('admin.master_admin')

@section('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('expanse.show') }}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back </a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div id="accordion2" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="headingFive">
                    <button class="btn btn-sm btn-info btn-link collapsed show " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Add Expanse Type</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('expanse.add') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Expanse Type</label>
                                    <input type="text" class="form-control" name="expanse_type" placeholder="Expanse Type" required>
                                    <div class="pt-1">
                                        @error('expanse_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" placeholder="Remarks">
                                    <div class="pt-1">
                                        @error('remarks')
                                        <span class="text-danger">{{ $message }}</span>
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
    </div>
</div>

@endsection
@section('scripts')
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