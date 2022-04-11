@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('campaign.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i>Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Campaign</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('campaign.update', ['id'=> $data->id])}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Campaign Name</label>
                            <input type="text" class="form-control" name="title" value="{{$data->title}}" id="validationServer01" placeholder="Campaign Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Start Date</label>
                            <input type="date" class="form-control" name="start_date" value="{{$data->start_date}}" id="validationServer01" placeholder="Start Date" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">End Date</label>
                            <input type="date" class="form-control" name="end_date" value="{{$data->end_date}}" id="validationServer01" placeholder="End Date" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Discount</label>
                            <input type="text" class="form-control" name="discount" value="{{$data->discount}}" id="validationServer01" placeholder="Discount" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Month</label>
                            <input type="text" class="form-control" name="month" value="{{$data->month}}" id="validationServer01" placeholder="Month" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Year</label>
                            <input type="text" class="form-control" name="year" value="{{$data->year}}" id="validationServer01" placeholder="Year" required>
                            <div class="valid-feedback">
                                Looks good!
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