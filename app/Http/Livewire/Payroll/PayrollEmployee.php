<?php

namespace App\Http\Livewire\Payroll;

use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class PayrollEmployee extends Component
{
    public $inputs = [];
    public $showEditModal = false;
    public $_employee;
    public $emp_id;
    public $employeeIdBeingRemoved = null;

    public function addEmployee(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }

    public function createEmployee(){
        $validatedData = Validator::make($this->inputs, [
            'emp_name' => 'required',
            'phone' => 'required|unique:employees',
            'title' => 'required',
        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        if (Employee::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Employee created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to create Employee']);
        }
    }
    public function editEmployee(Employee $employee){
        $this->showEditModal = true;
        $this->_employee = $employee;
        $this->inputs = $employee->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateEmployee(){
        $validatedData = Validator::make($this->inputs, [
            'emp_name' => 'required',
            'phone' => 'required',
            'title' => 'required',
        ])->validate();
        $validatedData['created_by'] = Auth()->user()->name;
        if ($this->_employee->update($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Employee Updated Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to Update Employee']);
        }
    }
    public function employeeIdToDelete($employeeId){
        $this->customerIdBeingRemoved = $employeeId;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteEmployee(){
        $invCategory = Employee::findorFail($this->employeeIdBeingRemoved);
        $invCategory->delete();
        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Employee deleted successfully!']);

    }

    public function payments($empId) {
        $this->showEditModal = false;
        $this->inputs = [];
        $this->emp_id = $empId;
        $this->dispatchBrowserEvent('show-emp-form');
    }
    public function createEmployeePayment(){
        $validatedData = Validator::make($this->inputs, [
            'salary_month' => 'required',
            'salary_amount' => 'required',
        ])->validate();
        $validatedData['status'] =  true;
        $validatedData['emp_id'] =  $this->emp_id;
        $validatedData['created_by'] =  Auth()->user()->name;
//        dd($validatedData);
        if(EmployeeSalary::create($validatedData)){
            $this->dispatchBrowserEvent('hide-emp-form', ['message' => 'EmployeeSalary  created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to create EmployeeSalary']);
        }
    }

    public function payrollMonth(){
        $data = array();
        for ($i = 0; $i >= -1; $i--) {
            $month = Carbon::today()->startOfMonth()->subMonth($i);
            $year = Carbon::today()->startOfMonth()->subMonth($i)->format('M, Y');
            array_push($data, array(
                'month' => $month->shortMonthName,
                'year' => $year
            ));
        }
        return $data;
    }

    public function render()
    {
        $employees = Employee::paginate();
        return view('livewire.payroll.payroll-employee', [
            'employees' => $employees,
            'payrollMonth' => $this->payrollMonth()
        ]);
    }
}
