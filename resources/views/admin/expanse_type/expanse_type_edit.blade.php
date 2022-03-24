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
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Edit Expanse Type</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('expanse.update', ['id' => $data->id]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Expanse Type Name</label>
                                    <input type="text" class="form-control" name="expanse_type" value="{{ $data->expanse_type }}" required>
                                    <div class="pt-1">
                                        @error('expanse_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" value="{{ $data->remarks }}" >
                                    <div class="pt-1">
                                        @error('remarks')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-sm" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection