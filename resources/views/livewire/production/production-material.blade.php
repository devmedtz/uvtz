<div>
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0 text-secondary">Production</h4> <p>List of Production Materials</p></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Production</a></li>
                    <li class="breadcrumb-item active">Materials</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="float-left">
                @role('Super Admin')
                <button wire:click.prevent="addProductionMaterial" class="btn btn-primary"><i class="fa fa-plus"></i> Add Materials</button>
                @endrole
            </div>
        </div>
    </div>
    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-header  justify-content-between align-items-center">
                    <h4 class="card-title text-secondary">Available Production Materials</h4>
                </div>
                <div class="card-body">
                    <input type="text" class="form-control col-md-4 col-sm-12" placeholder="Search......"/>
                    <div class="table-responsive mt-3">
                        <table class="display table" >
                            <thead>
                                <tr>
                                    <th>Materials Name</th>
                                    <th>Available Qty</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($productionMater as $material)
                                <tr>
                                    <td><a style="color: #4c75f2" href="{{ route('production.details', ['material_id' => \encrypt($material->id)]) }}">{{$material->material_name}}<a></td>
                                    <td>{{$material->available_unit}} {{$material->material_unit}}</td>
                                    <td>{{$material->material_note}}</td>
                                    <td>
                                        <a class="line-h-1 h6 text-primary" href="" wire:click.prevent="editProductionMaterial({{$material}})">
                                            <i class="fa fa-edit mr-2"></i></a>
                                        <a class="line-h-1 h6 text-secondary" href="" wire:click.prevent="productionMaterialsIdToDelete({{$material->id}})">
                                            <i class="fa fa-trash mr-2"></i></a>
                                        <a class="line-h-1 h6 text-success" href="" wire:click.prevent="materialsQty({{$material->id}})">
                                            <i class="fa fa-plus mr-2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Materials Name</th>
                                    <th>Available Qty</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!--Add Production Materials Modal -->
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="{{ $showEditModal ? 'updateProductionMaterial' : 'createProductionMaterial'}}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    @if ($showEditModal)
                                        <span class="text-secondary">Update Production Materials</span>
                                    @else
                                        <span class="text-secondary">Add Production Materials</span>
                                    @endif
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Material Name</label>
                                    <input type="text" wire:model.defer="inputs.material_name" id="name" class="form-control @error('material_name') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('material_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Material Unit</label>
                                    <input type="text" wire:model.defer="inputs.material_unit" id="name" class="form-control @error('material_unit') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('material_unit')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Material Quantity</label>
                                    @if($showEditModal)
                                        <input type="number" disabled wire:model.defer="inputs.available_unit" id="name" class="form-control @error('available_unit') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @else
                                        <input type="number"  wire:model.defer="inputs.available_unit" id="name" class="form-control @error('available_unit') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @endif
                                    @error('available_unit')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Date</label>
                                    <input type="date" wire:model.defer="inputs.mat_date" id="name" class="form-control @error('mat_date') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('mat_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Note</label>
                                    <textarea wire:model.defer="inputs.material_note" rows="4" cols="4" id="name" class="form-control @error('material_note') is-invalid @enderror"></textarea>
                                    @error('material_note')
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
            <!--Change Material Quantity Modal -->
            <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <form wire:submit.prevent="changeMaterialsQty">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">
                                    <span class="text-secondary"> {{$changeMate}}</span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Action</label>
                                    <select wire:model.defer="inputs.action" id="name" class="form-control @error('action') is-invalid @enderror">
                                        <option selected>Choose Action</option>
                                        @foreach($actions as $key =>  $values)
                                            <option value="{{$key}}">{{$values}}</option>
                                        @endforeach
                                    </select>
                                    @error('action')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Quantity</label>
                                    <input type="number" wire:model.defer="inputs.qty" id="name" class="form-control @error('qty') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('qty')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Date</label>
                                    <input type="date" wire:model.defer="inputs.mat_date" id="name" class="form-control @error('mat_date') is-invalid @enderror" aria-label="name" aria-describedby="basic-addon1">
                                    @error('mat_date')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="col-form-label">Note</label>
                                    <textarea wire:model.defer="inputs.material_note" rows="4" cols="4" id="name" class="form-control @error('material_note') is-invalid @enderror"></textarea>
                                    @error('material_note')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    <span>Save Changes</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--Delete Production Materials Modal -->
            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Delete Production Materials</h5>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-danger">Are you sure you want to delete this Production Materials ?</h5>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-outline-success" data-dismiss="modal">No</button>
                            <button type="button" wire:click.prevent="deleteProductionMaterials" class="btn btn-outline-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
