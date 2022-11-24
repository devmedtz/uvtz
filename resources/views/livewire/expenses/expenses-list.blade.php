<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">{{$catName}} Category</h4> <p>Details Of Expenses</p></div>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @can('create_expenses')
                    <button wire:click.prevent="addExpenses" class="btn btn-primary"><i class="fa fa-plus"></i> New Expenses</button>
                @endcan
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Details of .......</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-4">
                        <input type="text" class="form-control col-md-4 col-sm-12" placeholder="Search......"/>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($expenses as $expens)
                                <tr>
                                    <td>{{$expens->date}}</td>
                                    <td>{{$expens->details}}</td>
                                    <td>{{number_format($expens->amount)}}</td>
                                    <td>{{$expens->created_by}}</td>
                                    <td>
                                        @can('edit_expenses')
                                        <a class="action-icon text-primary" href="" wire:click.prevent="editExpDetails({{$expens}})">
                                            <i class="mdi mdi-pen mr-2"></i></a>
                                        <a class="action-icon text-danger" href="" wire:click.prevent="expDetailsIdToDelete({{$expens->id}})">
                                            <i class="mdi mdi-delete mr-2"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>User</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--Add inventory Category Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateExpenses' : 'createExpenses'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="standard-modalLabel">
                                    @if ($showEditModal)
                                        <span>Update Expenses</span>
                                    @else
                                        <span>Add Expenses</span>
                                    @endif
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Details</label>
                                    <input type="text" wire:model.defer="inputs.details" id="name" class="form-control @error('details') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('details')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Amount</label>
                                    <input type="number" wire:model.defer="inputs.amount" id="name" class="form-control @error('amount') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('amount')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Expenses Date</label>
                                    <input type="date" wire:model.defer="inputs.date" id="name" class="form-control @error('date') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
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
            <!--Delete inventory Category Modal -->
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
                            <button type="button" wire:click.prevent="deleteExpDetails" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
