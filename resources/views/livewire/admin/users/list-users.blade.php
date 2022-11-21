<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Users</h4> <p>List of all users</p></div>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @can('create_user')
                <button wire:click.prevent="addNew" class="btn btn-primary"><i class="fa fa-plus"></i> Add New User</button>
                @endcan
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-4">
                        <input type="text" class="form-control col-md-4 col-sm-12" placeholder="Search......"/>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-centered mb-0" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a class="action-icon text-primary" href="" wire:click.prevent="editUser({{$user}})">
                                                <i class="mdi mdi-account-edit mr-2"></i></a>
                                            <a class="action-icon text-danger" href="" wire:click.prevent="confirmUserRemoval({{$user->id}})">
                                                <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!--Add User Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalstandard-modalLabelLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'createUser'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="standard-modalLabel">
                                    @if ($showEditModal)
                                        <span>Update User</span>
                                    @else
                                        <span>Add new User</span>
                                    @endif
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label">Name</label>
                                        <div class="form-group mb-3">
                                            <input type="text" wire:model.defer="state.name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" aria-label="name" aria-describedby="basic-addon1">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label">Email</label>
                                        <div class="form-group mb-3">
                                            <input type="email" wire:model.defer="state.email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" aria-describedby="basic-email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                        <div class="form-group mb-3">
                                            <select wire:model.defer="state.role" class="form-control @error('password') is-invalid @enderror">
                                                <option value="">Select User Role</option>
                                                @foreach ($user_role as $role)
                                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label">Password</label>
                                        <div class="form-group mb-3">
                                            <input type="password" wire:model.defer="state.password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="basic-password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="row">
                                    <label for="username" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="form-group mb-3">
                                            <input type="password" wire:model.defer="state.confirm_password" id="confirm_password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-password">
                                        </div>
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
            <!--Delete User Confirmation Modal -->
            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Delete User</h5>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger">Are you sure you want to delete this user ?</h5>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                            <button type="button" wire:click.prevent="deleteUser" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
