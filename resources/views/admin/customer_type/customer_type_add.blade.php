@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('customer.type.show')}}" class="btn btn-info btn-sm"> <i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

 <div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Add Customer Type</h2>
            </div>
            <div class="card-body">


                <form method="POST" action="{{route('customer.type.add')}}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Customer Type Name</label>
                            <input type="text" class="form-control" name="customer_type" id="validationServer01" placeholder="Customer Type Name" required>
                            <div class="pt-1">
                                @error('customer_type')
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