@extends('admin.master_admin')
@section ('content')


<div class="row p-3">
    <div class="col-lg-6">
        <a href="{{ route ('product.list.add.page')}}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-plus text-danger"></i> Add Product List</a>
    </div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Product List Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="categoryTable" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Buy Price</th>
                            <th scope="col">Sale Price</th>
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
                            <td><img src="{{ $datum->product_img == null ? asset('backend/assets/img/default-img.png') : asset($datum->product_img) }}" alt="default image" width="60px" height="40px"></td>
                            <td>{{ $datum->product_id }}</td>
                            <td>{{ $datum->title}}</td>
                            <td>{{ $datum->price}}</td>
                            <td>{{ $datum->sale_price}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{$datum->id}}">
                                    Details
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$datum->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$datum->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel{{$datum->id}}">Product Listing Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Discount Price:</em></th>
                                                            <td scope="col">{{ $datum->discount_price }}</td>
                                                            <th scope="col"><em>Discount Percent</em></th>
                                                            <td scope="col">{{ $datum->discount_percent }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Category</em></th>
                                                            <td scope="col">{{ $datum->category }}</td>
                                                            <th scope="col"><em>Sub Category</em></th>
                                                            <td scope="col">{{ $datum->sub_category }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Sub Category Two </em></th>
                                                            <td scope="col">{{ $datum->sub_sub_category }}</td>
                                                            <th scope="col"><em>Brand</em></th>
                                                            <td scope="col">{{ $datum->brand }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Display Section</em></th>
                                                            <td scope="col">{{ $datum->display_section }}</td>
                                                            <th scope="col"><em>Origin</em></th>
                                                            <td scope="col">{{ $datum->origin }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Color</em></th>
                                                            <td scope="col">{{ $datum->color }}</td>
                                                            <th scope="col"><em>Size</em></th>
                                                            <td scope="col">{{ $datum->size }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Pcs</em></th>
                                                            <td scope="col">{{ $datum->pcs }}</td>
                                                            <th scope="col"><em>Weight</em></th>
                                                            <td scope="col">{{ $datum->weight }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Stock</em></th>
                                                            <td scope="col">{{ $datum->stock }}</td>
                                                            <th scope="col"><em>Alert Stock</em></th>
                                                            <td scope="col" style="color: red;">{{ $datum->alert_stock }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Unit</em></th>
                                                            <td scope="col">{{ $datum->unit }}</td>
                                                            <th scope="col"><em>Bar Code</em></th>
                                                            <td scope="col">{{ $datum->bar_code }}</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Tax</em></th>
                                                            <td scope="col">{{ $datum->tax }}</td>
                                                            <th scope="col"><em>Variation Swatch</em></th>
                                                            <td scope="col">{{ $datum->variation_swatch }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Tags</em></th>
                                                            <td colspan="3">{{ $datum->tags }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col"><em>Promotion</em></th>
                                                            <td colspan="3">{{ $datum->promotion }}</td>
                                                        </tr>

                                                    </thead>
                                                </table>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td><a href="{{ route ('product.list.status', ['id' => $datum -> id]) }}" class="btn btn-sm {{ $datum->status == 1 ? 'btn-info': 'btn-danger' }}"> {{ $datum->status == 1 ? 'Active': 'Deactive' }}</a></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        More..
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="p-1"><a href="{{ route('product.list.edit', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit</a></li>
                                            <li class="p-1"><a href="{{ route('product.list.edit.image', ['id' => $datum->id]) }}" class="btn btn-sm btn-warning">Edit Image</a></li>
                                            <li class="p-1"><a href="{{ route('product.list.delete', ['id' => $datum->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger">Delete</a></li>

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