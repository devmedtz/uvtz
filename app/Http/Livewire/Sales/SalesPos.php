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

    public $cart_instance;
    public $global_discount;
    public $global_tax;
    public $shipping;
    public $quantity;
    public $check_quantity;
    public $discount_type = 'fixed';
    public $item_discount;
    public $data;
    public $total_amount;
    public $customer_id;
    public $selectedCustomer;
    public $inputs = [];
    public $search;
    public $cart = [];
    public $searchCustomer;

    public function mount($cartInstance = 'sale') {
        $this->cart_instance = $cartInstance;
        Cart::instance($this->cart_instance)->destroy();
        $this->global_tax = 0;
        $this->shipping;
        $this->check_quantity = [];
        $this->quantity = [];
        $this->discount_type = [];
        $this->item_discount = [];
        $this->total_amount =  0;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function customerId($id){
        $this->customer_id  = $id;
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
        $cart_items = Cart::instance($this->cart_instance)->content();
        return view('livewire.sales.sales-pos',[
            'products' => $products,
            'cart_items' => $cart_items,
        ]);
    }
    public function hydrate() {
        $this->total_amount = $this->calculateTotal();
        $this->updatedCustomerId();
    }

    public function calculateTotal() {
        return Cart::instance($this->cart_instance)->total();
    }

    public function selectProduct($product) {
        $cart = Cart::instance($this->cart_instance);
        $exists = $cart->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id == $product['id'];
        });

        if ($exists->isNotEmpty()) {
            session()->flash('message', 'Product exists in the cart!');
            return;
        }

        $cart->add([
            'id'      => $product['id'],
            'name'    => $product['product_name'],
            'qty'     => 0,
            'price'   => $this->calculate($product)['price'],
            'weight'  => 0,
            'options' => [
                'product_discount'      => 0.00,
                'product_discount_type' => 'fixed',
                'sub_total'             => $this->calculate($product)['sub_total'],
                'code'                  => $product['product_code'],
                'stock'                 => $product['product_quantity'],
                'unit'                  => $product['product_unit'],
                'product_tax'           => $this->calculate($product)['product_tax'],
                'unit_price'            => $this->calculate($product)['unit_price']
            ]
        ]);
        $this->check_quantity[$product['id']] = $product['product_quantity'];
        $this->quantity[$product['id']] = 0;
        $this->discount_type[$product['id']] = 'fixed';
        $this->item_discount[$product['id']] = 0;
        $this->total_amount = $this->calculateTotal();
    }

    public function calculate($product) {
        $price = 0;
        $unit_price = 0;
        $product_tax = 0;
        $sub_total = 0;

//        if ($product['product_tax_type'] == 1) {
//            $price = $product['product_price'] + ($product['product_price'] * ($product['product_order_tax'] / 100));
//            $unit_price = $product['product_price'];
//            $product_tax = $product['product_price'] * ($product['product_order_tax'] / 100);
//            $sub_total = $product['product_price'] + ($product['product_price'] * ($product['product_order_tax'] / 100));
//        } elseif ($product['product_tax_type'] == 2) {
//            $price = $product['product_price'];
//            $unit_price = $product['product_price'] - ($product['product_price'] * ($product['product_order_tax'] / 100));
//            $product_tax = $product['product_price'] * ($product['product_order_tax'] / 100);
//            $sub_total = $product['product_price'];
//        } else {
//            $price = $product['product_price'];
//            $unit_price = $product['product_price'];
//            $product_tax = 0.00;
//            $sub_total = $product['product_price'];
//        }
        $price = $product['product_price'];
        $unit_price = $product['product_price'];
        $product_tax = 0.00;
        $sub_total = $product['product_price'];

        return ['price' => $price, 'unit_price' => $unit_price, 'product_tax' => $product_tax, 'sub_total' => $sub_total];
    }

    public function removeItem($row_id) {
        Cart::instance($this->cart_instance)->remove($row_id);
    }

    public function resetCart() {
        Cart::instance($this->cart_instance)->destroy();
    }

    public function updateQuantity($row_id, $product_id) {
        if  ($this->cart_instance == 'sale') {
            if ($this->check_quantity[$product_id] < $this->quantity[$product_id]) {
                $this->dispatchBrowserEvent('fail', ['message' => 'The requested quantity is not available in stock.']);
                $this->quantity[$product_id] = 0;
                Cart::instance($this->cart_instance)->update($row_id, 0);
                return;
            }
        }
        if ($this->quantity[$product_id] == 0 || $this->quantity[$product_id] == ''){
            Cart::instance($this->cart_instance)->update($row_id, 0);
            $cart_item = Cart::instance($this->cart_instance)->get($row_id);
            Cart::instance($this->cart_instance)->update($row_id, [
                'options' => [
                    'sub_total'             => $cart_item->price * $cart_item->qty,
                    'code'                  => $cart_item->options->code,
                    'stock'                 => $cart_item->options->stock,
                    'unit'                  => $cart_item->options->unit,
                    'product_tax'           => $cart_item->options->product_tax,
                    'unit_price'            => $cart_item->options->unit_price,
                    'product_discount'      => $cart_item->options->product_discount,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                ]
            ]);
            return;
        }else{
            Cart::instance($this->cart_instance)->update($row_id, $this->quantity[$product_id]);

            $cart_item = Cart::instance($this->cart_instance)->get($row_id);
            Cart::instance($this->cart_instance)->update($row_id, [
                'options' => [
                    'sub_total'             => $cart_item->price * $cart_item->qty,
                    'code'                  => $cart_item->options->code,
                    'stock'                 => $cart_item->options->stock,
                    'unit'                  => $cart_item->options->unit,
                    'product_tax'           => $cart_item->options->product_tax,
                    'unit_price'            => $cart_item->options->unit_price,
                    'product_discount'      => $cart_item->options->product_discount,
                    'product_discount_type' => $cart_item->options->product_discount_type,
                ]
            ]);
        }
    }

    public function updatedGlobalDiscount() {
        Cart::instance($this->cart_instance)->setGlobalDiscount((integer)$this->global_discount);
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

    public function proceed() {
        if ($this->customer_id != null) {
            $shippingItem = filter_var($this->shipping, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $total_amount = filter_var(Cart::instance('sale')->total(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $discount_amount = filter_var(Cart::instance('sale')->discount(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            if($this->shipping){
                $shipping_price = $shippingItem;
            }else{
                $shipping_price = 0;
            }
            $sale = Sales::create([
                'date' => now()->format('Y-m-d'),
                'inv_no' => $this->generateOrderNumber(),
                'customer_id' => $this->customer_id,
                'customer_name' => Customer::findOrFail($this->customer_id)->customer_name,
                'tax_percentage' => 0,
                'discount_percentage' => 0,
                'transport' => $shipping_price,
                'paid_amount' => 0,
                'total_amount' => $total_amount,
                'due_amount' => 0,
                'status' => 1,
                'payment_status' => 'Unpaid',
                'payment_method' => "cash",
                'note' => 'non',
                'created_by' => Auth::user()->name,
                'tax_amount' => Cart::instance('sale')->tax(),
                'discount_amount' => $discount_amount,
            ]);
            if($sale) {
                foreach (Cart::instance('sale')->content() as $cart_item) {
                    $sales = SalesDetails::create([
                        'sale_id' => $sale->id,
                        'product_id' => $cart_item->id,
                        'product_name' => $cart_item->name,
                        'product_code' => $cart_item->options->code,
                        'quantity' => $cart_item->qty,
                        'price' => $cart_item->price,
                        'unit_price' => $cart_item->options->unit_price,
                        'sub_total' => $cart_item->options->sub_total,
                        'product_discount_amount' => $cart_item->options->product_discount,
                        'product_discount_type' => $cart_item->options->product_discount_type,
                        'product_tax_amount' => $cart_item->options->product_tax,
                        'status' => true,
                        'created_by' => Auth::user()->name,
                    ]);

                    $product = Product::findOrFail($cart_item->id);
                    $product->update([
                        'product_quantity' => $product->product_quantity - $cart_item->qty
                    ]);
                }
                if ($sales){
                    $this->dispatchBrowserEvent('success',['message' => 'Successfully saved ']);
                    Cart::instance($this->cart_instance)->destroy();
                    $this->customer_id = '';
                    $this->shipping = '';
                    $this->searchCustomer = '';
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
