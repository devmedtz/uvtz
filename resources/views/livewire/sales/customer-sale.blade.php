<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Invoices for {{$customer->customer_name}}</h4> <p>List of all Invoices</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Sales</a></li>
                    <li class="breadcrumb-item active">Customer Invoice</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @can('create_customer')
                    <button class="btn btn-primary"><i class="fa fa-plus"></i><a class="text-white" href="{{Route('sales.pos')}}"> New Sale</a></button>
                @endcan
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-3 mt-3">
            <div class="card">
                <div class="card-body ">
                    <div class='d-flex px-0 px-lg-2 py-2 align-self-center'>
                        <i class="fa fa-hand-holding-usd icons card-liner-icon mt-2 text-info"></i>
                        <div class='card-liner-content'>
                            @foreach($payStatus as $status)
                                @if($status->payment_status  == 'Paid')
                                <h2 class="card-liner-title text-info">{{number_format($status->status_count)}}</h2>
                                @endif
                            @endforeach
                            <h6 class="card-liner-subtitle">Paid</h6>
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
                            @foreach($payStatus as $status)
                                @if($status->payment_status  == 'Partial')
                                    <h2 class="card-liner-title text-info">{{number_format($status->status_count)}}</h2>
                                @endif
                            @endforeach
                            <h6 class="card-liner-subtitle ">Partial</h6>
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
                            @foreach($payStatus as $status)
                                @if($status->payment_status  == 'Unpaid')
                                    <h2 class="card-liner-title text-info">{{number_format($status->status_count)}}</h2>
                                @endif
                            @endforeach
                            <h6 class="card-liner-subtitle">Unpaid</h6>
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
                            <h6 class="card-liner-subtitle">Total</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Invoices List </h4>
                </div>
                <div class="card-body">
                    <input type="text" wire:model="search" class="form-control col-md-4 col-sm-12 float-left" placeholder="Search......"/>
                    <select wire:model="searches" class="form-control col-md-4 col-sm-12 float-left ml-3">
                    </select>
                    <div class="table-responsive mt-3">
                        <table class="display table table-hover mt-3">
                            <thead>
                            <tr>
                                <th>Invoices #</th>
                                <th>Amount</th>
                                <th>Payed</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customerSales as $sale)
                                <tr>
                                    <td><a style="color: #4c75f2" href="{{ route('sales.details', ['sale_id' => \encrypt($sale->id)]) }}">{{$sale->inv_no}}</a></td>
                                    <td>{{ number_format($sale->total_amount) }}</td>
                                    <td>{{ number_format($sale->paid_amount) }}</td>
                                    <td>{{ number_format($sale->total_amount - $sale->paid_amount) }}</td>
                                    <td>
                                        @if ($sale->payment_status == 'Unpaid') <span class="badge badge-danger">Unpaid</span> @endif
                                        @if ($sale->payment_status == 'Paid') <span class="badge badge-success">Paid</span> @endif
                                        @if ($sale->payment_status == 'Partial') <span class="badge badge-warning">Partial</span> @endif
                                    </td>
                                    <td>
                                        @if ($sale->payment_status !== 'Paid')
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-options-vertical font-15"></i></a>
                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-left">
                                                <a class="dropdown-item edit-todo text-primary" wire:click.prevent="addPayment({{$sale->id}})" href="#"><i class="fa fa-cart-plus mr-2 "></i>Add Payment</a>
                                                <a class="dropdown-item edit-todo text-success" wire:click.prevent="markPaid({{$sale->id}})" href="#"><i class="fa fa-check mr-2 "></i>Mark Payed</a>
                                                @if ($sale->payment_status == 'Unpaid')
                                                    <a class="dropdown-item edit-todo text-danger" wire:click.prevent="cancelOrder({{$sale->id}})" href="#"><i class="fa fa-trash mr-2 "></i>Cancel</a>
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Invoices #</th>
                                <th>Amount</th>
                                <th>Payed</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
{{--                        <div class="d-flex justify-content-end">--}}
{{--                            {{ $sales->links() }}--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

            <!--Add Payment Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="saveAddPayment">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="exampleModalLongTitle">
{{--                                    Add Payment: (Inv #: {{$invNumber}})--}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="username" class="col-form-label">Pay Date</label>
                                        <input type="date" wire:model.defer="inputs.date" min="1000" class="form-control @error('date') is-invalid @enderror" placeholder="Amount">
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="username" class="col-form-label"><strong class="text-danger">Balance: </strong></label>
                                        <input type="number" wire:model.defer="inputs.paid_amount" min="1000" class="form-control @error('paid_amount') is-invalid @enderror" placeholder="Amount">
                                        @error('paid_amount')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group  col-md-6 mb-3">
                                        <label for="username" class="col-form-label">Payment Method</label>
                                        <select wire:model.defer="inputs.payment_method" class="form-control @error('payment_method') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach($paymentMd as $payment)
                                                <option value="{{$payment}}">{{$payment}}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_method')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    @if ($showEditModal)
                                        <span>Save Changes</span>
                                    @else
                                        <span>Save</span>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Mark Payed Modal -->
            <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="saveMarkPaid">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="exampleModalLongTitle">
{{--                                    Mark Paid: (Inv #: {{$invNumber}})--}}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-10 mb-3">
                                        <label for="username" class="col-form-label">Pay Date</label>
                                        <input type="date" wire:model.defer="inputs.date" min="1000" class="form-control @error('date') is-invalid @enderror" placeholder="Amount">
                                        @error('date')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group  col-md-10 mb-3">
                                        <label for="username" class="col-form-label"><strong class="text-danger">Balance: </strong></label><br/>
                                        <select wire:model.defer="inputs.payment_method" class="form-control @error('payment_method') is-invalid @enderror">
                                            <option value="">Select</option>
                                            @foreach($paymentMd as $payment)
                                                <option value="{{$payment}}">{{$payment}}</option>
                                            @endforeach
                                        </select>
                                        @error('payment_method')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    @if ($showEditModal)
                                        <span>Save Changes</span>
                                    @else
                                        <span>Save</span>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Cancel Order Modal -->
            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-secondary" id="exampleModalLongTitle">
{{--                                Delete Order: (Inv #: {{$invNumber}})--}}
                            </h5>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger">Are you sure you want to delete this Order ?</h5>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                            <button type="button" wire:click.prevent="deleteCustomer" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
