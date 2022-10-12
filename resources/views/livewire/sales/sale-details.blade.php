<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Invoices Details</h4> <p>Details of Invoices</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                    <li class="breadcrumb-item active">Invoice Details</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @can('create_sales')
                <button class="btn btn-primary"><i class="fa fa-plus"></i><a class="text-white" href="{{Route('sales.pos')}}"> New Sale</a></button>
                @endcan
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">
                        Invoice No: {{$saleInfo->inv_no}}
                        @if ($saleInfo->payment_status == 'Unpaid') <span class="badge badge-danger">Unpaid</span> @endif
                        @if ($saleInfo->payment_status == 'Paid') <span class="badge badge-success">Paid</span> @endif
                        @if ($saleInfo->payment_status == 'Partial') <span class="badge badge-warning">Partial</span> @endif
                        <span class="badge badge-success text-white float right">Balance {{number_format($saleInfo->total_amount - $saleInfo->paid_amount)}}</span>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-hover">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Unit Cost</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>({{$sale->product_code}}) {{ $sale->product_name }}</td>
                                        <td>{{ number_format($sale->quantity) }}</td>
                                        <td>{{ number_format($sale->unit_price) }}</td>
                                        <td>{{ number_format($sale->unit_price * $sale->quantity) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-primary">
                        Payment History
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Method</th>
                                    <th>Amount</th>
                                    <th>Creator</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->date }}</td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td>{{ number_format($payment->amount) }}</td>
                                        <td>{{ $payment->created_by }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
