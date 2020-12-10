<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Personal</li>
            <li><a href="{{
            url('/dashboard') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title"><strong>Dashboard</strong></span></a> </li>
            <li><a href="{{
            route('pos.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title"><strong>POS</strong></span></a> </li>

            <li><a href="{{
            route('product.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Manage Product</span></a> </li>
            <li><a href="{{
            route('customer.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Manage Customer</span></a> </li>
            <li><a href="{{
            route('order.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Manage Order</span></a> </li>
            <li><a href="{{
            route('payment.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Payment History</span></a> </li>
            <li><a href="{{
            route('expense.index') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Manage Expense</span></a> </li>
            <li><a target="_blank" href="{{
            route('barcode') }}" aria-expanded="false"><i class="nav-icon ti ti-comment"></i><span class="nav-title">Generate Barcode</span></a> </li>

            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-calendar"></i><span class="nav-title">Expense Report</span></a>
                <ul aria-expanded="false">
                    <li> <a href='{{ route('daily.expens.report') }}'>Daily Expense Report</a> </li>
                    <li> <a href='{{ route('monthly.expens.report') }}'>Monthly Expense Report</a> </li>
                    <li> <a href='{{ route('yearly.expens.report') }}'>Yearly Expense Report</a> </li>

                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-calendar"></i><span class="nav-title">Sales Report</span></a>
                <ul aria-expanded="false">
                    <li> <a href='{{ route('daily.sales.report') }}'>Daily Sales Report</a> </li>
                    <li> <a href='{{ route('monthly.sales.report') }}'>Monthly Sales Report</a> </li>
                    <li> <a href='{{ route('yearly.sales.report') }}'>Yearly Sales Report</a> </li>

                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="nav-icon ti ti-calendar"></i><span class="nav-title">Final Report</span></a>
                <ul aria-expanded="false">
                    <li> <a href='{{ route('daily.profit.report') }}'>Daily Report</a> </li>
                    <li> <a href='{{ route('monthly.profit.report') }}'>Monthly Report</a> </li>
                    <li> <a href='{{ route('yearly.profit.report') }}'>Yearly Report</a> </li>

                </ul>
            </li>


        </ul>
    </div>
