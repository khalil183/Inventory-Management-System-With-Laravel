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
                        <h1>Proudct Table</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Proudct Table
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                        <a href="{{ route('product.create') }}" class="tooltip-wrapper btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="create Product" >
                            <i class="fe fe-edit btn btn-icon text-primary"></i>
                          Create Prodcut
                        </a>

                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
         <!-- begin row -->
         <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Barcode</th>
                                        <th>Image</th>
                                        <th>Purchase Price</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->barcode }}</td>
                                        <td><img src="{{ url($item->image) }}" alt="Product Image" width="80px"></td>
                                        <td>{{ $item->purchase_price }}</td>
                                        <td>{{ $item->selling_price }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td >
                                            <a href="{{ route('product.show',$item->id) }}"><span class="badge badge-success">view</span></a>
                                            <a href="{{ route('product.edit',$item->id) }}"><span class="badge badge-info">Edit</span></a>
                                            <a data-toggle="modal" data-target="#deleteModal"
                                            onclick="deleteData({{ $item->id }})"
                                            href="javascript:void(0)"><span class="badge badge-danger">Delete</span></a>



                                        </td>
                                    </tr>

                                    @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

<script>
    function deleteData(id){

        $("#deleteForm").attr("action",'{{ url("product/") }}'+"/"+id)
        console.log(id);
    }
</script>


@endsection
