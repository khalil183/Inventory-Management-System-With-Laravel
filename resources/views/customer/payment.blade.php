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
                        <h1>Customer Payment</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Customer Payment
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                        <a href="{{ route('customer.index') }}" class="tooltip-wrapper btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Customers" >
                            <i class="fe fe-eye btn btn-icon text-primary"></i>
                          View Customers
                        </a>

                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
             <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
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
                                        <form target="_blank" method="POST" action="{{ route('payment.store') }}" >
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Customer Name</label>
                                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Customer Name" value="{{ $customer->name }}" readonly>
                                            </div>
                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">

                                            <div class="form-group">
                                                <label for="total_due">Total Due</label>
                                                <input type="text" class="form-control" id="total_due" name="total_due" value="{{ $customer->due }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="payable_amount">Payable Amount</label>
                                                <input type="number" name="payable_amount" id="payable_amount" class="form-control" oninput="payment()" placeholder="Payment Here" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="update_due">Update Due</label>
                                                <input type="text" name="update_due" id="update_due" class="form-control" readonly>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Payment</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

<script>
    function payment(){
        var pay=$("#payable_amount").val();
        var totalDue=$("#total_due").val();
        var updateDue=totalDue - pay;
        $("#update_due").val(updateDue);


    }
</script>
@endsection
