
        <div class="sidebar">
            <div class="site-width">
                <!-- START: Menu-->
                <ul id="side-menu" class="sidebar-menu">
                    <li class="dropdown active"><a href="#"><i class="icon-list mr-1"></i>NAV MENU</a>
                        <ul>
                            @role('Super Admin|Admin|Manager|Accountant')
                            <li class="{{ request()->is('dashboard')? 'active' : ''}}"><a href="{{ route('admin.dashboard')}}"><i class="icon-home"></i> Dashboard</a></li>
                            @endrole
                            @role('Super Admin|Admin|Manager|Accountant|Sales Man')
                            <li class="{{ request()->is('pos')? 'active' : ''}}"><a href="{{ route('sales.pos')}}"><i class="fa fa-shopping-cart"></i>New Order</a></li>
                            <li class="{{ request()->is('order')? 'active' : ''}}"><a href="{{ route('sales.list')}}"><i class="fa fa-file"></i> Orders List</a></li>
                            <li class="dropdown {{ (request()->is('inventory/*')) ? 'active' : '' }}"><a href="#"><i class="fas fa-shipping-fast"></i>Inventory</a>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('inventory.category')? 'active' : ''}}"><a href="{{ Route('inventory.category')}}"><i class="fas fa-user-tie"></i> Categories</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('inventory.product')? 'active' : ''}}"><a href="{{ Route('inventory.product')}}"><i class="fas fa-user-tie"></i> Product</a></li>
                                </ul>
                            </li>
                            @endrole
                            @role('Super Admin|Admin|Manager|Accountant')
                            <li class="{{ (Route::is('expenses.category')) ? 'active' : ''}}"><a href="{{ Route('expenses.category')}}"><i class="fa fa-money-bill"></i> Expenses</a></li>
                            @if( Route::is('expenses.details'))
                                <li class="{{ Route::is('expenses.details')? 'active' : ''}}"><a href="{{ Route('expenses.details')}}"><i class="fas fa-procedures"></i> Expenses Details</a></li>
                            @endif
                            <li class="dropdown {{ (request()->is('people/*')) ? 'active' : '' }}"><a href="#"><i class="fas fa-users"></i>People</a>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('customer')? 'active' : ''}}"><a href="{{ Route('customer')}}"><i class="fas fa-user-tie"></i> Customer</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('supplier')? 'active' : ''}}"><a href="{{ Route('supplier')}}"><i class="fas fa-user-tie"></i> Supplier</a></li>
                                </ul>
                            </li>
                            <li class="dropdown {{ (request()->is('payroll/*')) ? 'active' : '' }}"><a href="#"><i class="fas fa-inbox"></i>Payroll</a>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('payroll.employee')? 'active' : ''}}"><a href="{{ Route('payroll.employee')}}"><i class="fas fa-user-tie"></i> Employee</a></li>
                                </ul>
{{--                                <ul class="sub-menu">--}}
{{--                                    <li class="{{ Route::is('payroll.payment')? 'active' : ''}}"><a href="{{ Route('payroll.payment')}}"><i class="fas fa-user-tie"></i> Payment</a></li>--}}
{{--                                </ul>--}}
                                @if(Route::is('payroll.details'))
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('payroll.details')? 'active' : ''}}"><a href="{{ Route('payroll.details')}}"><i class="fas fa-user-tie"></i> Payment Details</a></li>
                                </ul>
                                @endif
                            </li>
                            @endrole

                            @role('Super Admin|Admin|Accountant|Manager')
                            <li class="{{ (Route::is('production.materials')) ? 'active' : ''}}"><a href="{{ Route('production.materials')}}"><i class="fa fa-project-diagram"></i> Production</a></li>
                            @if( Route::is('production.details'))
                                <li class="{{ Route::is('production.details')? 'active' : ''}}"><a href="#"><i class="fas fa-procedures"></i> Production Details</a></li>
                            @endif
                            @endrole
                            {{--<li class="dropdown {{ (request()->is('production/*')) ? 'active' : '' }}"><a href="#"><i class="fas fa-project-diagram"></i>Production</a>--}}
                                {{--<ul class="sub-menu">--}}
                                    {{--<li class="{{ Route::is('production.details')? 'active' : ''}}"><a href="{{ Route('production.details')}}"><i class="fas fa-user-tie"></i> Category</a></li>--}}
                                {{--</ul>--}}
                                {{--<ul class="sub-menu">--}}
                                    {{--<li class="{{ Route::is('production.materials')? 'active' : ''}}"><a href="{{ Route('production.materials')}}"><i class="fas fa-user-tie"></i> Materials</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            @role('Super Admin|Admin')
                            <li class="dropdown {{ (request()->is('report/*')) ? 'active' : '' }}"><a href="#"><i class="fa fa-chart-line"></i>Report</a>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('report.profitloss')? 'active' : ''}}"><a href="{{ Route('report.profitloss')}}"><i class="fas fa-user-tie"></i> Profit/Loss Report</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('report.sales')? 'active' : ''}}"><a href="{{ Route('report.sales')}}"><i class="fas fa-user-tie"></i> Sales Report</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('report.purchase')? 'active' : ''}}"><a href="{{ Route('report.purchase')}}"><i class="fas fa-user-tie"></i> Purchase Report</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('report.salary')? 'active' : ''}}"><a href="{{ Route('report.salary')}}"><i class="fas fa-user-tie"></i> Salary Report</a></li>
                                </ul>
                            </li>
                            <li class="dropdown {{ (request()->is('admin/*')) ? 'active' : '' }}"><a href="#"><i class="fa fa-cog"></i>Admin</a>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('admin.users')? 'active' : ''}}"><a href="{{ Route('admin.users')}}"><i class="fas fa-user-tie"></i> Users Management</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('admin.roles')? 'active' : ''}}"><a href="{{ Route('admin.roles')}}"><i class="fas fa-user-tie"></i> Role Management</a></li>
                                </ul>
                                <ul class="sub-menu">
                                    <li class="{{ Route::is('admin.system')? 'active' : ''}}"><a href="{{ Route('admin.system')}}"><i class="fas fa-user-tie"></i> System Settings</a></li>
                                </ul>
                            </li>
                            @endrole
                        </ul>
                    </li>
                </ul>
                <!-- END: Menu-->
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
