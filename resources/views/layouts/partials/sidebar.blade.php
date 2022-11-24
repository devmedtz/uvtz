
<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="assets/images/logo.png" alt="" height="30">
        </span>
        <span class="logo-sm">
            <img src="assets/images/logo_sm.png" alt="" height="30">
        </span>
    </a>

    <!-- LOGO -->
    <a href="{{ route('admin.dashboard')}}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>
            @can('view_dashboard')
                <li class="{{ request()->is('dashboard')? 'active' : ''}} side-nav-item">
                    <a href="{{ route('admin.dashboard')}}" class="side-nav-link">
                        <i class="uil-home-alt"></i> <span>Dashboard</span></a>
                </li>
            @endcan
            @can('view_sales')
                <li class="{{ request()->is('pos')? 'active' : ''}} side-nav-item">
                    <a href="{{ route('sales.pos')}}" class="side-nav-link"><i class="uil-shopping-trolley"></i>New Order</a>
                </li>
                <li class="{{ request()->is('order')? 'active' : ''}} side-nav-item">
                    <a href="{{ route('sales.list')}}" class="side-nav-link"><i class="uil-file-check"></i> Orders List</a>
                </li>
            @endcan

            @can('view_inventory')
            <li class="{{ (request()->is('inventory/*')) ? 'active' : '' }} side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-shopping-basket"></i>
                    <span class="menu-arrow"></span>
                    <span> Inventory </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li class="{{ Route::is('inventory.category')? 'active' : ''}}">
                            <a href="{{ Route('inventory.category')}}">Categories</a>
                        </li>
                        <li class="{{ Route::is('inventory.product')? 'active' : ''}}">
                            <a href="{{ Route('inventory.product')}}">Product</a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan

            @can('view_expenses')
                <li class="{{ (Route::is('expenses.category')) ? 'active' : ''}} side-nav-item">
                    <a href="{{ Route('expenses.category')}}" class="side-nav-link"><i class="uil-file-bookmark-alt"></i> Expenses</a>
                </li>
                @if( Route::is('expenses.details'))
                    <li class="{{ Route::is('expenses.details')? 'active' : ''}} side-nav-item">
                        <a href="{{ Route('expenses.details')}}" class="side-nav-link"><i class="fas fa-procedures"></i> Expenses Details</a>
                    </li>
                @endif
            @endcan

            @can('view_supplier')
                <li class="{{ (request()->is('people/*')) ? 'active' : '' }} side-nav-item">
                    <a data-bs-toggle="collapse" href="#people" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-user"></i>
                        <span class="menu-arrow"></span>
                        <span> People </span>
                    </a>
                    <div class="collapse" id="people">
                        <ul class="side-nav-second-level">
                            <li class="{{ Route::is('customer')? 'active' : ''}}">
                                <a href="{{ Route('customer')}}">Customer</a>
                            </li>
                            <li class="{{ Route::is('supplier')? 'active' : ''}}">
                                <a href="{{ Route('supplier')}}">Supplier</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan

            @can('view_payroll')
                <li class="{{ (request()->is('payroll/*')) ? 'active' : '' }} side-nav-item">
                    <a data-bs-toggle="collapse" href="#payroll" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-package"></i>
                        <span class="menu-arrow"></span>
                        <span> Payroll </span>
                    </a>
                    <div class="collapse" id="payroll">
                        <ul class="side-nav-second-level">
                            <li class="{{ Route::is('payroll.employee')? 'active' : ''}}">
                                <a href="{{ Route('payroll.employee')}}">Employee</a>
                            </li>
                            @if(Route::is('payroll.details'))
                            <li class="{{ Route::is('payroll.details')? 'active' : ''}}">
                                <a href="{{ Route('payroll.details')}}">Payment Details</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endcan

            @can('view_production')
                <li class="{{ (Route::is('production.materials')) ? 'active' : ''}} side-nav-item">
                    <a href="{{ Route('production.materials')}}" class="side-nav-link"><i class="uil-document-layout-center"></i> Production</a>
                </li>
                @if( Route::is('production.details'))
                    <li class="{{ Route::is('production.details')? 'active' : ''}} side-nav-item">
                        <a href="#" class="side-nav-link"><i class="uil-document-layout-center"></i> Production Details</a>
                    </li>
                @endif
            @endcan

            @can('view_report')
                <li class="{{ (request()->is('report/*')) ? 'active' : '' }} side-nav-item">
                    <a data-bs-toggle="collapse" href="#report" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-chart"></i>
                        <span class="menu-arrow"></span>
                        <span> Report </span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="side-nav-second-level">
                            <li class="{{ Route::is('report.profitloss')? 'active' : ''}}">
                                <a href="{{ Route('report.profitloss')}}">Profit/Loss</a>
                            </li>
                            <li class="{{ Route::is('report.sales')? 'active' : ''}}">
                                <a href="{{ Route('report.sales')}}">Sales</a>
                            </li>
                            <li class="{{ Route::is('report.purchase')? 'active' : ''}}">
                                <a href="{{ Route('report.purchase')}}">Purchase</a>
                            </li>
                            <li class="{{ Route::is('report.salary')? 'active' : ''}}">
                                <a href="{{ Route('report.salary')}}">Salary</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan

            @can('create_user')
                <li class="{{ (request()->is('admin/*')) ? 'active' : '' }} side-nav-item">
                    <a data-bs-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-cog"></i>
                        <span class="menu-arrow"></span>
                        <span> Admin </span>
                    </a>
                    <div class="collapse" id="admin">
                        <ul class="side-nav-second-level">
                            <li class="{{ Route::is('admin.users')? 'active' : ''}}">
                                <a href="{{ Route('admin.users')}}">Users</a>
                            </li>
                            <li class="{{ Route::is('admin.roles')? 'active' : ''}}">
                                <a href="{{ Route('admin.roles')}}">Roles</a>
                            </li>
                            <li class="{{ Route::is('admin.system')? 'active' : ''}}">
                                <a href="{{ Route('admin.system')}}">System</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endcan
        </ul>
        <!-- End Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
