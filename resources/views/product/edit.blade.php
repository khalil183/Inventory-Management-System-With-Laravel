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
                        <h1>Edit Product Product</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Edit Product Product
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
                                        <form method="POST" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="barcode">Product Barcode</label>
                                                <input type="text" class="form-control" id="barcode" name="barcode" aria-describedby="emailHelp" placeholder="Enter Barcode" value="{{ $product->barcode }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name" value="{{ $product->product_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="purchase_price">Purchase Price</label>
                                                <input type="text" class="form-control" id="purchase_price" name="purchase_price" aria-describedby="emailHelp" placeholder="Enter Purchase Price" value="{{ $product->purchase_price }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="selling_price">Selling Price</label>
                                                <input type="text" class="form-control" id="selling_price" name="selling_price" aria-describedby="emailHelp" placeholder="Enter Selling Price" value="{{ $product->selling_price }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="product_quantity">Product Quantity</label>
                                                <input type="number" class="form-control" id="product_quantity" name="product_quantity" aria-describedby="emailHelp" placeholder="Enter Product Quantity" value="{{ $product->product_qty }}">
                                            </div>



                                            <div class="form-group">
                                                <label for="purchase_date">Purchase Date</label>
                                                <input type="date" class="form-control" id="purchase_date" name="purchase_date" aria-describedby="emailHelp" value="{{ $product->purchase_date }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="new_image">New Image</label>
                                                <input type="file" class="form-control" id="new_image" name="new_image" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Old Image</label>
                                                <img class="img-thumbnail" src="{{ url($product->image) }}" alt="product image" width="100px">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
        <!-- event Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="verticalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticalCenterTitle">Add New Event</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="modelemail">Event Name</label>
                                <input type="email" class="form-control" id="modelemail">
                            </div>
                            <div class="form-group">
                                <label>Choose Event Color</label>
                                <select class="form-control">
                                    <option>Primary</option>
                                    <option>Warning</option>
                                    <option>Success</option>
                                    <option>Danger</option>
                                </select>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container-fluid -->
</div>
@endsection
