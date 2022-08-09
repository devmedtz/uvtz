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
    public $inputs = [];

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
