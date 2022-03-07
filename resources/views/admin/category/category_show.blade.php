@extends('admin.master_admin')
@section ('content')

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Category Table</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Image</th>
                            <th scope="col">Category Nmae</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Lucia</td>
                            <td>Christ</td>
                            <td>@Lucia</td>
                            <td>@Lucia</td>

                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


@endsection