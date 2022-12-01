<div>
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Inventory</h4><p>Products available in Inventory </p></div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        @can('create_inventory')
            <div class="col-md-12">
                <button wire:click.prevent="addNewProduct" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Add Product</button>
            </div>
        @endcan
    </div>
    <!-- START: Card Data-->
    <div class="row mt-1">
        <div class="col-md-12 col-lg-12 mt-12">
            <div class="card border-bottom-0">
                <div class="card-content border-bottom border-info border-w-5">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-employee" role="tabpanel" aria-labelledby="nav-employee-tab">
                                <div class="col-12 mt-2">
                                    <div class="justify-content-between align-items-center">
                                        <div class="float-end col-md-4">
                                            <input type="text"  class="form-control col-md-4" placeholder="Search.....">
                                        </div>
                                        <div class="btn-group btn-sm">
                                            <button wire:click.prevent="exportExcel" class="btn btn-outline-primary mb-2"><i class="fas fa-file-download"></i> Excel</button>
                                            <button wire:click.prevent="" class="btn btn-outline-primary mb-2"><i class="fas fa-file-download"></i> Pdf</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-centered mb-0" >
                                            <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Category Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{$product->product_code}}</td>
                                                    <td><a style="color: #4c75f2" href="{{ route('inventory.details', ['product_id' => \encrypt($product->id)]) }}">{{$product->product_name}}</a></td>
                                                    <td>Tsh {{number_format($product->product_price)}}</td>
                                                    <td>{{number_format($product->product_quantity)}} {{$product->product_unit}}</td>
                                                    <td><a style="color: #4c75f2" href="">{{$product->category_name}}</a></td>
                                                    <td>
                                                        @if ($product->status == 0) <span style="cursor: pointer;" class="badge badge-danger-lighten">Not Available</span> @endif
                                                        @if ($product->status == 1) <span class="badge badge-primary-lighten">Available</span>@endif
                                                        @if($product->temp_status == 0)
                                                            @if ($product->user_name == Auth::user()->name)
                                                                @can('approve_product')
                                                                    @if ($product->status == 2) <span wire:click.prevent="approveModel({{$product->id}})" style="cursor: pointer;" class="badge badge-warning-lighten">Approve ({{$product->temp }})</span>@endif
                                                                    @if ($product->status == 3) <span wire:click.prevent="rejectModel({{$product}})" style="cursor: pointer;" class="badge badge-danger-lighten">Rejected</span>@endif
                                                                @endcan
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @can('edit_inventory')
                                                        <a class="action-icon text-primary" href="" wire:click.prevent="editProduct({{$product}})">
                                                            <i class="mdi mdi-pen mr-2"></i></a>
                                                        <a class="action-icon text-danger" href="" wire:click.prevent="addProduct({{$product->id}})">
                                                            <i class="mdi mdi-plus mr-2"></i></a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Code</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Category Name</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <di class="d-flex justify-content-end">
                                        {{ $products->links() }}
                                    </di>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add New Product Modal -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="{{ $showEditModal ? 'updateProduct' : 'createProduct'}}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            @if ($showEditModal)
                                <span>Update Product</span>
                            @else
                                <span>Add New Product</span>
                            @endif
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="hta_id">Product Name</label>
                                <input type="text" wire:model="inputs.product_name" class="form-control @error('product_name') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                @error('product_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dpt_id">Product Code</label>
                                <input type="text" wire:model.defer="inputs.product_code" min="1" class="form-control @error('product_code') is-invalid @enderror"/>
                                @error('product_code')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dpt_id">Category</label>
                                <select  wire:model.defer="inputs.category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option selected >Choose Category</option>
                                    @foreach($prodCategory as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_of_emp">Cost</label>
                                <input type="number" wire:model.defer="inputs.product_cost" min="1" class="form-control @error('product_cost') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                @error('product_cost')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_of_emp">Sell Price</label>
                                <input type="number" wire:model.defer="inputs.product_price" min="1" class="form-control @error('product_price') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                @error('product_price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @if (!$showEditModal)
                            <div class="form-group">
                                <label for="no_of_emp">Quantity</label>
                                <input type="number" wire:model.defer="inputs.temp" min="1" class="form-control @error('temp') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                @error('temp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="no_of_emp">Alert Quantity</label>
                                <input type="number" wire:model.defer="inputs.product_stock_alert" min="1" class="form-control @error('product_stock_alert') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                @error('product_stock_alert')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_of_emp">SI Unit</label>
                                <input type="text" wire:model.defer="inputs.product_unit" class="form-control @error('product_unit') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                @error('product_unit')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dpt_id">Approve By</label>
                                <select  wire:model.defer="inputs.user_id" class="form-control @error('user_id') is-invalid @enderror">
                                    <option selected >Choose User</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="no_of_emp">Tax (%)</label>--}}
{{--                                <input type="number" wire:model.defer="inputs.product_order_tax" min="1" class="form-control @error('product_order_tax') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">--}}
{{--                                @error('product_order_tax')--}}
{{--                                <div class="invalid-feedback">--}}
{{--                                    {{$message}}--}}
{{--                                </div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="no_of_emp">Tax type</label>
                                <select wire:model.defer="inputs.product_tax_type" class="form-control @error('product_tax_type') is-invalid @enderror">
                                    <option selected> Choose Tax type</option>
                                    <option value="">Inclusive</option>
                                    <option value="">Exclusive</option>
                                </select>
                                @error('product_tax_type')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="all_type">Note</label>
                                <textarea wire:model.defer="inputs.product_note" cols="30" rows="3" class="form-control @error('product_note') is-invalid @enderror"></textarea>
                                @error('product_note')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn float-right btn-primary">
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
    <!--Approve product Modal -->
    <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="approveProducts">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="standard-modalLabel">
                            <span>Approve Products</span>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status_id">Approve</label>
                            <select wire:model.defer="inputs.temp_status" class="form-control @error('status') is-invalid @enderror">
                                <option value="" selected>Select </option>
                                <option value="1">Approve</option>
                                <option value="0">Decline</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="hta_id">Reason</label>
                            <textarea wire:model="inputs.note" cols="10" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="..."></textarea>
                            @error('note')
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
    <!--Reject product Modal -->
    <div class="modal fade" id="form3" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="approveRejectedProducts">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="standard-modalLabel">
                            <span>Rejected Products</span>
                        </h5>
                    </div>
                    <div class="modal-body">
{{--                        <div class="form-group">--}}
{{--                            <label for="status_id">Approve</label>--}}
{{--                            <select wire:model.defer="inputs.temp_status" class="form-control @error('status') is-invalid @enderror">--}}
{{--                                <option value="" selected>Select </option>--}}
{{--                                <option value="1">Approve</option>--}}
{{--                                <option value="0">Decline</option>--}}
{{--                            </select>--}}
{{--                            @error('status')--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{$message}}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label for="hta_id">Quantity</label>
                            <input type="number" wire:model="inputs.temp" class="form-control @error('temp') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                            @error('temp')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="hta_id">Reason</label>
                            <textarea disabled wire:model="inputs.note" cols="10" rows="5" class="form-control @error('note') is-invalid @enderror" placeholder="..."></textarea>
                            @error('note')
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
    <!--Increase Product quantity Modal -->
    <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <form wire:submit.prevent="addProductQty">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="text-secondary">Increase Product Quantity</span>
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="dpt_id">Approve By</label>
                            <select  wire:model.defer="inputs.user_id" class="form-control @error('user_id') is-invalid @enderror">
                                <option selected >Choose User</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status_id">Quantity</label>
                            <input type="number" wire:model.defer="inputs.temp" min="1" class="form-control @error('temp') is-invalid @enderror"/>
                            @error('temp')
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
    <!--Delete User Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete User</h5>
                </div>
                <div class="modal-body">
                    <h5 class="text-danger">Are you sure you want to delete this Position ?</h5>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                    <button type="button" wire:click.prevent="deletePosition" class="btn btn-outline-danger">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
