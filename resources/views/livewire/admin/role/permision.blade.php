<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Permissions</h4> <p>List of Permissions</p></div>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center">Permission not in role</h4>

                            <form wire:submit.prevent="createPermission">
                                <div class="card-body">
                                        <div class="row">
                                            @foreach($permissionNotInRole as $permission)
                                                <div wire:key="{{ $permission }}" class="col-4 mt-2">
                                                    <label class="chkbox">{{$permission}}
                                                        <input wire:model="permissions" value="{{$permission}}" class="form-check-input" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        Add
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center">Permission in role</h4>

                            <form wire:submit.prevent="removePermission">
                                <div class="card-body">
                                        <div class="row">
                                            @foreach($permissionInRole as $permission)
                                                <div wire:key="{{ $permission }}" class="col-4 mt-2">
                                                    <label class="chkbox">{{$permission}}
                                                        <input wire:model="permissions" value="{{$permission}}" class="form-check-input" type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-danger">
                                        Remove
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
