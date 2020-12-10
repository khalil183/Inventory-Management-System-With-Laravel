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
                                <p>Customr Name : <strong>{{ $customer->name }}</strong></p>
                                <p>Customr Phone : <strong>{{ $customer->phone }}</strong></p>
                                <p>Order Date : <strong>{{ date('d-F-Y') }}</strong></p>

                                <p>Order Status : <strong><span class="badge badge-danger">Pending</span></strong></p>
                            </div>
                            <div class="float-right">
                                <p>Sub-total : <strong>{{ Cart::priceTotal() }} Tk</strong></p>
                                <p>Vat : <strong>0.00 %</strong></p>
                                <p>Total : <strong>{{ Cart::priceTotal() }} Tk</strong></p>


                            </div>
                        </div>

                        <div style="margin-top: 150px" class="datatable-wrapper table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Unit Cost</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contents as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td><img src="{{ url($item->options->image) }}" alt="product Image" width="80px"></td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->qty * $item->price }}</td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                        <button class="btn btn-primary float-right mt-3" data-toggle="modal" data-target="#paymentModal">Payment Invoice</button>



                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>


<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Total Amount : <span id="total">{{ Cart::priceTotal() }}</span> Tk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" id="payment_method" class="form-control" onchange="paymentMethod()">
                                <option value="HandCash">HandCash</option>
                                <option value="Due">Due</option>
                            </select>
                        </div>
                        <input type="hidden" value="{{ $customer->id }}" name="customer_id">
                        <div class="form-group">
                            <label for="payable_amount">Payable Amount</label>
                            <input type="text" id="payable_amount" name="payable_amount" oninput="amount()" class="form-control" placeholder="Payable Amount" required>
                        </div>
                        <div class="form-group">
                            <label for="due_amount">Due Amount</label>
                            <input type="text" id="due_amount" name="due_amount" class="form-control" placeholder="Due Amount" readonly>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Payment Confirm</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    function amount(){
        var payable=$("#payable_amount").val();
        var total=document.querySelector("#total").innerHTML;
        total=total.replace(/[^\d\.\-]/g,"");
        var due=total - payable;
        $("#due_amount").val(due)
    }

    function paymentMethod(){
        var pMethod=$("#payment_method").val();
        if(pMethod ==='HandCash'){
            $("#payable_amount").val('');
            document.getElementById("payable_amount").readOnly = false;
        }else{
            $("#payable_amount").val(0);
            document.getElementById("payable_amount").readOnly = true;
            var total=document.querySelector("#total").innerHTML;
            total=total.replace(/[^\d\.\-]/g,"");
            $("#due_amount").val(total)
        }


    }


</script>


@endsection

