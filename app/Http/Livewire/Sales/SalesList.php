<?php

namespace App\Http\Livewire\Sales;

use App\Models\Product;
use App\Models\SalePayment;
use App\Models\Sales;
use App\Models\SalesDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class SalesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $showEditModal = false;
    public $inputs = [];
    public $orderId;
    public $orderIdToRemove = null;
    public $invNumber;
    public $balance;
    public $search = '';
    public $searches;
    public $orderStatus;
    public $statuses = [
        '',
        'Paid',
        'Partial',
        'Unpaid',
    ];
    public $paymentMd = [
        'Cash',
        'Bank',
        'Mobile',
    ];

    public function mount(){
        $this->orderStatus = 'All';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function addPayment($orderId){
        $this->inputs = [];
        $this->orderId = $orderId;
        $sale = Sales::where('id', $this->orderId)->first();
        $this->invNumber = $sale->inv_no;
        $this->balance = $sale->total_amount - $sale->paid_amount;
        $this->dispatchBrowserEvent('show-form');
    }
    public function saveAddPayment(){
        $validatedData = Validator::make($this->inputs, [
            'paid_amount' => 'required|integer',
            'payment_method' => 'required'
        ])->validate();
        $balance = Sales::where('id', $this->orderId)->first();
        $order_mount = $balance->total_amount;
        $paid_amount = $balance->paid_amount;
        $r_balance = $order_mount - $paid_amount;
        $payment_status = 'paid';
        if($r_balance > 0 && $r_balance > $validatedData['paid_amount']){
            $payment_status = 'Partial';
            $paid_amount = $validatedData['paid_amount'];
        }elseif($r_balance > 0 && $r_balance < $validatedData['paid_amount']){
            $payment_status = 'Paid';
            $paid_amount = $r_balance;
        }
        $payment = Sales::find($this->orderId);
        $payment->status = ($order_mount == $paid_amount);
        $payment->paid_amount += $paid_amount;
        $payment->payment_status = $payment_status;
        if ($payment->save()){
            $paymentTbl = new SalePayment();
            $paymentTbl->status = true;
            $paymentTbl->sale_id = $this->orderId;
            $paymentTbl->date = $this->inputs['date'];
            $paymentTbl->created_by = Auth::user()->name;
            $paymentTbl->amount = $validatedData['paid_amount'];
            $paymentTbl->payment_method = $validatedData['payment_method'];
            if($paymentTbl->save()){
                $this->dispatchBrowserEvent('hide-form', ['message' => 'Payment was successfully processed']);
            }else{
                $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Processed Payment']);
            }
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Processed Payment']);
        }
    }
    public function markPaid($orderId){
        $this->inputs = [];
        $this->orderId = $orderId;
        $sale = Sales::where('id', $this->orderId)->first();
        $this->invNumber = $sale->inv_no;
        $this->balance = $sale->total_amount - $sale->paid_amount;
        $this->dispatchBrowserEvent('show-form1');
    }
    public function saveMarkPaid(){
        $validatedData = Validator::make($this->inputs, [
            'payment_method' => 'required'
        ])->validate();
        $balance = Sales::where('id', $this->orderId)->first();
        $order_mount = $balance->total_amount;
        $paid_amount = $balance->paid_amount;
        $r_balance = $order_mount - $paid_amount;
        $payment = Sales::find($this->orderId);
        $payment->status = ($order_mount == $paid_amount);
        $payment->paid_amount += $r_balance;
        $payment->payment_status = 'Paid';
        if ($payment->save()){
            $paymentTbl = new SalePayment();
            $paymentTbl->status = true;
            $paymentTbl->sale_id = $this->orderId;
            $paymentTbl->date = $this->inputs['date'];
            $paymentTbl->created_by = Auth::user()->name;
            $paymentTbl->amount = $r_balance;
            $paymentTbl->payment_method = $validatedData['payment_method'];
            if($paymentTbl->save()){
                $this->dispatchBrowserEvent('hide-form1', ['message' => 'Payment was successfully processed']);
            }else{
                $this->dispatchBrowserEvent('fail', ['message' => 'Fail to Processed Payment']);
            }
        }
    }
    public function cancelOrder($orderId){
        $this->inputs = [];
        $this->orderIdToRemove = $orderId;
        $this->orderId = $orderId;
        $sale = Sales::where('id', $this->orderId)->first();
        $this->invNumber = $sale->inv_no;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteOrder(){
        $orders = SalesDetails::where('sale_id', $this->orderIdToRemove)->get();
        foreach($orders as $order){
            $saleDetails = Product::find($order->product_id);
            $saleDetails->product_quantity += $order->quantity;
            $del = $saleDetails->save();
        }
        if($del){
            $_order  = Sales::findOrFail($this->orderIdToRemove);
            if($_order->delete()){
                $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'Payment was successfully processed']);
            }else{
                $this->dispatchBrowserEvent('show-delete-modal',['message' =>'Fail to delete Order']);
            }
        }
    }

    public function render()
    {
        $search= '%'.$this->search.'%';
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
            ->where('payment_status','<>', 'paid')
            ->latest()->paginate(15);

        return view('livewire.sales.sales-list',[
            'sales' => $sales,
        ]);
    }
}
