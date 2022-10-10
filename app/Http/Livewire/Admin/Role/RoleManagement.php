<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleManagement extends Component
{
    public $inputs = [];
    public $showEditModal = false;

    public function addRole(){
        $this->inputs = [];
        $this->dispatchBrowserEvent('show-form');
    }
    public function createRole(){
        $validatedData = validator::make($this->inputs,[
            'name' => 'required',
        ])->validate();
        $validatedData['guard_name'] = 'web';
        if(Role::create($validatedData)){
            $this->dispatchBrowserEvent('hide-form',['message' => 'Role created successfully']);
        }else{
            $this->dispatchBrowserEvent('fail',['message' => 'Fail create Role']);
        }
    }
    public function render()
    {
        $roles = Role::get();
        return view('livewire.admin.role.role-management',[
            'roles' => $roles,
        ]);
    }
}
