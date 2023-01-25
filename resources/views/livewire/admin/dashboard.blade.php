<div>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-5 col-lg-6">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                            <h3 class="mt-3 mb-3">{{$customerCount}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">Available Customers</span>
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
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Today</h5>
                            <h3 class="mt-3 mb-3">{{number_format($orderToday)}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">{{number_format($expensesToday)}}</span>
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
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">This week</h5>
                            <h3 class="mt-3 mb-3">{{number_format($orderThisWeek)}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">{{number_format($expensesThisWeek)}}</span>
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
                            <h5 class="text-muted fw-normal mt-0" title="Growth">This Month</h5>
                            <h3 class="mt-3 mb-3">{{number_format($orderThisMonth)}}</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-nowrap">{{number_format($expensesThisMonth)}}</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->

        <div class="col-xl-7 col-lg-6">
            <div class="card card-h-100">
                <div class="card-body">
                    <h4 class="header-title mb-3">Projections Income Vs Expenses</h4>
                    <div dir="ltr">
                        <div id="high-performing-product" class="apex-charts" data-colors="#727cf5,#e3eaef"></div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Revenue Vs Expenses this Year</h4>
                    <div class="chart-content-bg">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Revenue</p>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                                    <span>{{number_format($orderThisYear)}}</span>
                                </h2>
                            </div>
                            <div class="col-md-6">
                                <p class="text-muted mb-0 mt-3">Expenses</p>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-danger align-middle me-1"></small>
                                    <span>{{number_format($expensesThisYear)}}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div dir="ltr">
                        <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Expenses By Category</h4>
                    <h5 class="mb-1 mt-0 fw-normal">New York</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value fw-bold">72k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <h5 class="mb-1 mt-0 fw-normal">Sydney</h5>
                    <div class="progress-w-percent">
                        <span class="progress-value fw-bold">25k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <h5 class="mb-1 mt-0 fw-normal">Singapore</h5>
                    <div class="progress-w-percent mb-0">
                        <span class="progress-value fw-bold">61k </span>
                        <div class="progress progress-sm">
                            <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
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

        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Available Products</h4>
                    <div class="chart-widget-list">
                        <p>
                            @foreach($availableProducts as $products)
                                <p>
                                <i class="mdi mdi-square text-primary"></i> {{$products->product_name}}
                                <span class="float-end">{{$products->product_quantity}}</span>
                                </p>
                            @endforeach
                        </p>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Production Material</h4>
                    <div class="chart-widget-list">
                        <p>
                            <i class="mdi mdi-square text-primary"></i> Direct
                            <span class="float-end">300</span>
                        </p>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <!-- end col -->

    </div>
    <!-- end row -->
</div>
