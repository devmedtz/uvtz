<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Product;
use App\Models\ProductAdjastment;
use Livewire\Component;

class InventoryDetails extends Component
{
    public $product_id;

    public function mount($product_id = null){
        $this->product_id = $product_id;
    }
    public function render()
    {
        $prodDetails = ProductAdjastment::where('product_id', decrypt($this->product_id))->get();
        $prodName = Product::where('id', decrypt($this->product_id))->first();
        return view('livewire.inventory.inventory-details', [
            'prodName' => $prodName,
            'prodDetails' => $prodDetails,
        ]);
    }
}
