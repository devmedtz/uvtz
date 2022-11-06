<?php

namespace App\Http\Livewire\Sales;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesDetails;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use NumberFormatter;
use function PHPUnit\Framework\isEmpty;

class SalesPos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $discount;
    public $shipping;
    public $customer_id;
    public $selectedCustomer;
    public $inputs = [];
    public $search;
    public $searchCustomer;
    public $selectedPrId;
    public $selectedPr;
    public $prQuantity;
    public $subTotal;
    public $cart_item = [];
    public $totalPr = 0;
    public $subPrice = 0;

    public function selectedProducts() {
        $this->selectedPr = Product::where('id', '=', $this->selectedPrId)->value('product_price');
    }
    public function updatePrQuantity(){
        if ($this->prQuantity == null || $this->prQuantity == '') {
            $this->subTotal = 0;
        }else{
            $this->subTotal = $this->prQuantity * $this->selectedPr;
        }
    }
    public function addProductToCart(){
        $result = array_search($this->selectedPrId, array_column($this->cart_item, 'product_id',$this->selectedPrId));
        if ($result !== false){
            $this->dispatchBrowserEvent('fail',['message' =>'This product exists in cart']);
            $this->prQuantity = '';
            $this->selectedPrId = null;
            $this->selectedPr = 0;
            $this->subTotal = 0;
        }else{
            $product = Product::findOrFail($this->selectedPrId);
            $cart = [
                'product_qty' => $this->prQuantity,
                'product_id' => $this->selectedPrId,
                'product_price' => $this->selectedPr,
                'product_name' => $product->product_name,
                'product_code' => $product->product_code,
                'subTotal' => $this->subTotal,
            ];
            array_push($this->cart_item, $cart);
            $this->totalPr += $this->subTotal;
            $this->prQuantity = '';
            $this->selectedPrId = null;
            $this->selectedPr = 0;
            $this->subTotal = 0;
        }
    }
    public function removeProductToCart($productId) {
        $result = array_search($productId, array_column($this->cart_item, 'product_id',$productId));
        $this->totalPr -= $this->cart_item[$result]['subTotal'];
        array_splice($this->cart_item, $result,1);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function customerId($id){
        $this->customer_id  = $id;
        $this->selectedCustomer = Customer::where('id',$id)->value('customer_name');
    }

    public function render(){
        $search = '%'.$this->search.'%';
        $searchCustomer = '%'.$this->searchCustomer.'%';

        $this->customers = Customer::
            where(function($query) use ($searchCustomer){
                $query->where('customer_name','LIKE',$searchCustomer);
                $query->orWhere('customer_phone','LIKE',$searchCustomer);
            })->get();
        $this->selectedCustomer = Customer::where('id',$this->customer_id)->value('customer_name');
        $products = Product::
            where(function($query) use ($search){
                $query->where('product_name','LIKE',$search);
                $query->orWhere('product_code','LIKE',$search);
            })->get();
        return view('livewire.sales.sales-pos',[
            'products' => $products,
        ]);
    }

    private function invoiceNumber(){
        //get last record
        $record = Sales::latest('id')->first();
        //check first day in a year
        if ( date('Y-m-d',strtotime(date('Y-m-d'))) == date('Y-01-01') || empty($record)){
            $nextInvoiceNumber = date('Y').'-1000';
        } else {
            //increase 1 with last invoice number
            $expNum = explode('-', $record->inv_no);
            $nextInvoiceNumber = $expNum[0].''. $expNum[1]+0001;
        }
        return $nextInvoiceNumber;
    }

    private function generateOrderNumber(){
        $result = Sales::all();
        if($result->isEmpty()){
            $nextInvoiceNumber = date('Y').date('m').'1';
        }else{
            $record = Sales::first()->latest()->value('inv_no');
            $expNum = explode('-', $record);
            $expNum1 = $expNum[0]+1;
            if ( Carbon::today() == Carbon::parse('first day of January')){
                $nextInvoiceNumber = date('Y').date('m').'1';
            } else {
                $expNum1 = $expNum[0]+1;
                $nextInvoiceNumber = $expNum1;
//                $nextInvoiceNumber = $expNum[0].'-'. $expNum1;
            }
        }
        return $nextInvoiceNumber;
    }

    public function saveOrder() {
        if ($this->customer_id != null) {
            if($this->discount){
                $discount = $this->discount;
            }else{
                $discount = 0;
            }
            if($this->shipping){
                $shipping = $this->shipping;
            }else{
                $shipping = 0;
            }
            $sale = Sales::create([
                'date' => now()->format('Y-m-d'),
                'inv_no' => $this->generateOrderNumber(),
                'customer_id' => $this->customer_id,
                'customer_name' => Customer::findOrFail($this->customer_id)->customer_name,
                'tax_percentage' => 0,
                'discount_percentage' => 0,
                'transport' => $shipping,
                'paid_amount' => 0,
                'total_amount' => $this->totalPr,
                'due_amount' => 0,
                'status' => 1,
                'payment_status' => 'Unpaid',
                'payment_method' => "cash",
                'note' => 'non',
                'created_by' => Auth::user()->name,
                'tax_amount' => 0,
                'discount_amount' => $discount,
            ]);
            if($sale) {
                $saleId = Sales::latest('id')->value('id');
                foreach ($this->cart_item as $cart_item) {
                    $sales = SalesDetails::create([
                        'sale_id' => $saleId,
                        'product_id' => $cart_item['product_id'],
                        'product_name' => $cart_item['product_name'],
                        'product_code' => $cart_item['product_code'],
                        'quantity' => $cart_item['product_qty'],
                        'price' => $cart_item['subTotal'],
                        'unit_price' => $cart_item['product_price'],
                        'sub_total' => $cart_item['subTotal'],
                        'product_discount_amount' => 0,
                        'product_discount_type' => 'fixed',
                        'product_tax_amount' => 0,
                        'status' => true,
                        'created_by' => Auth::user()->name,
                    ]);

                    $product = Product::findOrFail($cart_item['product_id']);
                    $product->update([
                        'product_quantity' => $product->product_quantity - $cart_item['product_qty']
                    ]);
                }
                if ($sales){
                    $this->dispatchBrowserEvent('success',['message' => 'Successfully saved ']);
                    foreach ($this->cart_item as $items){
                        $result = array_search($items['product_id'], array_column($this->cart_item, 'product_id',$items['product_id']));
                        array_splice($this->cart_item, $result,1);
                    }
                    $this->totalPr = 0;
                    $this->shipping = '';
                    $this->discount = '';
                    $this->searchCustomer = '';
                    $this->selectedCustomer = '';
                }else{
                    $this->dispatchBrowserEvent('fail', ['message' =>'fail']);
                }
            }
        } else {
            $this->dispatchBrowserEvent('fail', ['message' => 'Please Select Customer!']);
        }
    }

    public function addCustomer(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }
    public function createCustomer(){
        $validatedData = Validator::make($this->inputs, [
            'customer_name' => 'required',
            'customer_phone' => 'required|unique:customers',
            'customer_city' => 'required',
            'customer_address' => 'required'
        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->name;
        if (Customer::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Customer created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail to create Customer']);
        }
    }
}
