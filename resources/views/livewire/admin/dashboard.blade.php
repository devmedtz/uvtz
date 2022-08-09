<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 px-md-0 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">MicroPay</h4> <p>SME Accounting system</p>
{{--                    <a href="#" class="btn btn-primary">Welcome <i class="fas fa-arrow-right"></i></a>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 col-sm-3 mt-3">
            <div class="card">
                <div class="card-body ">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="fa fa-hand-holding-usd icons card-liner-icon mt-2 text-info"></i>
                        <div class='card-liner-content'>
                            {{--<h2 class="card-liner-title text-info">{{number_format($month_new_emp)}}</h2>--}}
                            <h6 class="card-liner-subtitle">Sales Today</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="fa fa-hand-holding-usd icons card-liner-icon mt-2 text-primary"></i>
                        <div class='card-liner-content' >
                            {{--<h2 class="card-liner-title text-primary">{{number_format($active_emp)}}</h2>--}}
                            <h6 class="card-liner-subtitle ">Sales This Week</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="fa fa-hand-holding-usd icons card-liner-icon mt-2 text-warning"></i>
                        <div class='card-liner-content'>
                            {{--<h2 class="card-liner-title text-warning">{{number_format($suspend_emp)}}</h2>--}}
                            <h6 class="card-liner-subtitle">Sales This Month</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="fa fa-hand-holding-usd  icons card-liner-icon mt-2 text-danger"></i>
                        <div class='card-liner-content'>
                            {{--<h2 class="card-liner-title text-danger">{{number_format($blacklist_emp)}}</h2>--}}
                            <h6 class="card-liner-subtitle">Total Sales</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Graph --}}
        <div class="col-12 col-lg-12  mt-3">
            <div class="row">
                <div class="col-12 col-lg-8 mt-3">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <canvas id="employee_chart" height="160"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="fa fa-hand-holding-usd card-liner-icon mt-2 text-dark"></i>
                                <div class='card-liner-content'>
                                    {{--<h2 class="card-liner-title text-dark">Tsh: {{number_format($total_sal)}}</h2>--}}
                                    <h6 class="card-liner-subtitle">Expenses This week</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="fas fa-door-open icons card-liner-icon mt-2 text-success"></i>
                                <div class='card-liner-content'>
                                    {{--<h2 class="card-liner-title text-success">{{number_format($month_new_site)}}</h2>--}}
                                    <h6 class="card-liner-subtitle">Expenses This Month</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                                <i class="fas fa-door-open icons card-liner-icon mt-2 text-secondary"></i>
                                <div class='card-liner-content'>
                                    {{--<h2 class="card-liner-title text-secondary">{{number_format($all_site)}}</h2>--}}
                                    <h6 class="card-liner-subtitle">Expenses This Year</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
    <script>
        const ctx = document.getElementById('employee_chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'March', 'Appr', 'May', 'June'],
                datasets: [{
                    label: 'Salary',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
