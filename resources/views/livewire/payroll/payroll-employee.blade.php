<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Employee</h4> <p>List of all Employee</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Employee</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @role('Super Admin')
                <button wire:click.prevent="addEmployee" class="btn btn-primary"><i class="fa fa-plus"></i> Add Employee</button>
                @endrole
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Available Employee</h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control col-md-4 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="display table" >
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Employee Phone</th>
                                <th>Employee Title</th>
                                <th>L.M Payed</th>
                                <th>Payed Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td><a style="color: #4c75f2" href="{{ route('payroll.details', ['emp_id' => \encrypt($employee->id)])}}">{{$employee->emp_name}}</a></td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->title}}</td>
                                    <td>{{$employee->ee}}</td>
                                    <td>{{$employee->ee}}</td>
                                    <td>
                                        @if ($employee->status == 1) <span wire:click.prevent="#({{$employee}})" style="cursor: pointer;" class="badge outline-badge-primary">Active</span>@endif
                                        @if ($employee->status == 0) <span wire:click.prevent="#({{$employee}})" style="cursor: pointer;" class="badge outline-badge-warning">Disabled</span> @endif
                                    </td>
                                    <td>
                                        <a class="line-h-1 h6 text-success" href="" wire:click.prevent="editEmployee({{$employee}})">
                                            <i class="fa fa-edit mr-2"></i></a>
                                        <a class="line-h-1 h6 text-danger" href="" wire:click.prevent="employeeIdToDelete({{$employee->id}})">
                                            <i class="fa fa-trash mr-2"></i>
                                        </a><a class="line-h-1 h6 text-info" href="" wire:click.prevent="payments({{$employee->id}})">
                                            <i class="fa fa-plus mr-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Employee Name</th>
                                <th>Employee Phone</th>
                                <th>Employee Title</th>
                                <th>L.M Payed</th>
                                <th>Payed Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!--Add Employee Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateEmployee' : 'createEmployee'}}">
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
                                    <label for="username" class="col-form-label">Employee Name</label>
                                    <input type="text" wire:model.defer="inputs.emp_name" id="name" class="form-control @error('emp_name') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('emp_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Employee Phone</label>
                                    <input type="text" wire:model.defer="inputs.phone" id="text" class="form-control @error('phone') is-invalid @enderror"/>
                                    @error('phone')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Employee Title</label>
                                    <input type="text" wire:model.defer="inputs.title" id="text" class="form-control @error('title') is-invalid @enderror"/>
                                    @error('title')
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
            <!--Pay Employee Salary Modal -->
            <div class="modal fade" id="emp-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateEmployeePayment' : 'createEmployeePayment'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="exampleModalLongTitle">
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
                                    <label for="month" class="col-form-label">Month</label>
                                    <select wire:model.defer="inputs.salary_month" class="form-control @error('salary_month') is-invalid @enderror">
                                        <option value="">Choose Month</option>
                                        @foreach($payrollMonth  as $payMonth)
                                            <option value="{{$payMonth['year']}}">{{$payMonth['month']}}</option>
                                        @endforeach
                                    </select>
                                    @error('salary_month')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Salary Amount</label>
                                    <input type="number" wire:model.defer="inputs.salary_amount" id="text" class="form-control @error('salary_amount') is-invalid @enderror"/>
                                    @error('salary_amount')
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
                            <h5>Delete Employee</h5>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger">Are you sure you want to delete this Employee ?</h5>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                            <button type="button" wire:click.prevent="deleteEmployee" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>

