@extends('admin.master_admin')
@section('content')

<div class="content-wrapper">
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini  mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">9,503</h2>
                        <p>New Visitors Today</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">71,503</h2>
                        <p>Total Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">9,503</h2>
                        <p>Total Expanse</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <h2 class="mb-1">9,503</h2>
                        <p>Total Purchase</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Categories, subCategories, subsubcategory, brands start -->
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini">
                    <div class="card-body">
                        <p class="text-danger">Categories</p>
                        <h2 class="mb-1">{{ $categories }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini  mb-4">
                    <div class="card-body">
                        <p class="text-danger">Sub Categories</p>
                        <h2 class="mb-1">{{ $subCategories }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <p class="text-danger">Sub Sub Categories</p>
                        <h2 class="mb-1">{{ $subSubCategories }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <p class="text-danger">Brands</p>
                        <h2 class="mb-1">{{ $brands }}</h2>
                    </div>
                </div>
            </div>

        </div>
        <!-- Categories, subCategories, subsubcategory, brands end -->

        <!-- Product List, slider, coupons, campaign start -->
        <div class="row">
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini">
                    <div class="card-body">
                        <p class="text-danger">Product Lists</p>
                        <h2 class="mb-1">{{ $product_lists }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini  mb-4">
                    <div class="card-body">
                        <p class="text-danger">Sliders</p>
                        <h2 class="mb-1">{{ $sliders }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <p class="text-danger">Coupons</p>
                        <h2 class="mb-1">{{ $coupons }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card card-mini mb-4">
                    <div class="card-body">
                        <p class="text-danger">Campaign</p>
                        <h2 class="mb-1">{{ $campaign }}</h2>
                    </div>
                </div>
            </div>

        </div>
        <!-- Product List, slider, coupons, campaign end -->


    </div>

</div>

@endsection