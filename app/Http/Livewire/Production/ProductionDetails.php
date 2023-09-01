<?php

namespace App\Http\Livewire\Production;

use App\Models\ProductionMaterials;
use Livewire\Component;
use Livewire\WithPagination;

class ProductionDetails extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $material_id;

    public function mount($material_id = null){
        $this->material_id = $material_id;
    }

    public function render()
    {
        $prodMaterials = ProductionMaterials::where('id', decrypt($this->material_id))->first();
        $usage = \App\Models\ProductionDetails::where('action', 1)
            ->where('production_id', decrypt($this->material_id))
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $additions = \App\Models\ProductionDetails::where('action', 2)
            ->where('production_id', decrypt($this->material_id))
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.production.production-details', [
            'usage' => $usage,
            'additions' => $additions,
            'prodMaterials' => $prodMaterials,
        ]);
    }
}
