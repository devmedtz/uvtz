<?php

namespace App\Http\Livewire\Inventory;

use App\Models\ProductCategory;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class InventoryCategory extends Component
{
    public $inputs = [];
    public $showEditModal = false;
    public $_inv_category;
    public $categoryIdBeingRemoved = null;

    public function addInventoryCategory(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }

    public function createInvCategory(){
        $validatedData = Validator::make($this->inputs, [
            'category_code' => 'required|unique:product_categories',
            'category_name' => 'required'
        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        if (ProductCategory::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Inventory Category created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to create Inventory Category']);
        }
    }
    public function editInvCategory(ProductCategory $category){
        $this->showEditModal = true;
        $this->_inv_category = $category;
        $this->inputs = $category->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateInvCategory(){
        $validatedData = Validator::make($this->inputs, [
            'category_code' => 'required',
            'category_name' => 'required'
        ])->validate();
        $validatedData['created_by'] = Auth()->user()->name;
        if ($this->_inv_category->update($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Inventory Category Updated Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to Update Inventory Category']);
        }
    }
    public function invCategoryIdToDelete($categoryId){
        $this->categoryIdBeingRemoved = $categoryId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteInvCategory(){
        $invCategory = ProductCategory::findorFail($this->categoryIdBeingRemoved);
        $invCategory->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Inventory Category deleted successfully!']);

    }
    public function render()
    {
        $invCategory = ProductCategory::paginate();
        return view('livewire.inventory.inventory-category', [
            'invCategory' => $invCategory
        ]);
    }
}
