@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Purchase Report</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{route('purchase.daily.report.pdf')}}" target="_blank">
                    @csrf
                    <!-- Purchase Date, Purchase No., supplier_name Section Start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Start Date</label>
                            <input type="date" class="form-control" name="start_date" required>
                            <div class="pt-1">
                                @error('start_date')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">End Date</label>
                            <input type="date" class="form-control" name="end_date" required>
                            <div class="pt-1">
                                @error('end_date')
                                <span class="text-danger"> {{$message}} </span>
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

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#categoryTable').DataTable();
    });
</script>
@endsection