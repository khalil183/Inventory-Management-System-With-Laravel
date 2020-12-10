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
                        <h1>Expense Table</h1>
                    </div>
                    <div class="breadcrumb-bar align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Expense Table
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Default</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                        <a href="{{ route('expense.create') }}" class="tooltip-wrapper btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create EXpense" >
                            <i class="fe fe-edit btn btn-icon text-primary"></i>
                          Create EXpense
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
                                        <th>Amount</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($expenses as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->expense_amount }}</td>
                                        <td>{{ $item->expense_details }}</td>
                                        <td>{{ $item->expense_date }}</td>
                                        <td >
                                            <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteModal"
                                            onclick="deleteData({{ $item->expense_id }})">Delete</a>
                                            <a class="btn btn-success btn-sm" href="{{ route('expense.edit',$item->expense_id) }}">Edit</a>
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

        $("#deleteForm").attr("action",'{{ url("expense/") }}'+"/"+id)
        console.log(id);
    }
</script>
@endsection
