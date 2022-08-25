<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Product;
use App\Models\ProductAdjastment;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class InventoryProduct extends Component
{
    public $showEditModal = false;
    public $inputs = [];
    public $_product;
    public $product_id;

    public function addNewProduct(){
        $this->showEditModal = false;
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }

    public function createProduct(){
        $validatedData = Validator::make($this->inputs, [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_cost' => 'required',
            'product_price' => 'required',
            'product_unit' => 'required',
            'product_stock_alert' => 'required',

        ])->validate();
        $validatedData['status'] = true;
        $validatedData['product_tax_type'] = 1;
        $validatedData['created_by'] = Auth()->user()->getAuthIdentifierName();
        if(!empty($this->inputs['product_note'])){
            $validatedData['product_note'] = $this->inputs['product_note'];
        }
        if(!empty($this->inputs['product_tax_type'])){
            $validatedData['product_tax_type'] = $this->inputs['product_tax_type'];
        }
        if(!empty($this->inputs['product_order_tax'])){
            $validatedData['product_order_tax'] = $this->inputs['product_order_tax'];
        }
        if(Product::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Product Created Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => ['Fail to create Product']]);
        }
    }
    public function editProduct(Product $product){
        $this->showEditModal = true;
        $this->_product = $product;
        $this->inputs = $product->toArray();
        $this->dispatchBrowserEvent('show-form');
    }
    public function updateProduct(){
        $validatedData = Validator::make($this->inputs, [
            'category_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_quantity' => 'required',
            'product_cost' => 'required',
            'product_price' => 'required',
            'product_unit' => 'required',
            'product_stock_alert' => 'required',

        ])->validate();
        $validatedData['status'] = true;
        $validatedData['created_by'] = Auth()->user()->getAuthIdentifierName();
        if(!empty($this->inputs['product_note'])){
            $validatedData['product_note'] = $this->inputs['product_note'];
        }
        if(!empty($this->inputs['product_tax_type'])){
            $validatedData['product_tax_type'] = $this->inputs['product_tax_type'];
        }
        if(!empty($this->inputs['product_order_tax'])){
            $validatedData['product_order_tax'] = $this->inputs['product_order_tax'];
        }
        if($this->_product->update($validatedData)){
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Product Updated Successfully']);
        }else{
            $this->dispatchBrowserEvent('fail', ['message' => ['Fail to Update Product']]);
        }
    }

    public function addProduct($productId){
        $this->inputs  = [];
        $this->product_id = $productId;
        $this->dispatchBrowserEvent('show-form2');
    }

    public function addProductQty(){
        $validatedData = validator::make($this->inputs,[
            'product_quantity' => 'required',
        ])->validate();
        $upProduct = Product::find($this->product_id);
        $upProduct->product_quantity += $validatedData['product_quantity'];
        if($upProduct->save()){
            $prodAdj = new ProductAdjastment();
            $prodAdj->product_id = $this->product_id;
            $prodAdj->created_by = Auth::user()->name;
            $prodAdj->product_quantity = $validatedData['product_quantity'];
            $prodAdj->save();
            $this->dispatchBrowserEvent('hide-form2',['message' => 'Product quantity Updated successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail  to Update Product quantity']);
        }
    }

    public function render()
    {
        $prodCategory = ProductCategory::get();
        $products = Product::
            join('product_categories', 'product_categories.id', 'products.category_id')
            ->select('products.*', 'product_categories.category_name')
            ->paginate(10);
        return view('livewire.inventory.inventory-product', [
            'products' => $products,
            'prodCategory' => $prodCategory,
        ]);
    }
}
