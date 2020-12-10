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
                        <h1>Daily Sales Report</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Daily Sales Report
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
            <div class="col-md-5">
                <div class="card card-statistics">
                    <div class="card-body">
                        <form action="{{ route('yearly.sales.report-search') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Search Year</label>
                                <input type="text" name="year" class="form-control" placeholder="{{ date('Y') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

         <!-- begin row -->
         <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">

                        @isset($year)
                            <h4 class="py-2 text-success">Sales Of  {{ $year }} : {{ $sell }} Tk</h4>

                            <h4 class="py-2 text-success">Profit Of  {{ $year }} : {{ $profit }} Tk</h4>
                        @else
                            <h4 class="py-2 text-success">Sales Of  {{ date('d-F-Y') }} : {{ $sell }} Tk</h4>

                            <h4 class="py-2 text-success">Profit Of  {{ date('d-F-Y') }} : {{ $profit }} Tk</h4>


                        @endisset
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Date</th>
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
                                            <td>{{ $item->product_price }}</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>{{ $item->details_total_amount }}</td>
                                            <td>{{ $item->details_date }}</td>
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


@endsection
