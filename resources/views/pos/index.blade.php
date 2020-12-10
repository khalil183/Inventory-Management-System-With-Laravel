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
                        <h1>POS System</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    POS System
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
         <!-- begin row -->
         <div class="row">
            <div class="col-md-6">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered table-orange">
                                <thead>
                                    <tr>
                                        <th class="w-20">Name</th>
                                        <th class="w-20">Barcode</th>
                                        <th class="w-20">Qty</th>
                                        <th class="w-20">Price</th>
                                        <th class="w-20">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                    <tr>
                                        <td >{{ $item->product_name }}</td>
                                        <td >{{ $item->barcode }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td >{{ $item->selling_price }}</td>
                                        <td >
                                            <form action="{{ route('pos.store') }}" method="POST" >
                                                @csrf
                                                <input style="width: 40px" type="number" name="qty" value="1">
                                                <input type="hidden" name="barcode" value="{{ $item->barcode }}">
                                                <button style="width: 50px" type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            </form>
                                        </td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                            <table class="table table-bordered table-striped table-pink">
                                <thead>
                                    <tr>
                                        <th class="w-20">Name</th>
                                        <th class="w-20">Barcode</th>
                                        <th class="w-20">Quantity</th>
                                        <th class="w-20">Price</th>
                                        <th class="w-20">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->options->barcode }}</td>
                                            <td>
                                                <form action="{{ route('pos.update',$item->rowId) }}" method="POST" >
                                                    @csrf
                                                    @method('PUT')
                                                    <input style="width: 50px" type="number" name="qty" value="{{ $item->qty }}">
                                                    <input type="hidden" name="barcode" value="{{ $item->options->barcode }}" id="">
                                                    <button style="width: 50px" type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            <td>{{ $item->qty * $item->price }} Tk</td>
                                            <td>
                                                <form action="{{ route('pos.destroy',$item->rowId) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td colspan="2">{{ Cart::priceTotal() }} Tk</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    </div>
                    <!-- start selects row -->
                    <div class="row select-wrapper">
                        <div class="col-md-12 col-12 selects-contant">
                            <div class="row">
                                <div class="col-md-12 col-12 selects-contant">
                                    <div class="card card-statistics">
                                        <div class="card-header">
                                            <div class="card-heading">
                                                <h4 class="card-title">Select Customer <button class="btn btn-primary pull-right float-right" data-toggle="modal" data-target="#addCustomer">Create Customer</button></h4>

                                            </div>
                                        </div>
                                        @php
                                            $customers=DB::table('customers')->get();
                                        @endphp
                                        <div class="card-body">
                                            <form action="{{ route('view-invoice') }}" method="POST">
                                                @csrf
                                                <div class="form-group mb-0">
                                                    <select class="js-basic-single form-control" name="customer_name" required>
                                                        <option value="">Select Customer</option>
                                                        @foreach ($customers as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}-({{ $item->phone }})</option>

                                                        @endforeach

                                                    </select>
                                                    @error('customer_name')
                                                        <span class="text-danger mt-2">{{ $errors->first('customer_name') }}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-success mt-3">Create Invoice</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end selects row -->
                </div>

            </div>

        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

<!-- Modal -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Add New Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger ">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container-fluid">
                    <form method="POST" action="{{ route('customer.store') }}" >
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Customer Name" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Customer Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Customer Phone" value="{{ old('phone') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>


@endsection

