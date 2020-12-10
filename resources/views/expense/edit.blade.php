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
                        <h1>Create Expense</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Create Expense
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                        <a href="{{ route('expense.index') }}" class="tooltip-wrapper btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title=" View EXpense" >
                            <i class="fe fe-eye btn btn-icon text-primary"></i>
                          View EXpense
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
                                        <form method="POST" action="{{ route('expense.update',$expense->expense_id) }}" >
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="expense_amount">Expense Amount</label>
                                                <input type="text" class="form-control" id="expense_amount" name="expense_amount" aria-describedby="emailHelp" placeholder="Expense Amount" value="{{ $expense->expense_amount }}" >
                                            </div>

                                            <div class="form-group">
                                                <label for="expense_details">Expense Details</label>
                                                <textarea name="expense_details" id="expense_details" cols="30" rows="5" class="form-control" placeholder="Type Somethings.." >{{ $expense->expense_details }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Expense Date</label>
                                                <input type="date" name="expense_date" class="form-control">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
