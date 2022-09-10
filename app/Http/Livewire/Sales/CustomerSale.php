<?php

namespace App\Http\Livewire\Sales;

use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerSale extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $customer_id;
    public $showEditModal = false;
    public $search;

    public function mount($customer_id = null){
        $this->customer_id = $customer_id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        $customerSales = Sales::
            join('customers','customers.id','sales.customer_id')
            ->select('sales.*','customers.customer_name')
            ->where(function($query) use ($search){
                $query->where('sales.inv_no','LIKE',$search);
            })
            ->where('customers.id',decrypt($this->customer_id))
            ->paginate();

        $customer = Sales::
            join('customers','customers.id','sales.customer_id')
            ->select('sales.*','customers.customer_name')
            ->where('customers.id',decrypt($this->customer_id))
            ->first();

        $payStatus = Sales::where('customer_id',decrypt($this->customer_id))
            ->groupBy('payment_status')
            ->select( DB::raw('payment_status , COUNT(*) as status_count') )
            ->get();
        return view('livewire.sales.customer-sale',[
//            dd($payStatus),
            'customer'  => $customer,
            'payStatus'  => $payStatus,
            'customerSales'  => $customerSales
        ]);
    }
}
