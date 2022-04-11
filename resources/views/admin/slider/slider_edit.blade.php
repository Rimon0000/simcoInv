@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('slider.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Slider</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('slider.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Slider Name</label>
                            <input type="text" class="form-control" name="slider_name" value="{{$data->slider_name}}" id="validationServer01" placeholder="Slider Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Slider Sub Title</label>
                            <input type="text" class="form-control" name="slider_subtitle" value="{{$data->slider_subtitle}}" id="validationServer01" placeholder="Slider Sub Title" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Slider Text</label>
                            <input type="text" class="form-control" name="slider_text" value="{{$data->slider_text}}" id="validationServer01" placeholder="Slider Text" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Product Code</label>
                            <select class="form-control js-example-basic-single" name="product_code">
                                <span class="text-danger" value=""> Product Code </span>
                                <option value="">Product Code</option>

                                @foreach($productlists as $productlist)
                                <option value="{{ $productlist->product_id }}" {{ ($data->product_code == $productlist->product_id) ? "Selected":"" }}>{{ $productlist->title }}</option>
                                @endforeach
                            </select>

                            <div class="pt-1">
                                @error('product_code')
                                <span class="text-danger"> {{$message}} </span>
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