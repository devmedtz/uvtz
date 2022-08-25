<?php

namespace App\Http\Livewire\Payroll;

use App\Models\Employee;
use App\Models\EmployeeDetails;
use App\Models\EmployeeSalary;
use App\Models\Expenses;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class PayrollDetails extends Component
{
    public $emp_id;
    public $inputs = [];
    public $showEditModal = false;

    public function mount($emp_id = null){
        $this->emp_id = $emp_id;
    }

    public function addSalary(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }
    public function createSalary(){
        $validatedData = Validator::make($this->inputs, [
            'salary_amount' => 'required',
            'salary_month' => 'required',
            'pay_date' => 'required',
        ])->validate();
        $validatedData['created_by'] = Auth()->user()->name;
        $validatedData['emp_id'] = decrypt($this->emp_id);
        if(EmployeeSalary::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Salary Payed Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Pay Salary']);
        }
    }
    public function render()
    {
        $empName = Employee::where('id', decrypt($this->emp_id))->value('emp_name');
        $empSalary = EmployeeSalary::where('emp_id', decrypt($this->emp_id))->latest('id')->get();
        return view('livewire.payroll.payroll-details',[
            'empName' => $empName,
            'empSalary' => $empSalary,
        ]);
    }
}
