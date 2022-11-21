<?php

namespace App\Http\Livewire\Admin\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permision extends Component
{
    public $role_id;
    public $permission_id = [];
    public function mount($role_id = null){
        $this->role_id = $role_id;
    }
    public function createPermission(){
        dd($this->permission_id);
    }

    public function render()
    {
        $permissions = Permission::get();
        return view('livewire.admin.role.permision',[
            'permissions' => $permissions,
        ]);
    }
}
