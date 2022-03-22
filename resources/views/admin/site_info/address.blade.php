@extends('admin.master_admin')

@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('address.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>{{ empty($data) ? 'Add' : 'Edit' }} Address</h2>
            </div>
            <div class="card-body">


                <form method="POST" action="{{ empty($data) ?  route('address.add') : route('address.edit', ['id' => $data->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Address</label>
                            <textarea class="form-control" name="address" rows="3" required> {{ empty($data) ? "" : $data->address }} </textarea>
                            <div class="pt-1">
                                @error('address')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Mobile</label>
                            <input type="text" class="form-control" name="mobile" value="{{ empty($data) ? "" : $data->mobile }}" id="validationServer01" placeholder="Mobile" required>
                            <div class="pt-1">
                                @error('mobile')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Hot Line</label>
                            <input type="text" class="form-control" name="hotline" value="{{ empty($data) ? "" : $data->hotline }}" id="validationServer01" placeholder="Hot Line">
                            <div class="pt-1">
                                @error('hotline')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ empty($data) ? "" : $data->email }}" placeholder="Email" required>
                            <div class="pt-1">
                                @error('email')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if(empty($data))
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                    @else
                    <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>


@endsection