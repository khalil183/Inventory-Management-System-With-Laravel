@extends('layouts.app')

@section('content')
<div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                    <div class="page-title mr-4 pr-4 border-right">
                        <h1>Create Product</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Create Product
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                        <a href="{{ route('product.index') }}" class="tooltip-wrapper btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="view Products" >
                            <i class="fe fe-eye btn btn-icon text-primary"></i>
                          View Prodcuts
                        </a>

                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
             <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger ">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li class="text-white">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="barcode">Product Barcode</label>
                                                <input type="text" class="form-control" id="barcode" name="barcode" aria-describedby="emailHelp" placeholder="Enter Barcode" value="{{ old('barcode') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name" value="{{ old('product_name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="purchase_price">Purchase Price</label>
                                                <input type="text" class="form-control" id="purchase_price" name="purchase_price" aria-describedby="emailHelp" placeholder="Enter Purchase Price" value="{{ old('purchase_price') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="selling_price">Selling Price</label>
                                                <input type="text" class="form-control" id="selling_price" name="selling_price" aria-describedby="emailHelp" placeholder="Enter Selling Price" value="{{ old('selling_price') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="product_quantity">Product Quantity</label>
                                                <input type="number" class="form-control" id="product_quantity" name="product_quantity" aria-describedby="emailHelp" placeholder="Enter Product Quantity" value="{{ old('product_qty') }}">
                                            </div>



                                            <div class="form-group ">
                                                <label for="purchase_date">Purchase Date</label>
                                                <input type="date" class="form-control" id="purchase_date" name="purchase_date" aria-describedby="emailHelp" placeholder="Enter Selling Price" value="{{ old('purchase_date') }}">
                                            </div>


                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" class="form-control" id="image" name="image" >
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
