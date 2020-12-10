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
                        <h1>Order Invoice</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Order Invoice
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
            <div class="col-md-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div>
                            <div class="float-left">
                                <p>Customr Name : <strong>{{ $order->name }}</strong></p>
                                <p>Customr Phone : <strong>{{ $order->phone }}</strong></p>
                                <p>Order Date : <strong>{{ $order->order_date }}</strong></p>

                                <p>Order Status : <strong><span class="badge badge-success">Success</span></strong></p>
                                <p>Order Code : {{ $order->order_code }}
                                    <?php echo DNS1D::getBarcodeHTML($order->order_code, 'C93'); ?>
                                </p>


                            </div>
                            <div class="float-right">
                                <p>Sub-total : <strong>{{ $order->total_amount }} Tk</strong></p>
                                <p>Vat : <strong>0.00 %</strong></p>
                                <p>Total : <strong>{{ $order->total_amount }} Tk</strong></p>



                            </div>
                        </div>

                        <div style="margin-top: 150px" class="datatable-wrapper table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Unit Cost</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->product_price }} Tk</td>
                                            <td>{{ $item->product_qty }}</td>
                                            <td>{{ $item->details_total_amount }} Tk</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <a target="_blank" href="{{ route('print.order.invoice',$order->order_id) }}" class="btn btn-primary float-right mt-3">Print Invoice</a>



                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>





@endsection

