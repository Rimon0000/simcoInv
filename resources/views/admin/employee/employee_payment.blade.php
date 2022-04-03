@extends("admin.master_admin")

@section("content")

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route('employee.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back </a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">

                <h2> <i class="fa-solid fa-circle-plus text-danger"></i> Employee Pay Salary</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('employee.add') }}">
                    @csrf

                    <!-- Employee id and name start -->
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Employee ID</label>
                            <input type="text" name="emp_id" class="form-control" value="{{ $data->emp_id }}" readonly>
                            <div class="pt-1">
                                @error('emp_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Employee Name</label>
                            <input type="text" name="emp_name" class="form-control" value="{{ $data->emp_name }}" readonly>
                            <div class="pt-1">
                                @error('emp_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee id and name end -->

                    <!-- Employee Joint Date, Salary start -->
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Advance Payment</label>
                            <input type="number" name="salary" class="form-control" value="{{ $data->adv_salary }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Instalment Payment</label>
                            <input type="number" name="install_payment" class="form-control" value="{{ $data->install_payment }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationServer01">Salary</label>
                            <input type="number" name="salary" class="form-control" value="{{ $data->salary }}" readonly>
                        </div>
                    </div>
                    <!-- Employee Joint Date, Salary end -->
                    <hr>

                    <!-- Employee Month, Payment start -->
                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Payment Date</label>
                            <input type="date" name="payment_date" class="form-control" id="validationServer01" required>
                            <div class="pt-1">
                                @error('payment_date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Month</label>
                            <select class="form-control js-example-basic-single" name="month">
                                <option value="">Select Month</option>
                                <option value="Jan">Jan</option>
                                <option value="Feb">Feb</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                            </select>

                            <div class="pt-1">
                                @error('month')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer01">Payment</label>
                            <input type="text" name="payment" class="form-control" id="validationServer01" value="{{ (empty($data->instal_payment)) ? $data->salary - $data->adv_salary : $data->salary - $data->instal_payment }}" placeholder="Payment" required>
                            <div class="pt-1">
                                @error('nid')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Employee Month, Payment end -->

                    <hr>
                    <button class="btn btn-primary btn-sm" type="submit">Pay</button>
                </form>
            </div>
        </div>
    </div>
</div>

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