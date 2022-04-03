@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('designation.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Employee Designation</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('designation.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Employee Designation Name</label>
                            <input type="text" class="form-control" name="designation" value="{{$data->designation}}" id="validationServer01" placeholder="Employee Designation Name" required>
                            <div class="pt-1">
                                @error('designation')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Designation Short Name</label>
                            <input type="text" class="form-control" name="short_name" value="{{$data->short_name}}" id="validationServer01" placeholder="Designation Short Name" required>
                            <div class="pt-1">
                                @error('short_name')
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