<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Create New Order</h4> <p>Make New Order</p></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-body">
                    <div wire:ignore class="form-group">
                        @can('create_customer')
                            <span class="mt-3"><a href="#" class="text-primary mt-3" wire:click.prevent="addCustomer"><i class="fa fa-plus"> New Customer</i></a> </span>
                        @endcan
                        <select class="select2 form-control" data-toggle="select2">
                            <option value="{{0}}">Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-centered mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <select wire:model="selectedPrId" wire:change="selectedProducts" class="form-control " >
                                            <option value="{{0}}" selected>Select Product</option>
                                            @foreach ($products as $product)
                                                @if($product->product_quantity > 0)
                                                    <option value="{{$product->id}}">{{$product->product_name}} ({{ $product->product_quantity}})</option>
                                                @else
                                                    <option disabled >{{$product->product_name}} ({{ $product->product_quantity}})</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input wire:model="prQuantity" wire:keyup="updatePrQuantity" style="min-width: 40px;max-width: 90px;" type="number" class="form-control" min="0">
                                    </td>
                                    <td>{{ number_format($selectedPr) }}</td>
        {{--                            <td>{{ number_format($subTotal) }}</td>--}}
        {{--                            <td>{{ number_format($product->product_price * $product->product_price)}}</td>--}}
                                    <td class=" text-center">
                                        @if($subTotal)
                                            <a class="action-icon text-primary" href="#" wire:click.prevent="addProductToCart">
                                                <i class="mdi mdi-plus-circle-outline"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-header  justify-content-between align-items-center">
                    <h5 class="card-title text-primary">Order Summary</h5>
                </div>
                <form wire:submit.prevent="saveOrder" class="">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-centered mb-0">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart_item as $product)
                                <tr>
                                    <td class="text-primary">{{ $product['product_name']}}</td>
                                    <td class="text-primary">{{number_format($product['product_qty'])}}</td>
                                    <td class="text-left">{{number_format($product['subTotal'])}}</td>
                                    <td class="align-content-center text-center">
                                        <a class="action-icon text-danger" href="#" wire:click.prevent="removeProductToCart({{$product['product_id']}})">
                                                <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($shipping)
                                <tr>
                                    <th></th>
                                    <th class="text-primary">Transport</th>
                                    <th class="text-secondary text-left">
                                        {{ number_format($shipping)}}
                                    </th>
                                </tr>
                            @endif
                            @if ($discount)
                                <tr>
                                    <th></th>
                                    <th class="text-success">Discount</th>
                                    <th class="text-secondary text-left">
                                        {{ number_format($discount)}}
                                    </th>
                                </tr>
                            @endif
                            @if ($totalPr)
                                <tr>
                                    <th></th>
                                    <th class="text-secondary">Total</th>
                                    <th class="text-secondary text-left">
                                        {{ number_format($totalPr)}}
                                    </th>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-5">
                                <input wire:model.lazy="discount" wire:keyup="orderDiscount" type="number" class="form-control" name="percentage" min="1000" placeholder="Discount Amount">
                            </div>
                            <div class="col-5">
                                <input wire:model="shipping" type="number" class="form-control" name="shipping" min="1000" placeholder="Transport Amount">
                            </div>
                            @can('create_sales')
                                <div class="form-group d-flex justify-content-center flex-wrap mt-3 ml-3">
                                    @if($totalPr)
                                        <button type="submit" class="btn btn-pill btn-primary float-right"><i class="bi bi-check"></i>Save Order</button>
                                    @endif
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add Customer Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="createCustomer">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="standard-modalLabel">
                            <span>Add Customer</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="username" class="col-form-label">Customer Name</label>
                            <input type="text" wire:model.defer="inputs.customer_name" id="name" class="form-control @error('customer_name') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                            @error('customer_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username" class="col-form-label">Customer Phone</label>
                            <input type="text" wire:model.defer="inputs.customer_phone" id="text" class="form-control @error('customer_phone') is-invalid @enderror"/>
                            @error('customer_phone')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username" class="col-form-label">Customer City</label>
                            <input type="text" wire:model.defer="inputs.customer_city" id="text" class="form-control @error('customer_city') is-invalid @enderror"/>
                            @error('customer_city')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username" class="col-form-label">Customer Address</label>
                            <input type="text"  wire:model.defer="inputs.customer_address" id="text" class="form-control @error('customer_address') is-invalid @enderror"/>
                            @error('customer_address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span>Save</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('js')
        <!-- Select2-->
        <script>
            $(function() {
                $('.select2').select2({
                }).on('change',
                    function() {
                        @this.set('customer_id', $(this).val());
                    }
                );
            })
        </script>
    @endpush
</div>
