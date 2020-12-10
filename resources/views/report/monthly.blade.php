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
                        <h1>Monthly Report</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Monthly Report
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
                        <form action="{{ route('monthly.profit.report-search') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Month</label>
                                        <select name="month" class="form-control" id="" required>
                                            <option value="">Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control" placeholder="{{ date('Y') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        @isset ($month)
            <h2 class="text-success py-2">Report Of {{ $month }} :</h2>
        @else
            <h2 class="text-success py-2">Report Of {{ date('F')  }} Month :</h2>

        @endisset

         <!-- begin row -->
         <div class="row" style="opacity: .8">
            <div class="col-lg-3">
                <div class="card card-statistics bg-orange rounded">
                    <div class="card-body py-4 text-center">
                        <h3 class="text-white">Total Sales</h3>
                        <h4 class="text-white">{{ $sell }} Tk</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-statistics bg-danger rounded">
                    <div class="card-body py-4 text-center">
                        <h3 class="text-white">Total Expense</h3>
                        <h4 class="text-white">{{ $expense }} Tk</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-statistics bg-cyan rounded">
                    <div class="card-body py-4 text-center">
                        <h3 >Total Profit</h3>
                        @if ($profit>=1)
                            <h4 >{{ $profit }} Tk</h4>
                        @else
                            <h4 >0.00 Tk</h4>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card card-statistics bg-warning rounded">
                    <div class="card-body py-4 text-center">
                        <h3 >Total Loss</h3>
                        @if ($profit<1)
                            <h4 >{{ $expense - $sell }} Tk</h4>
                        @else
                            <h4 >0.00 Tk</h4>
                        @endif
                    </div>
                </div>
            </div>







        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>


@endsection
