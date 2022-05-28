@extends('admin.master_admin')
@section ('content')


<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('product.detail.add.page')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i> Add Product Details</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Product Details Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Images</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Details</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 0; @endphp

                        @foreach($data as $datum)

                        @php $count++; @endphp
                        <tr>
                            <td scope="row">{{ $count }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{$datum->id}}">
                                    Images
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$datum->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$datum->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{$datum->id}}">Product Images</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="continer">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="card p-1">
                                                                <div class="text-center">
                                                                    <label for="validationServer02">Product Image One</label>
                                                                </div>
                                                                <div class="text-center">
                                                                    <img src="{{ empty($datum->product_img_1) ? asset('backend/assets/img/default-img.png') : asset($datum->product_img_1) }}" alt="{{ $datum->product_alt_1 }}" width="160px" height="120px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card p-1">
                                                                <div class="text-center">
                                                                    <label for="validationServer02">Product Image Two</label>
                                                                </div>
                                                                <div class="text-center">
                                                                    <img src="{{ empty($datum->product_img_2) ? asset('backend/assets/img/default-img.png') : asset($datum->product_img_2) }}" alt="{{ $datum->product_alt_2 }}" width="160px" height="120px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card p-1 mt-4">
                                                                <div class="text-center">
                                                                    <label for="validationServer02">Product Image Three</label>
                                                                </div>

                                                                <div class="text-center">
                                                                    <img src="{{ empty($datum->product_img_3) ? asset('backend/assets/img/default-img.png') : asset($datum->product_img_3) }}" alt="{{ $datum->product_alt_3 }}" width="160px" height="120px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="card p-1 mt-4">
                                                                <div class="text-center">
                                                                    <label for="validationServer02">Product Image Four</label>
                                                                </div>

                                                                <div class="text-center">
                                                                    <img src="{{ empty($datum->product_img_4) ? asset('backend/assets/img/default-img.png') : asset($datum->product_img_4) }}" alt="{{ $datum->product_alt_4 }}" width="160px" height="120px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $datum->product_id }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('product.detail.display',[$datum->id]) }}">Details</a>
                            </td>
                            <td>
                                <a href="{{ route ('product.detail.status', ['id' => $datum -> id]) }}" class="btn btn-sm {{ $datum->status == 1 ? 'btn-info': 'btn-danger' }}"> {{ $datum->status == 1 ? 'Active': 'Deactive' }}</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>                                            
                                            <li class="p-1"><a href="{{ route('product.detail.edit.image', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit Image</a></li>
                                            <li class="p-1"><a href="{{ route('product.detail.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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