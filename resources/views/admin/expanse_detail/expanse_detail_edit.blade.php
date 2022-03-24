@extends('admin.master_admin')

@section('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('expanse.detail.show') }}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back </a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">

        <div id="accordion2" class="accordion accordion-shadow">
            <div class="card">
                <div class="card-header" id="headingFive">
                    <button class="btn btn-sm btn-info btn-link collapsed show " data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="card-header card-header-border-bottom">
                            <h2><i class="fa-solid fa-circle-plus text-danger"></i> Edit Expanse Detail</h2>
                        </div>
                    </button>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion2">
                    <div class="card-body">
                        <form method="POST" action="{{ route('expanse.detail.update', ['id' => $data->id]) }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Expanse Date</label>
                                    <input type="date" class="form-control" name="expanse_date" value="{{ $data->expanse_date }}" required>
                                    <div class="pt-1">
                                        @error('expanse_date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Expanse Name</label>
                                    <input type="text" class="form-control" name="expanse_name" placeholder="Expanse Name" value="{{ $data->expanse_name }}">
                                    <div class="pt-1">
                                        @error('expanse_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <select class="form-control js-example-basic-single" name="fixed_expanse">
                                        <option value="">Select Fixed Expanse Type</option>
                                        @foreach($expanse_types as $expanse_type)
                                        <option value="{{ $expanse_type->id }}" {{ ($data->fixed_expanse == $expanse_type->id) ? "Selected": "" }}> {{ $expanse_type->expanse_type  }} </option>
                                        @endforeach
                                    </select>
                                    <div class="pt-1">
                                        @error('fixed_expanse')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Amount</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Amount" value="{{ $data->amount }}">
                                    <div class="pt-1">
                                        @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationServer01">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" value="{{ $data->remarks }}">
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection