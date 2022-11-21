<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">{{$empName}} </h4> <p>Salary report</p></div>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @can('create_payroll')
                    <button wire:click.prevent="addSalary" class="btn btn-primary"><i class="fa fa-plus"></i> Pay Salary</button>
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
                        <table class="table table-sm table-centered mb-0" >
                            <thead>
                            <tr>
                                <th>Pay Date</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($empSalary as $empSal)
                                <tr>
                                    <td>{{$empSal->pay_date}}</td>
                                    <td>{{$empSal->salary_month}}</td>
                                    <td>{{number_format($empSal->salary_amount)}}</td>
{{--                                    <td>{{$empSal->created_by}}</td>--}}
                                    <td>
                                        @can('edit_payroll')
                                            <a class="line-h-1 h6 text-success" href="" wire:click.prevent="editSalary({{$empSal}})">
                                                <i class="fa fa-edit mr-2"></i></a>
                                            <a class="line-h-1 h6 text-danger" href="" wire:click.prevent="salaryToDelete({{$empSal->id}})">
                                                <i class="fa fa-trash mr-2"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Pay Date</th>
                                <th>Month</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--pay Employee Salary Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateSalary' : 'createSalary'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="standard-modalLabel">
                                    @if ($showEditModal)
                                        <span>Update Employee Salary</span>
                                    @else
                                        <span>Pay Employee Salary</span>
                                    @endif
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Salary Month</label>
                                    <input type="month" wire:model.defer="inputs.salary_month" id="name" class="form-control @error('salary_month') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('salary_month')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Amount</label>
                                    <input type="number" wire:model.defer="inputs.salary_amount" id="name" class="form-control @error('salary_amount') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('salary_amount')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Payment Date</label>
                                    <input type="date" wire:model.defer="inputs.pay_date" id="name" class="form-control @error('pay_date') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('pay_date')
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
                            <h5>Delete Salary</h5>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger">Are you sure you want to delete this Salary?</h5>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">No</button>
                            <button type="button" wire:click.prevent="deleteSalary" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
