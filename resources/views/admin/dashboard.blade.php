<x-admin-layout>
    <div>
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-md-0 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> <p>Welcome to liner admin panel</p>
                        <a href="#" class="btn btn-primary">Get Started <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="card border-bottom-0 mt-3 mt-sm-0">
                        <div class="card-content border-bottom border-primary border-w-5">
                            <div class="card-body p-4">

                                <span class="mb-0 font-w-600 text-primary">Available balance</span><br>
                                <p class="mb-0 font-w-500 tx-s-12">$159,830.00</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row">

            <div class="col-12 col-lg-12  mt-3">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                            <span class="cf card-liner-icon cf-btc mt-2"></span>
                                            <div class='card-liner-content'>
                                                {{-- <h2 class="card-liner-title">{{number_format($all_site)}}</h2> --}}
                                                <h6 class="card-liner-subtitle">Total Site</h6>
                                            </div>
                                        </div>
                                        <div id="apex_primary_chart"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                            <span class="cf card-liner-icon cf-eth mt-2"></span>
                                            <div class='card-liner-content'>
                                                {{-- <h2 class="card-liner-title">{{number_format($all_emp)}}</h2> --}}
                                                <h6 class="card-liner-subtitle">Active Employee</h6>
                                            </div>
                                        </div>
                                        <div id="apex_today_visitors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6  mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                            <span class="cf card-liner-icon cf-xrp mt-2"></span>
                                            <div class='card-liner-content'>
                                                <h2 class="card-liner-title">6</h2>
                                                <h6 class="card-liner-subtitle">New Site This Month</h6>
                                            </div>
                                        </div>
                                        <div id="apex_today_sale"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                            <span class="cf card-liner-icon cf-usdt mt-2"></span>
                                            <div class='card-liner-content'>
                                                <h2 class="card-liner-title">20</h2>
                                                <h6 class="card-liner-subtitle">New Employee This Month</h6>
                                            </div>
                                        </div>
                                        <span class="bg-warning card-liner-absolute-icon text-white card-liner-small-tip">+4.8%</span>
                                        <div id="apex_today_profit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mt-3">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="apex_crypto_chart" class="height-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12  col-md-6 col-lg-3 mt-3">
                <div class="card border-bottom-0">
                    <div class="card-content border-bottom border-primary border-w-5">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="circle-50 outline-badge-primary"> <span class="cf card-liner-icon cf-ltc mt-2"></span></div>
                                <div class="media-body align-self-center pl-3">
                                    <span class="mb-0 h6 font-w-600">Litecoin</span><br>
                                    <p class="mb-0 font-w-500 h6">$47.05</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-md-6 col-lg-3 mt-3">
                <div class="card border-bottom-0">
                    <div class="card-content border-bottom border-warning border-w-5">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="circle-50 outline-badge-warning"> <span class="cf card-liner-icon cf-xlm mt-2"></span></div>
                                <div class="media-body align-self-center pl-3">
                                    <span class="mb-0 h6 font-w-600">Stellar</span><br>
                                    <p class="mb-0 font-w-500 h6">$17.99805</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-md-6 col-lg-3 mt-3">
                <div class="card border-bottom-0">
                    <div class="card-content border-bottom border-success border-w-5">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="circle-50 outline-badge-success"> <span class="cf card-liner-icon cf-link mt-2"></span></div>
                                <div class="media-body align-self-center pl-3">
                                    <span class="mb-0 h6 font-w-600">Chainlink</span><br>
                                    <p class="mb-0 font-w-500 h6">$52.09805</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  col-md-6 col-lg-3 mt-3">
                <div class="card border-bottom-0">
                    <div class="card-content border-bottom border-info border-w-5">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="circle-50 outline-badge-info"> <span class="cf card-liner-icon cf-xmr mt-2"></span></div>
                                <div class="media-body align-self-center pl-3">
                                    <span class="mb-0 h6 font-w-600">Monero</span><br>
                                    <p class="mb-0 font-w-500 h6">$64.52</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">New employee this month</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0">
                            <ul class="list-group list-unstyled">
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Max S. Lewis</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Timothy S. Williamson</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Harry J. Mitchell</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">John M. Stokes</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Joshua P. Morrison</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Lester V. Cargo</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">New Site this month</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0">
                            <ul class="list-group list-unstyled">
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Max S. Lewis</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Timothy S. Williamson</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Harry J. Mitchell</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">John M. Stokes</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2 border-bottom">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Joshua P. Morrison</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>
                                <li class="p-2">
                                    <div class="media d-flex w-100">
                                        <div class="media-body align-self-center pl-2">
                                            <span class="mb-0 font-w-600">Lester V. Cargo</span><br>
                                        </div>
                                        <div class="ml-auto my-auto font-weight-bold">
                                            $12,456.00
                                        </div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="card-title">Site with many employee</h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-borderless pick-table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Site</th>
                                            <th class="text-right">Region</th>
                                            <th class="text-right">Employee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>USA</td>
                                            <td class="text-right">964,817</td>
                                            <td class="text-right">72,275</td>
                                        </tr>
                                        <tr>
                                            <td>Canada</td>
                                            <td class="text-right">31,010</td>
                                            <td class="text-right">4,043</td>
                                        </tr>
                                        <tr>
                                            <td>Mexico</td>
                                            <td class="text-right">6,708</td>
                                            <td class="text-right">2,507</td>
                                        </tr>
                                        <tr>
                                            <td>Dominican Republic</td>
                                            <td class="text-right">6,221</td>
                                            <td class="text-right">354</td>
                                        </tr>
                                        <tr>
                                            <td>Panama</td>
                                            <td class="text-right">6,490</td>
                                            <td class="text-right">210</td>
                                        </tr>
                                        <tr>
                                            <td>Cuba</td>
                                            <td class="text-right">5,345</td>
                                            <td class="text-right">323</td>
                                        </tr>
                                        <tr>
                                            <td>Honduras</td>
                                            <td class="text-right">5,555</td>
                                            <td class="text-right">657</td>
                                        </tr>
                                        <tr>
                                            <td>Guatemala</td>
                                            <td class="text-right">6,490</td>
                                            <td class="text-right">234</td>
                                        </tr>
                                        <tr>
                                            <td>Costa Rica</td>
                                            <td class="text-right">3,477</td>
                                            <td class="text-right">123</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Card DATA-->
    </div>
</x-admin-layout>
