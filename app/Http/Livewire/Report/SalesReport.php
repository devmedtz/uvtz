<?php

namespace App\Http\Livewire\Report;

use App\Models\Sales;
use Livewire\Component;
use Livewire\WithPagination;

class SalesReport extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $searches;
    public $statuses = [
        '',
        'Paid',
        'Partial',
        'Unpaid',
    ];
    public function render()
    {
        $search = '%'.$this->search.'%';
        $searches= $this->searches.'%';

        $sales = Sales::
        where(function($query) use ($search){
            $query->where('inv_no','LIKE',$search);
            $query->orWhere('customer_name','LIKE',$search);
            $query->orWhere('created_by','LIKE',$search);
        })
            ->where(function($query) use ($searches){
                $query->orWhere('payment_status','LIKE',$searches);
            })
            ->where('payment_status','paid')
            ->latest()->paginate(15);
        return view('livewire.report.sales-report', [
            'sales' => $sales,
        ]);
    }
}
