<?php

namespace App\Http\Livewire\Production;

use App\Models\ProductionDetails;
use App\Models\ProductionMaterials;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ProductionMaterial extends Component
{
    public $inputs = [];
    public $inpChMate = [];
    public $changeMateId;
    public $showEditModal = false;
    public $_productionMaterial;
    public $productionMaterialIdBeingRemoved = null;
    public $actions = [
        1 => 'Use Material',
        2 => 'Add Material',
    ];

    public function addProductionMaterial(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }

    public function createProductionMaterial(){
        $validatedData = Validator::make($this->inputs, [
            'material_name' => 'required|unique:production_materials',
            'material_unit' => 'required',
            'available_unit' => 'required',
            'material_note' => 'required'
        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        $validatedData['total_unit'] = $validatedData['available_unit'];
        if (ProductionMaterials::create($validatedData)){
            $prodDetails_id = ProductionMaterials::latest()->value('id');
            $prodDetails = [
                'production_id' => $prodDetails_id,
                'action' => 2,
                'qty' => $validatedData['available_unit'],
                'mat_date' => $this->inputs['mat_date'],
                'material_note' => $validatedData['material_note'],
                'status' => true,
                'created_by' => $validatedData['created_by'],
            ];
            ProductionDetails::create($prodDetails);
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Production Material created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to create Production Material']);
        }
    }
    public function editProductionMaterial(ProductionMaterials $production){
        $this->showEditModal = true;
        $this->_productionMaterial = $production;
        $this->inputs = $production->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateProductionMaterial(){
        $validatedData = Validator::make($this->inputs, [
            'material_name' => 'required',
            'material_unit' => 'required',
            'available_unit' => 'required',
            'material_note' => 'required'
        ])->validate();
        $validatedData['created_by'] = Auth()->user()->name;
        $validatedData['total_unit'] = $validatedData['available_unit'];
        if ($this->_productionMaterial->update($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Production Material Updated Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to Update Production Material']);
        }
    }
    public function productionMaterialsIdToDelete($productionMaterialId){
        $this->productionMaterialIdBeingRemoved = $productionMaterialId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteProductionMaterials(){
        $prodMaterial = ProductionMaterials::findorFail($this->productionMaterialIdBeingRemoved);
        if ($prodMaterial->delete()){
            $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Production Material deleted successfully!']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to deleted successfully!']);
        }

    }
    public function materialsQty($changeMateId){
        $this->inputs = [];
        $this->changeMateId = $changeMateId;
        $this->dispatchBrowserEvent('show-form1');
    }
    public function changeMaterialsQty(){
        $validatedData = Validator::make($this->inputs, [
            'qty' => 'required',
            'action' => 'required',
            'mat_date' => 'required',
            'material_note' => 'required',
        ])->validate();
        $validatedData['production_id'] = $this->changeMateId;
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        if($validatedData['action'] == 1){
            $avUnit = ProductionMaterials::where('id', $this->changeMateId)->value('available_unit');
            if ($avUnit >= $validatedData['qty']){
                if(ProductionDetails::create($validatedData)){
                    $saved = ProductionMaterials::where('id', $this->changeMateId)->update([
                        'available_unit' => $avUnit - $validatedData['qty'],
                    ]);
                    if($saved){
                        $this->dispatchBrowserEvent('hide-form1', ['message' => 'Material Used Successfully!']);
                    }else{
                        ProductionMaterials::where('id', $this->changeMateId)->update([
                            'available_unit' => $avUnit + $validatedData['qty'],
                        ]);
                        $this->dispatchBrowserEvent('fail', ['message' => 'Check again quantity of material you want to use!']);
                    }

                }else{
                    $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Use Material, Try again!']);
                }
            }else{
                $this->dispatchBrowserEvent('fail', ['message' => 'Check again quantity of material you want to use!']);
            }
        }elseif ($validatedData['action'] == 2){
            $materialVolume = ProductionMaterials::where('id', $this->changeMateId)->first();
            $validatedData['total_unit'] = $materialVolume->total_unit + $validatedData['qty'];
            $availableMate = $materialVolume->available_unit + $validatedData['qty'];
            if (ProductionDetails::create($validatedData)){
                ProductionMaterials::where('id', $this->changeMateId)->update([
                    'available_unit' => $availableMate,
                    'total_unit' => $validatedData['total_unit'],
                ]);
                $this->dispatchBrowserEvent('hide-form1', ['message' => 'Material Used Successfully!']);
            }else{
                $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Use Material!']);
            }
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Selected Action is not recognised!']);
        }
    }
    public function render()
    {
        $productionMater = ProductionMaterials::paginate();
        $changeMate = ProductionMaterials::where('id', $this->changeMateId)->value('material_name');
        return view('livewire.production.production-material', [
            'changeMate' => $changeMate,
            'productionMater' => $productionMater,
        ]);
    }
}
