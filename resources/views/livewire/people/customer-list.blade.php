<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Customer</h4> <p>List of all Customer</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Customer</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @role('Super Admin')
                <button wire:click.prevent="addCustomer" class="btn btn-primary"><i class="fa fa-plus"></i> Add Customer</button>
                @endrole
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Available Customer</h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control col-md-4 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="display table" >
                            <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Customer City</th>
                                <th>Customer Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td><a style="color: #4c75f2" href="#">{{$customer->customer_name}}</a></td>
                                    <td>{{$customer->customer_phone}}</td>
                                    <td>{{$customer->customer_city}}</td>
                                    <td>{{$customer->customer_address}}</td>
                                    <td>
                                        @if ($customer->status == 1) <span wire:click.prevent="#({{$customer}})" style="cursor: pointer;" class="badge outline-badge-primary">Active</span>@endif
                                        @if ($customer->status == 0) <span wire:click.prevent="#({{$customer}})" style="cursor: pointer;" class="badge outline-badge-warning">Disabled</span> @endif
                                    </td>
                                    <td>
                                        <a class="line-h-1 h6 text-success" href="" wire:click.prevent="editCustomer({{$customer}})">
                                            <i class="fa fa-edit mr-2"></i></a>
                                        <a class="line-h-1 h6 text-danger" href="" wire:click.prevent="customerIdToDelete({{$customer->id}})">
                                            <i class="fa fa-trash mr-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Customer City</th>
                                <th>Customer Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!--Add Customer Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateCustomer' : 'createCustomer'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    @if ($showEditModal)
                                        <span>Update Customer</span>
                                    @else
                                        <span>Add Customer</span>
                                    @endif
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
            <!--Delete Customer Modal -->
            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Delete Expenses Category</h5>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger">Are you sure you want to delete this Expenses Category ?</h5>
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
