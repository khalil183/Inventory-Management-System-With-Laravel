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
                        <h1>View Single Product</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    View Single Product
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
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <td>{{ $product->product_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Product Barcode</th>
                                                    <td>{{ $product->barcode }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Product Quantity</th>
                                                    <td>{{ $product->product_qty }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Purchase Price</th>
                                                    <td>{{ $product->purchase_price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Selling Price</th>
                                                    <td>{{ $product->selling_price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Purchase Date</th>
                                                    <td>{{ $product->purchase_date }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Product Status</th>
                                                    <td>
                                                        @if ($product->status==1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-Active</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Image</th>
                                                    <td>
                                                        <img src="{{ url($product->image) }}" alt="product Image" width="80px">
                                                    </td>
                                                </tr>










                                            </tbody>
                                        </table>
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
