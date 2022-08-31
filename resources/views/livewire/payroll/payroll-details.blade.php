<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">{{$empName}} </h4> <p>Salary report</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Payroll</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @role('Super Admin')
                <button wire:click.prevent="addSalary" class="btn btn-primary"><i class="fa fa-plus"></i> Pay Salary</button>
                @endrole
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
                    <input type="text" class="form-control col-md-4 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="display table" >
                            <thead>
                            <tr>
                                <th>Pay Date</th>
                                <th>Salary Mouth</th>
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
                                        <a class="line-h-1 h6 text-success" href="" wire:click.prevent="editSalary({{$empSal}})">
                                            <i class="fa fa-edit mr-2"></i></a>
                                        <a class="line-h-1 h6 text-danger" href="" wire:click.prevent="salaryToDelete({{$empSal->id}})">
                                            <i class="fa fa-trash mr-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Pay Date</th>
                                <th>Salary Mouth</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--pay Employee Salary Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateSalary' : 'createSalary'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    @if ($showEditModal)
                                        <span>Update Employee Salary</span>
                                    @else
                                        <span>Pay Employee Salary</span>
                                    @endif
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                            <button type="button" wire:click.prevent="deleteSalary" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
