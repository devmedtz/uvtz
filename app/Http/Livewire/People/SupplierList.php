<?php

namespace App\Http\Livewire\People;

use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class SupplierList extends Component
{
    public $inputs = [];
    public $showEditModal = false;
    public $_supplier;
    public $suppliersIdBeingRemoved = null;

    public function addSupplier(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }

    public function createSupplier(){
        $validatedData = Validator::make($this->inputs, [
            'supplier_name' => 'required',
            'supplier_phone' => 'required|unique:suppliers',
            'supplier_city' => 'required',
            'supplier_address' => 'required'
        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        if (Supplier::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Supplier created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to create Supplier']);
        }
    }
    public function editSupplier(Supplier $supplier){
        $this->showEditModal = true;
        $this->_supplier = $supplier;
        $this->inputs = $supplier->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateSupplier(){
        $validatedData = Validator::make($this->inputs, [
            'supplier_name' => 'required',
            'supplier_phone' => 'required',
            'supplier_city' => 'required',
            'supplier_address' => 'required'
        ])->validate();
        $validatedData['created_by'] = Auth()->user()->name;
        if ($this->_supplier->update($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Inventory Category Updated Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to Update Inventory Category']);
        }
    }
    public function supplierIdToDelete($supplierId){
        $this->suppliersIdBeingRemoved = $supplierId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteSupplier(){
        $invCategory = Supplier::findorFail($this->suppliersIdBeingRemoved);
        $invCategory->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Inventory Category deleted successfully!']);

    }
    public function render()
    {
        $suppliers = Supplier::
            leftJoin('supplier_details', 'supplier_details.supplier_id', 'suppliers.id')
            ->select('suppliers.*', )
            ->paginate();
        return view('livewire.people.supplier-list', [
            'suppliers' => $suppliers
        ]);
    }
}
