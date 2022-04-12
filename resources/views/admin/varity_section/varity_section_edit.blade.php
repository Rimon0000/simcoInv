@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('displaysection.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Varity Section</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('displaysection.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Varity Section Name</label>
                            <input type="text" class="form-control" name="display_section" value="{{$data->display_section}}" id="validationServer01" placeholder="Varity Section Name" required>
                            <div class="pt-1">
                                @error('display_section')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Display</label>
                            <select class="form-control js-sub-category-edit" name="display">
                                <option value="1" {{ ($data->cat_id == 'Yes') ? "Selected":"" }}>Yes</option>
                                <option value="0" {{ ($data->cat_id == 'No') ? "Selected":"" }}>No</option>
                            </select>

                            <div class="pt-1">
                                @error('display')
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
        $('.js-sub-category-edit').select2();
    });
</script>
@endsection