<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Sales</h4> <p>Make New Sales</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Sales</a></li>
                    <li class="breadcrumb-item active">POS</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 mt-3">
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
                <div class="card-header justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Product Category</h4>
                </div>
                <div class="card-body">
                    <select class="form-control col-md-6 col-sm-12">
                        <option value="">All Products</option>
                    </select>
                    <div class="table-responsive mt-3">
                        <div class="documents grid">
                            {{--For loop Start here--}}
                            @foreach($products as $product)
                            <div wire:click.prevent="selectProduct({{ $product }})" class="document folder-documents" style="cursor: pointer;">
                                <div class="document-content border">
                                    <div class="document-profile">
                                        <div class="document-info">
                                            <p class="user badge badge-primary font-size-10">Stock: {{ $product->product_quantity }}</p>
                                             <p class="document-name mt-3"><strong>{{ $product->product_name }}</strong></p>
                                             <p class="mb-0 user text-primary">Tsh: {{number_format($product->product_price)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endforeach
                            {{--For loop end here--}}
                        </div>

                        <div class="d-flex justify-content-end">
                            {{--{{ $sites->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Shopping Cart </h4>
                </div>
                <div class="card-body">
                    <div class="btn-group col-md-10" role="group">
                        <button type="button" class="btn btn-outline-primary btn-xs col-md-4"><i class="fa fa-user-plus"></i></button>
                        <select wire:model="customer_id" id="customer_id" class="form-control col-md-12 col-sm-12">
                            <option value="" selected>Select Customer</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}"> {{$customer->customer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
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
                                            @include('livewire.includes.product-cart-quantity')
                                        </td>
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
                                <th>(-) {{ Cart::instance($cart_instance)->discount() }}</th>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <th></th>
                                <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                                <th>(+) {{ number_format($shipping) }}</th>
                            </tr>
                            <tr>
                                <th class="text-secondary">Grand Total</th>
                                @php
                                    $total_with_shipping = Cart::instance($cart_instance)->total()
                                @endphp
                                <th></th>
                                <th class="text-secondary">
                                    (=) {{ $total_with_shipping }}
                                </th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="total_amount" value="{{ $total_with_shipping }}">
                        <div class="row">
                            <div class="col-5">
                                <label for="discount">Discount</label>
{{--                                <input type="text" wire:model.defer="inputs.material_unit" id="name" class="form-control @error('material_unit') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1" placeholder="0">--}}
                                <input wire:model.lazy="global_discount" type="number" class="form-control" name="discount_percentage" min="0" max="100" value="{{$global_discount}}" required>
                            </div>
                            <div class="col-5">
                                <label for="discount">Shipping</label>
{{--                                <input type="text" wire:model.defer="inputs.material_unit" id="name" class="form-control @error('material_unit') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1" placeholder="0">--}}
                                <input wire:model.lazy="shipping" type="number" class="form-control" name="shipping_amount" min="0" value="0" required step="0.01">
                            </div>

                            <div class="form-group d-flex justify-content-center flex-wrap mt-3 ml-3">
                                <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i class="bi bi-x"></i> Reset</button>
{{--                                <button wire:loading.attr="disabled" wire:click="proceed" type="button" class="btn btn-pill btn-primary" {{  $total_amount == 0 ? 'disabled' : '' }}><i class="bi bi-check"></i> Proceed</button>--}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
