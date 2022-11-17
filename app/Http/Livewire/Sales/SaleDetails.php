<?php

namespace App\Http\Livewire\Sales;

use App\Models\SalePayment;
use App\Models\Sales;
use App\Models\SalesDetails;
use Livewire\Component;

class SaleDetails extends Component
{
    public $sale_id;
    public $showEditModal = false;

    public function mount($sale_id = null){
        $this->sale_id = $sale_id;
    }

    public function render()
    {
        $sales = SalesDetails::
            join('sales','sales.id','sales_details.sale_id')
            ->select('sales_details.*','sales.inv_no')
            ->where('sales.id',decrypt($this->sale_id))
            ->get();
        $payments = SalePayment::where('sale_id',decrypt($this->sale_id))->get();
        $saleInfo = Sales::where('sales.id',decrypt($this->sale_id))->first();
        return view('livewire.sales.sale-details',[
            'sales' => $sales,
            'saleInfo' => $saleInfo,
            'payments' => $payments,
        ]);
    }
}
