@extends('admin.master_admin')

@section ('content')

<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('faq.show')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-left text-dark"></i> Back</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Edit Faq</h2>
            </div>
            <div class="card-body">


                <form method="POST" action="{{ route('faq.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Question</label>
                            <input type="text" class="form-control" name="question" value="{{ $data->question }}" id="validationServer01" placeholder="question" required>
                            <div class="pt-1">
                                @error('question')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationServer01">Answer</label>
                            <textarea class="form-control" name="answer" rows="3" required>{{ $data->answer }}" </textarea>
                            <div class="pt-1">
                                @error('answer')
                                <span class="text-danger"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection