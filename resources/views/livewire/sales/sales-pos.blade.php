<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">New Order</h4> <p>Make New Order</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Order</a></li>
                    <li class="breadcrumb-item active">New</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
{{--        <div class="col-md-7 mt-3">--}}
{{--            @if (session()->has('message'))--}}
{{--                <div class="alert alert-warning alert-dismissible fade show" role="alert">--}}
{{--                    <div class="alert-body">--}}
{{--                        <span>{{ session('message') }}</span>--}}
{{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                            <span aria-hidden="true">×</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="card">--}}
{{--                <div class="card-header justify-content-between align-items-center">--}}
{{--                    <h4 class="card-title text-secondary">Available Product</h4>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <input type="text" wire:model="search" class="form-control col-md-5 col-sm-12 float-left" placeholder="Search......"/>--}}
{{--                    <select class="form-control col-md-6 col-sm-12 float-left ml-3">--}}
{{--                        <option value="">All Products</option>--}}
{{--                    </select>--}}
{{--                    <div class="table-responsive mt-3">--}}
{{--                        @can('create_sales')--}}
{{--                        <div class="documents grid">--}}
{{--                            --}}{{--For loop Start here--}}
{{--                            @foreach($products as $product)--}}
{{--                                @if($product->product_quantity > 0)--}}
{{--                                    <a href="#" wire:click.prevent="selectProduct({{ $product }})" class="document folder-documents" style="cursor: pointer;">--}}
{{--                                        <div class="document-content border">--}}
{{--                                            <div class="document-profile">--}}
{{--                                                <div class="document-info">--}}
{{--                                                    <p class="user badge badge-primary font-size-10">Stock: {{ $product->product_quantity }}</p>--}}
{{--                                                     <p class="document-name mt-3"><strong>{{ $product->product_name }}</strong></p>--}}
{{--                                                     <p class="mb-0 user text-primary">Tsh: {{number_format($product->product_price)}}</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                             @endforeach--}}
{{--                            --}}{{--For loop end here--}}
{{--                        </div>--}}
{{--                        @endcan--}}
{{--                        <div class="d-flex justify-content-end">--}}
{{--                            --}}{{--{{ $sites->links() }}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-md-12 mt-3">
            @if (session()->has('message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        <span>{{ session('message') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Order Summary</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" wire:model="searchCustomer" class="form-control mb-1" placeholder="Search Customer.....">
                        @can('create_customer')
                            <span class="mt-3"><a href="#" class="text-primary mt-3" wire:click.prevent="addCustomer"><i class="fa fa-plus"> New Customer</i></a> </span>
                        @endcan
                    </div>
                    <div class="table-responsive">
                        @if ($searchCustomer)
                            <table class="table table-borderless pick-table mb-0 table-hover">
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td class="text-left text-primary" wire:click="customerId({{$customer->id}})" style="cursor: pointer;">{{$customer->customer_name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="text-center text-success">
                        <strong>Order for: {{$selectedCustomer}}</strong>
                    </div>
                    @if($customer_id)
                        @can('create_sales')
                        <div class="table-responsive">
                            <table class="table table-borderless pick-table mb-0 table-hover">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-right">Price (TZS)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        @if($product->product_quantity > 0)
                                            <tr>
                                                <td  wire:click.prevent="selectProduct({{ $product }})" style="cursor: pointer;" class="text-primary">{{ $product->product_name }} (stock: {{number_format($product->product_quantity)}})</td>
                                                <td class="text-right">{{number_format($product->product_price)}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endcan
                    @endif
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($cart_items->isNotEmpty())
                                @foreach($cart_items as $cart_item)
                                    <tr>
                                        <td>{{ $cart_item->name }}</td>
                                        <td>{{ number_format($cart_item->price) }}</td>
                                        <td>
{{--                                            @include('livewire.includes.product-cart-quantity')--}}
                                            <input wire:model="quantity.{{ $cart_item->id }}" wire:keyup="updateQuantity('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')" style="min-width: 40px;max-width: 90px;" type="number" class="form-control" value="{{ $cart_item->qty }}" min="0">
                                        </td>
                                        <td>{{ number_format($cart_item->price * $cart_item->qty)}}</td>
                                        <td class="align-middle text-center">
                                            <a class="line-h-1 h6 text-danger" href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                                <i class="fa fa-trash mr-2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr class="text-info">
                                <th>Discount</th>
                                <td> </td>
                                <th>{{ Cart::instance($cart_instance)->discount() }}</th>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <th></th>
                                <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                                <th>{{ $shipping }}</th>
                            </tr>
                            <tr>
                                <th class="text-secondary">Total</th>
                                @php
                                    $total_with_shipping = Cart::instance($cart_instance)->total();
                                @endphp
                                <th></th>
                                <th class="text-secondary text-left">
                                    {{ $total_with_shipping}}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        <input type="hidden" name="total_amount" value="{{ $total_with_shipping }}">
                        <div class="row">
                            <div class="col-5">
                                <label for="discount">Discount (%)</label>
                                <input wire:model="global_discount" type="number" class="form-control" name="discount_percentage" min="0" max="100" value="{{$global_discount}}" required>
                            </div>
                            <div class="col-5">
                                <label for="discount">Shipping</label>
                                <input wire:model="shipping" type="number" class="form-control" name="shipping_amount" min="0" required step="0.01">
                            </div>
                            @can('create_sales')
                            <div class="form-group d-flex justify-content-center flex-wrap mt-3 ml-3">
                                <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i class="bi bi-x"></i> Reset</button>
                                <button wire:loading.attr="disabled" wire:click="proceed" type="button" class="btn btn-pill btn-primary" {{  $total_amount == 0 ? 'disabled' : '' }}><i class="bi bi-check"></i> Proceed</button>
                            </div>
                            @endcan
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{--Checkout Modal--}}
    @include('livewire.includes.checkout-modal')
    <!-- END: Card DATA-->
    <!--Add Customer Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="createCustomer">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span>Add Customer</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span>Save</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{--    @push('js')--}}
{{--    <!-- Select2-->--}}
{{--    <script>--}}
{{--        $(function() {--}}
{{--            $('.select2CustomerId').select2().on('change',--}}
{{--                function() {--}}
{{--                @this.set('customer_id', $(this).val());--}}
{{--                });--}}
{{--        })--}}
{{--    </script>--}}
</div>
