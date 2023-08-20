<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Sales Report</h4> <p>List of all Payed Order</p></div>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 ">
            <div class="float-left">
                @can('create_sales')
                    <button class="btn btn-primary"><i class="fa fa-plus"></i><a class="text-white" href="{{Route('sales.pos')}}"> New Sale</a></button>
                @endcan
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-4 float-end">
                        <input type="text" wire:model="search" class="form-control col-md-4 col-sm-12 float-left" placeholder="Search......"/>
                    </div>
                    <div class="col-md-4">
                        <select wire:model="searches" class="form-control col-md-4 col-sm-12 float-left ml-3">
                            @foreach($statuses as $status)
                                <option>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-centered mb-0">
                            <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                @role('Admin|Manager|Accountant') <!-- Temporary remove access to sales man -->
                                <th>Amount</th>
                                <th>Payed</th>
                                <th>Balance</th>
                                @endrole
                                <th>Status</th>
                                <th>Creator</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td><a style="color: #4c75f2" href="{{ route('sales.details', ['sale_id' => \encrypt($sale->id)]) }}">{{$sale->inv_no}}</a></td>
                                    <td><a style="color: #4c75f2" href="{{ route('sales.customer', ['customer_id' => \encrypt($sale->customer_id)]) }}">{{$sale->customer_name}}</a></td>
                                    <td>{{ date('d-m-Y', strtotime($sale->created_at))}}</td>
                                    @role('Admin|Manager|Accountant') <!-- Temporary remove access to sales man -->
                                    <td>{{ number_format($sale->total_amount) }}</td>
                                    <td>{{ number_format($sale->paid_amount) }}</td>
                                    <td>{{ number_format($sale->total_amount - $sale->paid_amount) }}</td>
                                    @endrole
                                    <td>
                                        @if ($sale->payment_status == 'Unpaid') <span class="badge badge-danger-lighten">Unpaid</span> @endif
                                        @if ($sale->payment_status == 'Paid') <span class="badge badge-success-lighten">Paid</span> @endif
                                        @if ($sale->payment_status == 'Partial') <span class="badge badge-warning-lighten">Partial</span> @endif
                                    </td>
                                    <td>{{ $sale->created_by }}</td>
                                    <td>
                                        @if ($sale->payment_status !== 'Paid')
                                            <div class="dropdown float-end">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu ">
                                                    @can('create_payment')
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item text-primary" wire:click.prevent="addPayment({{$sale->id}})">Add Payment</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item text-danger" wire:click.prevent="markPaid({{$sale->id}})">Mark Payed</a>
                                                    @endcan
                                                    <!-- item-->
                                                    @if ($sale->payment_status == 'Unpaid')
                                                        <a href="javascript:void(0);" class="dropdown-item text-info" wire:click.prevent="cancelOrder({{$sale->id}})">Cancel</a>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $sales->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
