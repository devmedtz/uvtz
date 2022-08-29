<?php

namespace App\Http\Livewire\Expenses;

use App\Models\Expenses;
use App\Models\ExpensesCategory;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ExpensesList extends Component
{
    public $showEditModal = false;
    public $category_id;
    public $_expenses;
    public $inputs = [];
    public $expensesIdToDelete = null;

    public function mount($category_id = null){
        $this->category_id = $category_id;

    }
    public function addExpenses(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }
    public function createExpenses(){
        $validatedData = Validator::make($this->inputs, [
            'date' => 'required',
            'amount' => 'required',
            'details' => 'required',
        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        $validatedData['category_id'] = decrypt($this->category_id);
        if(Expenses::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Expenses created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to create Expenses']);
        }
    }

    public function editExpDetails(Expenses $expenses){
        $this->showEditModal = true;
        $this->_expenses = $expenses;
        $this->inputs = $expenses->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateExpenses(){
        $validatedData = Validator::make($this->inputs, [
            'date' => 'required',
            'amount' => 'required',
            'details' => 'required',
        ])->validate();
        $validatedData['created_by'] = Auth()->user()->name;
        if($this->_expenses->update($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Expenses Updated Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Updated Expenses']);
        }

    }

    public function expDetailsIdToDelete($expensesId){
        $this->expensesIdToDelete = $expensesId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteExpDetails(){
        $exp = Expenses::findorFail($this->expensesIdToDelete);
        if ($exp->delete()){
            $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Expenses deleted successfully!']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to delete Expenses!']);
        }
    }

    public function render()
    {
        $catName = ExpensesCategory::where('id', decrypt($this->category_id))->value('category_name');
        $expenses = Expenses::where('category_id', decrypt($this->category_id))->get();
        return view('livewire.expenses.expenses-list',[
            'catName' => $catName,
            'expenses' => $expenses,
        ]);
    }
}
