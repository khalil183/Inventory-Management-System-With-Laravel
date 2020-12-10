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
                        <h1>Monthly Expense Report</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Monthly Expense Report
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
                        <form action="{{ route('monthly.expens.report.search') }}" method="post">
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

         <!-- begin row -->
         <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">

                        @isset($month)
                            <h4 class="py-2">Expense Of  {{ $month }} : {{ $total }} Tk</h4>
                        @else
                            <h4 class="py-2">Expense Of  {{ date('F-Y') }} : {{ $total }} Tk</h4>
                        @endisset
                        <div class="datatable-wrapper table-responsive">
                            <table id="datatable" class="display compact table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Amount</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($expenses as $item)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $item->expense_amount }}</td>
                                            <td>{{ $item->expense_details }}</td>
                                            <td>{{ $item->expense_date }}</td>
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
