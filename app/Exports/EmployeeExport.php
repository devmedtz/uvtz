<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $empSiteId;

    public function __construct($empSiteId)
    {
        $this->empSiteId = $empSiteId;
    }
    public function map($employee): array {
        return [
//            $employee->payroll_no,
            $employee->name,
            $employee->positions->position_name,
//            $employee->depatriments->dpt_name,
//            $employee->salaries->net_salary + $employee->salaries->allowance,
//            $employee->all_amount,
//            $employee->phone,
            $employee->bank_name,
            $employee->ac_no,
        ];
    }

    public function titles(){
        return 'KIWANGO SECURITY GUARD, EMPLOYEE';
    }

    public function headings(): array{
        return [
//            'Payroll No',
            'Employee Name',
            'Position',
//            'Department',
            'Salary',
//            'Allowance',
//            'Phone No',
            'Bank',
            'Account No',
        ];
    }

    public function query(){
        return Employee::whereIn('position_id', $this->empSiteId);
    }
}
