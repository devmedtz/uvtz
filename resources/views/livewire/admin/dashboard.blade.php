<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>


    <!-- start page title -->
    <div class="row">
        <div class="col-xxl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        {{-- <button type="button" class="btn btn-sm btn-light">View</button> --}}
                    </div>
                    <h6 class="text-muted text-uppercase mt-0" title="Revenue">Total Customer</h6>
                    <h3 class="mb-4 mt-2">{{number_format($customerCount)}}</h3>
                    <div id="spark1" class="apex-charts mb-3" data-colors="#734CEA"></div>

                    <div class="row text-center">
                        <div class="col-6">
                            <h6 class="text-truncate d-block">New Last Month</h6>
                            <p class="font-18 mb-0 text-success">{{number_format($custLatMon)}}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-truncate d-block">New This Month</h6>
                            <p class="font-18 mb-0 text-success">{{number_format($custThisMon)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
        <div class="col-xxl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        {{-- <button type="button" class="btn btn-sm btn-light">View</button> --}}
                    </div>
                    <h6 class="text-muted text-uppercase mt-0" title="Revenue">Revenue Today</h6>
                    <h3 class="mb-4 mt-2">{{number_format($orderToday)}}</h3>
                    <div id="spark2" class="apex-charts mb-3" data-colors="#34bfa3"></div>

                    <div class="row text-center">
                        <div class="col-6">
                            <h6 class="text-truncate d-block">Yesterday</h6>
                            {{-- <p class="font-18 mb-0 text-success">{{number_format($orderYesterday)}}</p> --}}
                            <p class="font-18 mb-0 text-success">{{$orderYesterday}}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-truncate d-block">Before Yesterday</h6>
                            <p class="font-18 mb-0 text-success">{{number_format($orderYesterday2)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
        <div class="col-xxl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        {{-- <button type="button" class="btn btn-sm btn-light">View</button> --}}
                    </div>
                    <h6 class="text-muted text-uppercase mt-0" title="Revenue">Revenue This Week</h6>
                    <h3 class="mb-4 mt-2">{{number_format($orderThisWeek)}}</h3>
                    <div id="spark3" class="apex-charts mb-3" data-colors="#f4516c"></div>

                    <div class="row text-center">
                        <div class="col-6">
                            <h6 class="text-truncate d-block">Last Week</h6>
                            <p class="font-18 mb-0 text-success">{{number_format($orderLastWeek)}}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-truncate d-block">Last Last Week</h6>
                            <p class="font-18 mb-0 text-success">{{number_format($orderLastWeek2)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
        <div class="col-xxl-3 col-lg-6">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        {{-- <button type="button" class="btn btn-sm btn-light">View</button> --}}
                    </div>
                    <h6 class="text-muted text-uppercase mt-0" title="Revenue">Revenue This Month</h6>
                    <h3 class="mb-4 mt-2">{{number_format($orderThisMonth)}}</h3>
                    <div id="spark4" class="apex-charts mb-3" data-colors="#00c5dc"></div>

                    <div class="row text-center">
                        <div class="col-6">
                            <h6 class="text-truncate d-block">Last Month</h6>
                            <p class="font-18 mb-0 text-success">{{number_format($orderLastMonth)}}</p>
                        </div>
                        <div class="col-6">
                            <h6 class="text-truncate d-block">Last Last Month</h6>
                            <p class="font-18 mb-0 text-success ">{{number_format($orderLastMonth2)}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                        </div>
                    </div>
                    <h4 class="header-title mb-4">Expenses</h4>

                    <div class="my-4 chartjs-chart" style="height: 202px;">
                        <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                    </div>

                    <div class="row text-center mt-2 py-2">
                        <div class="col-4">
                            <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>64%</span>
                            </h3>
                            <p class="text-muted mb-0">Completed</p>
                        </div>
                        <div class="col-4">
                            <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>26%</span>
                            </h3>
                            <p class="text-muted mb-0"> In-progress</p>
                        </div>
                        <div class="col-4">
                            <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>10%</span>
                            </h3>
                            <p class="text-muted mb-0"> Behind</p>
                        </div>
                    </div>
                    <!-- end row-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <div class="col-lg-8">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                        <h4 class="header-title mb-4">Tasks Overview</h4>

                        <div dir="ltr">
                            <div class="mt-3 chartjs-chart" style="height: 320px;">
                                <canvas id="task-area-chart" data-bgcolor="#727cf5" data-bordercolor="#727cf5"></canvas>
                            </div>
                        </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->


    <!-- end page title -->
    @role('Admin|Accountant|Manager')
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Expenses</h5>
                            <h3 class="mt-3 mb-3">{{$expensesToday}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Today</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Expenses</h5>
                            <h3 class="mt-3 mb-3">{{number_format($expensesThisWeek)}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">This Week</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Expenses</h5>
                            <h3 class="mt-3 mb-3">{{number_format($expensesThisMonth)}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">This Month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Expenses</h5>
                            <h3 class="mt-3 mb-3">{{number_format($expensesThisMonth2)}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Last Last Month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div> <!-- end col -->

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Revenue Vs Expenses this Year</h4>
                    <div class="chart-content">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <p class="text-muted mb-0 mt-3">Revenue</p>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                    <span>{{number_format($orderThisYear)}}</span>
                                </h2>
                            </div>
                            <div class="col-md-12">
                                <p class="text-muted mb-0 mt-3">Expenses</p>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-danger align-middle me-1"></small>
                                    <span>{{number_format($expensesThisYear)}}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Available Products</h4>
                    <div class="chart-widget-list">
                        <p>
                        @foreach($availableProducts as $products)
                            <p>
                                <i class="mdi mdi-square text-primary"></i> {{$products->product_name}}
                                <span class="float-end">{{$products->product_quantity}} pc(s)</span>
                            </p>
                            @endforeach
                            </p>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-2 mb-3">Current Order</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-sm table-nowrap table-hover mb-0">
                            <thead>
                                <tr>
                                    <th><span class="text-muted font-13">Order No</span></th>
                                    <th><span class="text-muted font-13">Customer</span></th>
                                    <th><span class="text-muted font-13">Amount</span></th>
                                    <th><span class="text-muted font-13">Paid</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestOrders as $latestOrder)
                                    <tr>
                                        <td>
                                            <h5 class="font-14 my-1 fw-normal">{{$latestOrder->inv_no}}</h5>
{{--                                            <span class="text-muted font-13">07 April 2018</span>--}}
                                        </td>
                                        <td>
                                            <h5 class="font-14 my-1 fw-normal">{{$latestOrder->customer_name}}</h5>
{{--                                            <span class="text-muted font-13">Price</span>--}}
                                        </td>
                                        <td>
                                            <h5 class="font-14 my-1 fw-normal">{{number_format($latestOrder->total_amount)}}</h5>
{{--                                            <span class="text-muted font-13">Quantity</span>--}}
                                        </td>
                                        <td>
                                            <h5 class="font-14 my-1 fw-normal">{{number_format($latestOrder->paid)}}</h5>
{{--                                            <span class="text-muted font-13">Amount</span>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-2 mb-3">Cancelled Orders</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-sm table-nowrap table-hover mb-0">
                            <thead>
                            <tr>
                                <th><span class="text-muted font-13">Order No</span></th>
                                <th><span class="text-muted font-13">Customer</span></th>
                                <th><span class="text-muted font-13">Amount</span></th>
                                <th><span class="text-muted font-13">Paid</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($canceledOrder as $canceled)
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{$canceled->inv_no}}</h5>
                                        {{--                                            <span class="text-muted font-13">07 April 2018</span>--}}
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{$canceled->customer_name}}</h5>
                                        {{--                                            <span class="text-muted font-13">Price</span>--}}
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{number_format($canceled->total_amount)}}</h5>
                                        {{--                                            <span class="text-muted font-13">Quantity</span>--}}
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">{{number_format($canceled->paid)}}</h5>
                                        {{--                                            <span class="text-muted font-13">Amount</span>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <!-- end col -->
    </div>
    <!-- end row -->
    @endrole
    </div>
</div>

